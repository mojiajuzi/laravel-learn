<?php
namespace App\Helper;

class PoliticalHelper
{
    /**
     *中共党员
     */
    const POLITICAL_CPC_MEMBER = 1;

    /**
     *中共预备党员
     */
    const POLITICAL_CPC_BEFORE = 2;

    /**
     *共青团员
     */
    const POLITICAL_LEAGUE = 3;

    /**
     *民革党员
     */
    const PLOITICAL_MDC = 4;

    /**
     *民盟盟员
     */
    const PLOITICAL_PAD_LEAGUE = 5;

    /**
     *民建会员
     */
    const PLOITICAL_COMMITTEE = 6;

    /**
     *民进会员
     */
    const PLOITICAL_DPP = 7;

    /**
     *农工党党员
     */
    const PLOITICAL_LABOURITE = 8;

    /**
     * 致公党党员
     */
    const PLOITICAL_PARTY_PARTY = 9;

    /**
     *九三学社社员
     */
    const PLOITICAL_UNIVERSITY = 10;

    /**
     *台盟盟员
     */
    const PLOITICAL_TAIMENG_LEAGUER = 11;

    /**
     *无党派人士
     */
    const PLOITICAL_nonparty_personage = 12;

    /**
    * 群众
    */
    const PLOITICAL_MASSES = 13;

    public static function getPoliticalType(){
        return [
            self::POLITICAL_CPC_MEMBER =>"中共党员",
            self::POLITICAL_CPC_BEFORE =>"中共预备党员",
            self::POLITICAL_LEAGUE =>"共青团员",
            self::PLOITICAL_MDC =>"民革党员",
            self::PLOITICAL_PAD_LEAGUE =>"民盟盟员",
            self::PLOITICAL_COMMITTEE =>"民建会员",
            self::PLOITICAL_DPP =>"民进会员",
            self::PLOITICAL_LABOURITE =>"农工党党员",
            self::PLOITICAL_PARTY_PARTY =>" 致公党党员",
            self::PLOITICAL_UNIVERSITY =>"九三学社社员",
            self::PLOITICAL_TAIMENG_LEAGUER =>"台盟盟员",
            self::PLOITICAL_nonparty_personage =>"无党派人士",
            self::PLOITICAL_MASSES => "群众",
        ];
    }

    public static function getPoliticalById(Int $politicalID){
        $politicalArr = self::getPoliticalType();
        return isset($politicalArr[$politicalID]) ? $politicalArr[$politicalID] : self::PLOITICAL_MASSES;
    }
}