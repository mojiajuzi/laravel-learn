<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Grade extends Model
{
    protected $table = 'grades';

    protected $guarded = [];
    
    public static function getCreateRules(String $schooleUuid){
        return [
            'grade_name' => ['required','string',  Rule::unique('grades')->where(function($query)use($schooleUuid){
                $query->where("schoole_uuid", $schooleUuid);
            })],
            'grade_full_name' => ['required','string', Rule::unique('grades')->where(function($query)use($schooleUuid){
                $query->where("schoole_uuid", $schooleUuid);
            })]
        ];
    }

    public static function getUpdateRules($schooleUuid, $gradeID){
        return [
            'grade_name' => [
                'required',
                'string',
                 Rule::unique('grades')->ignore($gradeID, 'id')->where(function($query)use($schooleUuid){
                     $query->where("schoole_uuid", $schooleUuid);
            })],
            'grade_full_name' => [
                'required',
                'string',
                Rule::unique('grades')->ignore($gradeID, 'id')->where(function($query)use($schooleUuid){
                    $query->where("schoole_uuid", $schooleUuid);
            })]
        ];
    }
}
