<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchooleTeacher extends Model
{
    const APPLY_PASS = 1;
    protected $table = 'schoole_teachers';

    protected $guarded = [];

    protected $appends = ['status_text_arr'];

    const APPLY_STATUS_PASS = 1;

    public function getStatusTextArrAttribute(){
        return   [0 => '待审核', 1 => "审核通过", 2 => "拒绝"];
    }

    public function user(){
        return $this->belongsTo("App\User","teacher_uuid","user_uuid");
    }

    public function teacher(){
        return $this->hasOne('App\TeacherDetail', 'teacher_uuid', 'teacher_uuid');
    }
}
