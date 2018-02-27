<?php

namespace App\Teacher;

use Illuminate\Database\Eloquent\Model;

class TeacherFamily extends Model
{
    protected $table = "teacher_families";
    public static function getValidatorCreateRules(String $teacherUUID){
        return [
            "emergency_name" => ["required","unique", Rule::unique("teacher_emergencied")->where(function($query)use($teacherUUID){
                $query->where("teacher_uuid", $teacherUUID);
            })],
            "relationship" => "required|string",
            "work_company" => "nullable|string",
            "work_position" => "nullable|string",
            "work_address" => "nullable|string",
            "mobile" => "required|mobile"
        ];
    }
}
