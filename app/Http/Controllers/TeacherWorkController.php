<?php

namespace App\Http\Controllers;

use App\Teacher\TeacherWork;
use Illuminate\Http\Request;
use Validator;

class TeacherWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $this->data["workList"] = TeacherWork::where("teacher_uuid", $user->user_uuid)->get();
        return view("teacher.work.index", $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("teacher.work.create");
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
        $rules = TeacherWork::getValidatorCreateRules($userUUID);
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
            $work = TeacherWork::create($data);
            $result = ['code' => 0, 'status' => TRUE, 'msg'=>"数据创建成功", 'res'=>[$work->toArray()]];
        }catch(Exception $e){
            $result = ['code' => 0, 'status' => FALSE, 'msg'=>"记录创建失败", 'res'=>[]];
        }
        return response()->json($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher\TeacherWork  $teacherWork
     * @return \Illuminate\Http\Response
     */
    public function show(TeacherWork $teacherWork)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher\TeacherWork  $teacherWork
     * @return \Illuminate\Http\Response
     */
    public function edit(TeacherWork $teacherWork)
    {
        $this->data["work"] = $teacherWork;
        return view("teacher.work.update", $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher\TeacherWork  $teacherWork
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeacherWork $teacherWork)
    {
        $params = $request->all();
        if(is_null($teacherWork)){
            $result = ['code' => 0, 'status' => false, 'msg'=>'记录不存在', 'res'=>[$params]];
            return response()->json($result);
        }

        $userUUID = $request->user()->user_uuid;
        $rules = TeacherWork::getValidatorCreateRules($userUUID);
        $v = Validator::make($params, $rules);
        if ($v->fails()){
            $error = $v->errors()->first();
            $errors = $v->errors();
            $data = ['code' => 0, 'status' => false, 'msg'=>$error, 'res'=>[], 'errors'=>$errors];
            return response()->json($data);
        }
        $data = array_intersect_key($params, $rules);
        $result = $teacherWork->update($data);
        if(!$result){
            return response()->json(['status' => false, 'msg' => '记录更新失败']);
        }
        return response()->json(['status' => true, 'msg' => '记录更新成功']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher\TeacherWork  $teacherWork
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, TeacherWork $teacherWork)
    {
        if($teacherWork->teacher_uuid != $request->user()->user_uuid){
            $result = ['code' => 0, 'status' => false, 'msg'=>'你没有权限删除该条记录', 'res'=>[]];
            return response()->json($result);
        }
        $result = [];
        try{
            $teacherWork->delete();
            $result = ['code' => 0, 'status' => TRUE, 'msg'=>"记录删除成功", 'res'=>[$teacherWork->toArray()]];
        }catch(Exception $e){
            $result = ['code' => 0, 'status' => FALSE, 'msg'=>"记录删除失败", 'res'=>[]];
        }
        return response()->json($result);
    }
}
