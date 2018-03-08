<?php
namespace App\Services;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illiminate\Support\Facades\Carbon;
class CodeService
{
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
        $expiresAt = now()->addMinutes(5);
        Cache::put($key, $hashCode, $expiresAt);
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
        if(Cache::has($key)){
            $res = Hash::check($code, Cache::put($key));
            if($res){
                $result["res"] = TRUE;
            }else{
                $result["验证码错误"];
            }
        }
        return $result;
    }
}