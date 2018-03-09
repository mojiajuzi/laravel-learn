<?php
namespace App\Services;

class SmsTemplateService
{
    const VERICATION_CODE = "SMS_126635399";

    public  function getTemplateKey(String $aliseKey){
        $keyArr =  [
            "vericationCode" => self::VERICATION_CODE
        ];
        return $keyArr[$aliseKey];
    }

    public  function getTemplatePlaceholder(String $tempKey):Array{
        $keyArr =  [
            self::VERICATION_CODE => ['code' => true]
        ];
        return $keyArr[$tempKey];
    }

    /**
     * 获取需要发送的数据组装
     *
     * @param String $aliseKey
     * @param Array $data
     * @return Array
     */
    public function fillTempPlaceholderByDataAndKey(String $aliseKey, Array $data):Array{
        $tempKey = $this->getTemplateKey($aliseKey);
        $tempPlaceData = $this->getTemplatePlaceholder($tempKey);
        $result = ['status' => TRUE, 'msg' => '', 'errors' => [], 'data' => []];
        foreach ($tempPlaceData as $k => $v) {
            if($v && (!isset($data[$k]))){
                $result['status'] = FALSE;
                $result['errors'][$k] = "参数缺失";
                continue;
            }
            $result['data'][$k] = $data[$k];
        }
        return $result;
    }


}