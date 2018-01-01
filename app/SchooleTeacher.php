<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchooleTeacher extends Model
{
    protected $table = 'schoole_teachers';

    protected $guarded = [];

    public function user(){
        return $this->belongsTo("App\User","teacher_uuid","user_uuid");
    }
}
