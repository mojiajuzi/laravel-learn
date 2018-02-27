<?php

namespace App\Teacher;

use Illuminate\Database\Eloquent\Model;

class TeacherEmergency extends Model
{
    protected $table = "teacher_emergencies";
    public static function getValidatorCreateRules(String $teacherUUID){
        return [
            "emergency_name" => ["required","unique", Rule::unique("teacher_emergencied")->where(function($query)use($teacherUUID){
                $query->where("teacher_uuid", $teacherUUID);
            })],
        ];
    }
}
