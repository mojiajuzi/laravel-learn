<?php
namespace App\Services;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
class CodeService
{
    protected $sendLimit = 4;
    /**
     * 生成一个随机的六位验证码
     *
     * @return Int
     */
    public function getValidatorCode() :Int{
        return random_int(100000, 999999);
    }

    /**
     * 保存用户验证码
     *
     * @param String $prefix
     * @param String $codeType
     * @return String
     */
    public function cacheCode(String $prefix, String $codeType):String{
        $code = (string)$this->getCode();
        $key = $prefix.':'.$codeType;
        $hashCode = Hash::make($code);
        $expiresAt = $this->getSecondExpire(5);
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
            'res' => false,
            'msg' => '验证码已过期'
        ];

        $key = $prefix.':'.$codeType;
        if(Redis::get($key)){
            $res = Hash::check($code, Cache::put($key));
            if($res){
                $result["res"] = TRUE;
            }else{
                $result["验证码错误"];
            }
        }
        return $result;
    }

    /**
     * 设置手机用户发送验证码的次数
     *
     * @param String $prefix
     * @param String $codeType
     * @return void
     */
    public function sendCodeLimit(String $prefix, String $codeType){
        $result = FALSE;
        if($times = Cache::tags($codeType)->has($prefix)){
            if($times > $this->sendLimit){
                return TRUE;
            }
            Cache::tags($codeType)->increment($prefix, 1);
            return $result;
        }
        Cache::tags($codeType)->put($prefix, 1);
        return $result;
    }

    public function getSecondExpire(Int $min){
        $expiresAt = now()->addMinutes(5);
        return $expiresAt->diffInSeconds();
    }
}