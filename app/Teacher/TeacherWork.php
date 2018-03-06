<?php

namespace App\Teacher;

use Illuminate\Database\Eloquent\Model;
use App\Rules\ZhcnMobileRule as mobile;
use App\Rules\ZhcnNameRule as zhcn;

class TeacherWork extends Model
{
    protected $table = "teacher_works";

    protected $guarded = [];
    
    public static function getValidatorCreateRules(String $teacherUUID){
        return [
            "start_at" => "required|date-format:Y-m-d",
            "end_at" => "required|date-format:Y-m-d|after:start_at",
            "work_company" =>  "required|string",
            "work_position" => "required|string",
            "reference" => ["required","string", new zhcn],
            "reference_mobile" => ["required", new mobile]
        ];
    }
}
