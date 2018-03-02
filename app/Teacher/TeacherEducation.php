<?php

namespace App\Teacher;

use Illuminate\Database\Eloquent\Model;
use App\Helper\DegreeHelper;
use App\Helper\CultureHelper;

class TeacherEducation extends Model
{
    protected $table = "teacher_educations";

    protected $appends = ['culture_type_text', 'degree_text'];

    protected $guarded = [];
    /**
     * 获取学历
     * @return [type] [description]
     */
    public function getCultureTypeTextAttribute(){
        return CultureHelper::getCultureNameById($this->attributes['culture']);
    }
    /**
     * 获取学位
     * @return [type] [description]
     */
    public function getDegreeTextAttribute(){
        return DegreeHelper::getDegreeNameById($this->attributes['degree']);
    }

    public static function getValidatorCreateRules(String $teacherUUID){
        return [
            "start_at" => "required|date-format:Y-m-d",
            "end_at" => "required|date-format:Y-m-d|after:start_at",
            "schoole_name" => "required|string",
            "education_type" => "required|integer",
            "major" => "nullable|string",
            "culture" => "nullable|integer",
            "degree" =>  "nullable|integer",
            "culture_number" => "required_unless:culture,0",
            "degree_number" => "required_unless:degree,0",
        ];
    }
}
