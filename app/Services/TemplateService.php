<?php
namespace App\Services;

class TemplateService {
    public static function getTeacherExportTitle(){
        return [
            "序号", "姓名", "性别", "出生日期", "联系方式"
        ];
    }

    public static function getStudentsExportTitle(){
        return [
            "姓名","性别","身份证号", "家庭住址", "父亲姓名","父亲身份证号", "母亲身份证号", "联系电话"
        ];
    }
}