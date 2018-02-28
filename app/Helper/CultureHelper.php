<?php
namespace App\Helper;

class CultureHelper {
     /**
     *小学
     */
     const CULTURE_PRIMARY = 1;

     /**
     *初中
     */
     const CULTURE_JUNIOR_HIGH = 2;

     /**
     *高中
     */
     const CULTURE_SENIOR_HIGH = 3;

     /**
     *技工
     */
     const CULTURE_ARTISAN = 4;

     /**
     *职高
     */
     const CULTURE_VOCATIONAL_HIGH = 5;

     /**
     *高职
     */
     const CULTURE_HIGH_VOCATIONAL = 6;

     /**
     *中专
     */
     const CULTURE_TECHNICAL_SECONDARY = 7;

     /**
     *师范
     */
     const CULTURE_TEACHER_TRAINING = 8;

     /**
     *专科
     */
     const CULTURE_JUNIOR_COLLEGE = 9;

     /**
     *本科
     */
     const CULTURE_UNDERGRADUATE = 10;

     /**
     *研究生
     */
     const CULTURE_GRADUATE = 11;

    public static function getCultureType(){
        return [
            self::CULTURE_PRIMARY => "小学",
            self::CULTURE_JUNIOR_HIGH => "初中",
            self::CULTURE_SENIOR_HIGH => "高中",
            self::CULTURE_ARTISAN => "技工",
            self::CULTURE_VOCATIONAL_HIGH => "职高",
            self::CULTURE_HIGH_VOCATIONAL => "高职",
            self::CULTURE_TECHNICAL_SECONDARY => "中专",
            self::CULTURE_TEACHER_TRAINING => "师范",
            self::CULTURE_JUNIOR_COLLEGE => "专科",
            self::CULTURE_UNDERGRADUATE => "本科",
            self::CULTURE_GRADUATE => "研究生",
        ];
    }

    public static function getCultureNameById(Int $cultureID){
        $cultureArr = self::getCultureType();
        return isset($cultureArr[$cultureID]) ? $cultureArr[$cultureID] : self::CULTURE_UNDERGRADUATE;
    }
}