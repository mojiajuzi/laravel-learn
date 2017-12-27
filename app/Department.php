<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';
    protected $guarded = [];

    public function child(){
        return $this->hasMany('App\Department', 'department_parent_id', 'id');
    }
}
