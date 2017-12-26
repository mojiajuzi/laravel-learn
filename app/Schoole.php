<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schoole extends Model
{
    protected $guarded = [];

    public static function getValidatorCreateRules()
    {
        return [
            'schoole_name' => 'required|string|unique:schooles,schoole_name',
            'schoole_simple_name' => 'required|string',
            'schoole_code' => 'required|string|unique:schooles,schoole_code',
            'schoole_address' => 'sometimes|required|string|min:1|max:255|unique:schooles,schoole_address',
        ];
    }

    /**
     * 获取更新学校信息规则
     * $id 学校主键
     */
    public static function getUpdateRules(Int $id){
        $rule = self::getValidatorCreateRules();
        $rule['schoole_name'] = $rule['schoole_name'].','.$id;
        $rule['schoole_code'] = $rule['schoole_code'].','.$id;
        $rule['schoole_address'] = $rule['schoole_address'].','.$id;
        return $rule;
    }

    public function users(){
        return $this->belongsToMany('App\User', 'schoole_users', 'schoole_uuid', 'user_uuid');
    }
}
