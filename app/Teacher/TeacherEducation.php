<?php

namespace App\Teacher;

use Illuminate\Database\Eloquent\Model;

class TeacherEducation extends Model
{
    protected $table = "teacher_educations";

    protected $appends = ['culture_type_text', 'degree_text'];

    /**
     * 获取学历
     * @return [type] [description]
     */
    public function getCultureTypeTextAttribute(){
        return static::getCultureText($this->attributes['culture']);
    }
    /**
     * 获取学位
     * @return [type] [description]
     */
    public function getDegreeTextAttribute(){
        return static::getCultureText($this->attributes['degree']);
    }

    /**
     * 学历
     *
     * @return void
     */
    public static function getCultureStatus(){
        return [
            1 => "博士", 2 => "硕士", 3 => "本科",4 => "专科",5 => "高中", 6 =>"初中", 7 => "小学"
        ];
    }

    /**
     * 学位
     *
     * @return void
     */
    public static function getDegreeStatus(){
        return [
            1 => "学士", 2 => "硕士", 3 => "博士", 4 => "其他"
        ];
    }

    /**
     * 教育形式
     *
     * @return void
     */
    public static function getEducationTypeStatus(){
        return [
            1 => "全日制",2 => "非全日制"
        ];
    }

    public static function getValidatorCreateRules(String $teacherUUID){
        return [
            "start_at" => "required|date-format:Y-m-d",
            "end_at" => "required|date-format:Y-m-d|after:start_at",
            "schoole_name" => "required|string",
            "education_type" => "required|integer",
            "major" => "nullable|integer",
            "culture" => "nullable|integer",
            "degree" =>  "nullable|integer",
            "culture_number" => "required_if:culture|string",
            "degree_number" => "required_if:degree|string",
        ];
    }
}
