<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherDetail extends Model
{
    protected $table = 'teacher_details';
    protected $fillable = ['id', 'schoole_uuid', 'teacher_uuid', 'teacher_name', 'created_at','updated_at','teacher_sex', 'teacher_mobile'];
}
