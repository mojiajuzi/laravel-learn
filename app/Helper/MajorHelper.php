<?php
namespace App\Helper;

class MajorHelper
{
    /**
     * 全日制
     */
    const MAJOR_DAY = 1;

    /**
     * 非全日制
     */
    const MAJOR_NOT_DAY = 2;

    public static function getMajorType(){
        return [
            self::MAJOR_DAY => '全日制',
            self::MAJOR_NOT_DAY => '非全日制'
        ];
    }

    public static function getMajorNameById(Int $majorID){
        $arr = self::getMajorType();
        return isset($arr[$majorID]) ? $arr[$majorID] : "";
    }
}