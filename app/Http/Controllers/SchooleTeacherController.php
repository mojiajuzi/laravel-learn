<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schoole;
use App\Services\SchooleTeacherService;
use Redirect;

class SchooleTeacherController extends Controller
{
    protected $service;

    public function __construct(SchooleTeacherService $service){
        $this->middleware("auth");
        $this->service = $service;
    }

    public function apply(){
        $this->data['schooleList'] = $this->service->schooleListForSearch();
        return view('admin.apply_schoole.apply', $this->data);
    }

    /**
     * 用户申请加入学校
     */
    public function applySubmit(Request $request){
        $schooleUUID = $request->get('schoole_uuid');
        $rules = ['schoole_uuid' => 'required|string|exists:schooles,schoole_uuid'];
        $this->validate($request, $rules);

        $userUUID = $request->user()->user_uuid;

        $result = $this->service->apply($schooleUUID, $userUUID);
        $this->returnDataToNotification($result);
        if($result['status'])
            return Redirect::to("/home")->with($this->notification);
        return Redirect::back()->with($this->notification);
    }

    /**
     * 获取学校申请列表
     */
    public function applyList(Request $request){
        $schooleUUID = $this->getSchooleUUid();
        $this->data['applyList'] = $this->service->list($schooleUUID);
        return view("admin.apply_schoole.index", $this->data);
    }
}
