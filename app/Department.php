<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Department extends Model
{
    protected $table = 'departments';
    protected $guarded = [];

    public function child(){
        return $this->hasMany('App\Department', 'department_parent_id', 'id');
    }

    public function positions(){
        return $this->hasMany('App\Position');
    }

    public static function getCreateRules(String $schooleUuid){
        return [
            'department_parent_id' => 'required|integer|min:0',
            'department_name' => ['required','string',  Rule::unique('departments')->where(function($query)use($schooleUuid){
                $query->where("schoole_uuid", $schooleUuid);
            })],
            'department_full_name' => ['required','string', Rule::unique('departments')->where(function($query)use($schooleUuid){
                $query->where("schoole_uuid", $schooleUuid);
            })]
        ];
    }

    public static function getUpdateRules($schooleUuid, $departmentId){
        return [
            'department_parent_id' => 'required|integer|min:0',
            'department_name' => [
                'required',
                'string',
                 Rule::unique('departments')->ignore($departmentId, 'id')->where(function($query)use($schooleUuid){
                     $query->where("schoole_uuid", $schooleUuid);
            })],
            'department_full_name' => [
                'required',
                'string',
                Rule::unique('departments')->ignore($departmentId, 'id')->where(function($query)use($schooleUuid){
                    $query->where("schoole_uuid", $schooleUuid);
            })]
        ];
    }
}
