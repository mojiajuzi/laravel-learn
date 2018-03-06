<?php

namespace App\Http\Controllers;

use App\Teacher\TeacherFamily;
use Illuminate\Http\Request;
use Validator;

class TeacherFamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->data["familyList"] = TeacherFamily::where("teacher_uuid", $request->user()->user_uuid)->get();
        return view("teacher.family.index", $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("teacher.family.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->all();
        $userUUID = $request->user()->user_uuid;
        $rules = TeacherFamily::getValidatorCreateRules($userUUID);
        $v = Validator::make($params, $rules);
        if ($v->fails()){
            $error = $v->errors()->first();
            $errors = $v->errors();
            $data = ['code' => 0, 'status' => false, 'msg'=>$error, 'res'=>[], 'errors'=>$errors];
            return response()->json($data);
        }
        $data = array_intersect_key($params, $rules);
        $data["teacher_uuid"] = $userUUID;
        $result = [];
        try{
            $education = TeacherFamily::create($data);
            $result = ['code' => 0, 'status' => TRUE, 'msg'=>"数据创建成功", 'res'=>[$education->toArray()]];
        }catch(Exception $e){
            $result = ['code' => 0, 'status' => FALSE, 'msg'=>"记录创建失败", 'res'=>[]];
        }
        return response()->json($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher\TeacherFamily  $teacherFamily
     * @return \Illuminate\Http\Response
     */
    public function show(TeacherFamily $teacherFamily)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher\TeacherFamily  $teacherFamily
     * @return \Illuminate\Http\Response
     */
    public function edit(TeacherFamily $teacherFamily)
    {
        $this->data["family"] = $teacherFamily;
        return view("teacher.family.update", $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher\TeacherFamily  $teacherFamily
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeacherFamily $teacherFamily)
    {
        $params = $request->all();
        if(is_null($teacherFamily)){
            $result = ['code' => 0, 'status' => false, 'msg'=>'记录不存在', 'res'=>[$params]];
            return response()->json($result);
        }

        $userUUID = $request->user()->user_uuid;
        $rules = TeacherFamily::getUpdateRules($userUUID, $teacherFamily->id);
        $v = Validator::make($params, $rules);
        if ($v->fails()){
            $error = $v->errors()->first();
            $errors = $v->errors();
            $data = ['code' => 0, 'status' => false, 'msg'=>$error, 'res'=>[], 'errors'=>$errors];
            return response()->json($data);
        }
        $data = array_intersect_key($params, $rules);
        $result = $teacherFamily->update($data);
        if(!$result){
            return response()->json(['status' => false, 'msg' => '记录更新失败']);
        }
        return response()->json(['status' => true, 'msg' => '记录更新成功']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher\TeacherFamily  $teacherFamily
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,TeacherFamily $teacherFamily)
    {
        if($teacherFamily->teacher_uuid != $request->user()->user_uuid){
            $result = ['code' => 0, 'status' => false, 'msg'=>'你没有权限删除该条记录', 'res'=>[]];
            return response()->json($result);
        }
        $result = [];
        try{
            $teacherFamily->delete();
            $result = ['code' => 0, 'status' => TRUE, 'msg'=>"记录删除成功", 'res'=>[$teacherFamily->toArray()]];
        }catch(Exception $e){
            $result = ['code' => 0, 'status' => FALSE, 'msg'=>"记录删除失败", 'res'=>[]];
        }
        return response()->json($result);
    }
}
