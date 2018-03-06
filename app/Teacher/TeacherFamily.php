<?php

namespace App\Teacher;

use Illuminate\Database\Eloquent\Model;
use App\Rules\ZhcnMobileRule as mobile;
use Illuminate\Validation\Rule;

class TeacherFamily extends Model
{
    protected $table = "teacher_families";

    protected $guarded = [];

    public static function getValidatorCreateRules(String $teacherUUID){
        return [
            "family_name" => ["required", Rule::unique("teacher_families")->where(function($query)use($teacherUUID){
                $query->where("teacher_uuid", $teacherUUID);
            })],
            "relationship" => "required|string",
            "work_company" => "nullable|string",
            "work_position" => "nullable|string",
            "work_address" => "nullable|string",
            "mobile" => ["required", new mobile]
        ];
    }

    public static function getUpdateRules(String $teacherUUID, Int $recoderID){
        $rules = self::getValidatorCreateRules($teacherUUID);
        $rules["family_name"] = ["required", Rule::unique("teacher_families")->ignore($recoderID)->where(function($query)use($teacherUUID){
                $query->where("teacher_uuid", $teacherUUID);
        })];
        return $rules;
    }
}
