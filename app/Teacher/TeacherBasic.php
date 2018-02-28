<?php

namespace App\Teacher;

use Illuminate\Database\Eloquent\Model;
use App\Rules\ZhcnMobileRule as mobile;
use App\Rules\ZhcnNameRule as zhcn;

class TeacherBasic extends Model
{
    protected $table = "teacher_basics";

    protected $appends = ['culture_type_text', 'id_card_arr', 'id_type_text'];

    public function getIdCardArrAttribute(){
        return Employee::getCardType();
    }

    public function getIdTypeTextAttribute(){
        $arr = Employee::getCardType();
        if(isset($arr[$this->attributes["id_type"]])){
            return $arr[$this->attributes["id_type"]];
        }else{
            return "身份证";
        }
    }

    /**
     * 获取学历中文名
     * @return [type] [description]
     */
    public function getCultureTypeTextAttribute(){
        return static::getCultureText($this->attributes['culture_type']);
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
            "mertial" => "required|integer",
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
