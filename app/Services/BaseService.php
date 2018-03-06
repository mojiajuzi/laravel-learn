<?php
namespace App\Services;

class BaseService
{
    public function getReturnArr($status = NULL, $message=NULL, $data = []){
        if(is_null($status))
            $status = true;
        
        if(is_null($message))
            $message = '操作成功';

        return ['status' => $status, 'msg' => $message, 'data' => $data];
    }
}