<?php
namespace App\Helper;

class GenderHelper
{
    const GENDER_MAN = "male";

    const GENDER_WEMAN = "female";

    public static function getGenderType(){
        return [
            self::GENDER_MAN => "男",
            self::GENDER_WEMAN => "女"
        ];
    }

    public static function getGenderNameById(String $genderID){
        $genderArr = self::getGenderType();
        return isset($genderArr[$genderID]) ? $genderArr[$genderID] : self::GENDER_MAN;
    }
}