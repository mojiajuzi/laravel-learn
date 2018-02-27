<?php

namespace App\Teacher;

use Illuminate\Database\Eloquent\Model;

class TeacherWork extends Model
{
    protected $table = "teacher_works";
    public static function getValidatorCreateRules(String $teacherUUID){
        return [
            "start_at" => "required|date-format:Y-m-d",
            "end_at" => "required|date-format:Y-m-d|after:start_at",
            "work_company" => "required|string",
            "work_position" => "required|string",
            "work_address" => "|string",
            "reference" => "required|string|zhcn",
            "reference_mobile" => "required|mobile"
        ];
    }
}
