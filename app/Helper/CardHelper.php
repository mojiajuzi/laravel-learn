<?php
namespace App\Helper;

class  CardHelper {
    const CARD_TYPE_ID       = 1;
    const CARD_TYPE_HK_MK    = 2;
    const CARD_TYPE_TW       = 3;
    const CARD_TYPE_HK       = 4;
    const CARD_TYPE_PASSPORT = 5;

    public static function getCardType(){
        return [
            self::CARD_TYPE_ALL      => "全部",
            self::CARD_TYPE_ID       => "身份证",
            self::CARD_TYPE_HK_MK    => "港澳通行证",
            self::CARD_TYPE_TW       => "台胞证",
            self::CARD_TYPE_HK       => "香港身份证",
            self::CARD_TYPE_PASSPORT => "护照"
        ];
    }

    public static function getCardNameById(Int $cardID){
        $cardArr = self::getCardType();
        return (isset($cardArr[$cardID])) ? $cardArr[$cardID] : self::CARD_TYPE_ID;
    }
}