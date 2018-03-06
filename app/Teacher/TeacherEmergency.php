<?php

namespace App\Teacher;

use Illuminate\Database\Eloquent\Model;
use App\Rules\ZhcnMobileRule as mobile;
use Illuminate\Validation\Rule;

class TeacherEmergency extends Model
{
    protected $table = "teacher_emergencies";

    protected $guarded = [];

    public static function getValidatorCreateRules(String $teacherUUID){
        return [
            "emergency_name" => ["required", Rule::unique("teacher_emergencies")->where(function($query)use($teacherUUID){
                $query->where("teacher_uuid", $teacherUUID);
            })],
            "emergency_mobile" => ["required", new mobile]
        ];
    }

    public static function getUpdateRules(String $teacherUUID, Int $recoderID){
        $rules = self::getValidatorCreateRules($teacherUUID);
        $rules['emergency_name'] = ["required", Rule::unique("teacher_emergencies")->ignore($recoderID)->where(function($query)use($teacherUUID){
                $query->where("teacher_uuid", $teacherUUID);
            })];
        return $rules;
    }
}
