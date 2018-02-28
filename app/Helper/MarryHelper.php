<?php
namespace App\Helper;

class MarryHelper
{
    /**
     * 已婚
     */
    const MARRY_MARTIAL = 1;

    /**
     * 未婚
     */
    const MARRY_SPINSTERHOOD = 2;

    /**
     * 离异
     */
    const MARRY_DIVORCED = 3;

    public static function getMarryType(){
        return [
            self::MARRY_MARTIAL => '已婚',
            self::MARRY_SPINSTERHOOD => '未婚',
            self::MARRY_DIVORCED => '离异'
        ];
    }

    public static function getMarryNameById(Int $marryID){
        $marryArr = self::getMarryType();
        isset($marryArr[$marryID]) ? $marryArr[$marryID] : self::MARRY_SPINSTERHOOD;
    }
}