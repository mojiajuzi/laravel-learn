<?php
namespace App\Services;
use App\Rules\ZhcnMobileRule as mobile;
use App\Rules\ZhcnNameRule as zhcn;

class TemplateService {
    public static function getTeacherExportTitle(){
        return [
           "teacher_name"=>"姓名", "teacher_sex" => "性别", "teacher_birthday" => "出生日期", "teacher_mobile" => "联系方式"
        ];
    }

    public static function getTeacherExportTitleFormat(){
        return [
            'A' => '@',
            'B' => '@',
            'C' => 'yyyy-mm-dd',
            'D' => '@'
        ];
    }

    public static function getStudentsExportTitle(){
        return [
            "姓名","性别","身份证号", "家庭住址", "父亲姓名","父亲身份证号", "母亲身份证号", "联系电话"
        ];
    }

    public static function teacherExcelTitleValideRule(){
        return [
            "teacher_name" => ["required", "string", new zhcn],
            "teacher_sex" => ["required", "string",new zhcn],
            "teacher_birthday" => "required|date",
            "teacher_mobile" => ["required",new mobile]
        ];
    }
}