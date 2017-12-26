<?php

namespace App;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    protected $fillable = ['name', 'display_name', 'description'];

    public static function getValidatorCreateRules()
    {
        return [
            'name' => 'required|string|unique:roles,name',
            'display_name' => 'required|string|unique:roles,display_name',
            'description' => 'required|string|'
        ];
    }
}
