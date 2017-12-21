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
}
