<?php
namespace App\Services;

use Overtrue\EasySms\EasySms;

class SmsService
{
    public function generateConfig(String $getWayType, Array $getway){
        $config = config('sms');
        $config["gateways"][$getWayType] = $getway;
        return $config;
    }

    public function getAliyunSmsConfig():Array{
        return [
            'access_key_id' => env("ALIYUN_API_KEY"),
            'access_key_secret' => env("ALIYUN_API_SECRET"),
            'sign_name' => env("ALIYUN_API_SIGNAME")
        ];
    }

    public function aliyunSms(){
        $config = $this->generateConfig('aliyun', $this->getAliyunSmsConfig());
        return new EasySms($config);
    }
}