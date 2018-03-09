<?php
namespace App\Services;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
class CodeService
{
    protected $sendLimit = 5;
    /**
     * 生成一个随机的六位验证码
     *
     * @return Int
     */
    public function getValidatorCode() :Int{
        return random_int(100000, 999999);
    }

    /**
     * 保存用户验证码并设置过期时间
     *
     * @param String $prefix
     * @param String $codeType
     * @return String
     */
    public function cacheCode(String $prefix, String $codeType):String{
        $code = (string)$this->getValidatorCode();
        $key = $prefix.':'.$codeType;
        $hashCode = Hash::make($code);
        $expiresAt = $this->getSecondExpireByMin(5);
        Redis::setex($key, $expiresAt, $hashCode);
        return $code;
    }

    /**
     * 校验验证码是否正确
     *
     * @param String $prefix
     * @param String $codeType
     * @param String $code
     * @return Array
     */
    public function checkCode(String $prefix, String $codeType, String $code):Array{
        $result = [
            'status' => false,
            'msg' => '验证码已过期'
        ];

        $key = $prefix.':'.$codeType;
        if(Redis::get($key)){
            $res = Hash::check($code, Redis::get($key));
            if($res){
                $result["status"] = TRUE;
                $result['msg'] = "验证码正确";
            }else{
                $result["msg"] = "验证码错误";
            }
        }
        return $result;
    }

    /**
     * 增加发送次数
     *
     * @param String $key
     * @return Boolean
     */
    public function increSendTimes(String $prefix, String $codeType){
        $key = $prefix.":".$codeType.":sendTime";
        //判断当前的数量
       $times =  Redis::get($key);
       if($times){
            if($times == $this->sendLimit){
                //设置过期时间
                $expiresAt = $this->getSecondExpireByMin(180);
                Redis::setex($key, $expiresAt, $times);

                //清空验证码
                $sendKey = $prefix.':'.$codeType;
                Redis::del($sendKey);
                return FALSE;
            }
            Redis::incrby($key, 1);
            return TRUE;
       }
        Redis::set($key, 1);
        return TRUE;
    }

    public function getSecondExpireByMin(Int $min):Int{
        $expiresAt = now()->addMinutes(5);
        return $expiresAt->diffInSeconds();
    }
}