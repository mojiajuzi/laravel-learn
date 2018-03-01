<?php

namespace App\Teacher;

use Illuminate\Database\Eloquent\Model;
use App\Rules\ZhcnMobileRule as mobile;
use App\Rules\ZhcnNameRule as zhcn;
use App\Helper\CultureHelper;
use App\Helper\CardHelper;
use App\Helper\GenderHelper;
use App\Helper\MarryHelper;
use App\Helper\PoliticalHelper;
use App\Helper\PermananentHelper;

class TeacherBasic extends Model
{
    protected $table = "teacher_basics";

    protected $appends = [
        'culture_type_text', 
        'id_type_text', 
        'gender_text', 
        'martial_text',
        'political_text',
        'permananent_address_type_text'
    ];
    /**
     * 获取证件名称
     *
     * @return void
     */
    public function getIdTypeTextAttribute(){
        return CardHelper::getCardNameById($this->attributes["id_type"]);
    }

    public function getGenderTextAttribute(){
        return GenderHelper::getGenderNameById($this->attributes["gender"]);
    }

    public function getMartialTextAttribute(){
        return MarryHelper::getMarryNameById($this->attributes["martial"]);
    }

    public function getPoliticalTextAttribute(){
        return PoliticalHelper::getPoliticalById($this->attributes["political"]);
    }

    public function getPermananentAddressTypeTextAttribute(){
        return PermananentHelper::getPermananentNameById($this->attributes["permananent_address_type"]);
    }

    /**
     * 获取学历中文名
     * @return [type] [description]
     */
    public function getCultureTypeTextAttribute(){
        return CultureHelper::getCultureNameById($this->attributes['culture_type']);
    }

    public static function getValidatorCreateRules(String $teacherUUID){
        return [
            "mobile" => ["nullable", new mobile],
            "email" => "nullable|email",
            "teacher_name" => ["required", new zhcn],
            "gender" => "required|in:male,female",
            "nation" => "required|string",
            "native_place" => "nullable|string",
            "id_type" => "required|integer",
            "id_card" => "required|string",
            "martial" => "required|integer",
            "political" => "required|integer",
            "birthday" => "required|date-format:Y-m-d",
            "permanent_address" => "required|string",
            "permananent_address_type" => "required|integer",
            "registered_redidence" => "required|string",
            "local_address" => "required|string",
            "culture_type" => "required|integer"
        ];
    }
}
