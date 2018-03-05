<?php
namespace App\Helper;

class DegreeHelper
{
    /**
     * 学士
     */
    const DEGREE_BACHELOR = 1;

    /**
     * 硕士
     */
    const DEGREE_MASTER = 2;

    /**
     * 博士学位
     */
    const DEGREE_DOCTOR = 3;


    public static function getDegreeType(){
        return [
            self::DEGREE_BACHELOR => '学士',
            self::DEGREE_MASTER => '硕士',
            self::DEGREE_DOCTOR => '博士'
        ];
    }

    public static function getDegreeNameById(Int $degreeID){
        $degreeArr = self::getDegreeType();
        return isset($degreeArr[$degreeID]) ? $degreeArr[$degreeID] :'无';
    }
}