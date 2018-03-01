<?php
namespace App\Helper;

class PermananentHelper
{
    const PERMANANENT_CITY = 1;
    const PERMANANENT_TOWER = 2;

    public static function getPermananentType(){
        return [
            self::PERMANANENT_CITY => '城镇户口',
            self::PERMANANENT_TOWER => '农村户口'
        ];
    }

    public static function getPermananentNameById(Int $permananentID){
        $arr = self::getPermananentType();
        return isset($arr[$permananentID]) ? $arr[$permananentID] : self::PERMANANENT_TOWER;
    }
}