<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // 消息提示
    protected $notification = array(
        'message' => '成功', 
        'alert-type' => 'success'
    );

    //用来存储数据
    protected $data = [];

    protected function setAlertMessage(String $message){
        $this->notification['message'] = $message;
    }

    protected function setAlertType(String $alertType){
        $this->notification['alert-type'] = $alertType;
    }

    /**
     * 获取认证用户的学校唯一标识
     */
    protected function getSchooleUuid(){
        $user = Auth::user();
        $schooleUUid = '';
        if(!$user->schooles->isEmpty()){
            $schooleUUid = $user->schooles[0]->schoole_uuid;
        }
        return $schooleUUid;
    }
}
