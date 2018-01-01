<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Position extends Model
{
    protected $table = 'positions';

    protected $guarded = [];

    public function child(){
        return $this->hasMany('App\Position', 'position_parent_id', 'id');
    }

    public function teacher(){
        return $this->belongsTo('App\TeacherDetail', 'position_manager_uuid', 'teacher_uuid');
    }

    public function department(){
        return $this->belongsTo('App\Department', 'department_id', 'id');
    }

    public static function getCreateRules(String $schooleUUID, Int $departmentID){
        return [
            // 'position_parent_id' => [
            //     'required',
            //     'integer',
            //     Rule::exists('positions', 'id')->where(function($query)use($departmentID){
            //         $query->where('department_id', $departmentID);
            //     })
            // ],
            'position_name' => ['required','string',  Rule::unique('positions')->where(function($query)use($departmentID){
                $query->where("department_id", $departmentID);
            })],
            'department_id' => ['required','integer', Rule::exists('departments', 'id')->where(function($query)use($schooleUUID){
                $query->where("schoole_uuid",$schooleUUID);
            })],
            'department_master' => 'required|in:0,1'
        ];
    }

    public static function getUpdateRules(String $schooleUUID, Int  $departmentID, Int $positionID){
        return [
            // 'position_parent_id' => [
            //     'required',
            //     'integer',
            //     Rule::exists('positions', 'id')->where(function($query)use($departmentID){
            //         $query->where('department_id', $departmentID);
            //     })
            // ],
            'position_name' => [
                'required',
                'string',
                 Rule::unique('positions')->ignore($positionID, 'id')->where(function($query)use($departmentID){
                     $query->where("department_id", $departmentID);
            })],
            'department_id' => [
                'required',
                'integer', 
                Rule::exists('departments', 'id')->where(function($query)use($schooleUUID){
                $query->where("schoole_uuid",$schooleUUID);
            })],
            'department_master' => 'required|in:0,1'
        ];
    }
}
