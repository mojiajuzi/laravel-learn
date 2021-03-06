<?php

namespace App\Http\Controllers;

use App\Teacher\TeacherEducation;
use Illuminate\Http\Request;
use App\Helper\MajorHelper;
use App\Helper\CultureHelper;
use Validator;

class TeacherEducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $this->data["educationList"] = TeacherEducation::where("teacher_uuid", $user->user_uuid)->get();
        return view("teacher.education.index", $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("teacher.education.create");
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
        $rules = TeacherEducation::getValidatorCreateRules($userUUID);
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
            $education = TeacherEducation::create($data);
            $result = ['code' => 0, 'status' => TRUE, 'msg'=>"数据创建成功", 'res'=>[$education->toArray()]];
        }catch(Exception $e){
            $result = ['code' => 0, 'status' => FALSE, 'msg'=>"记录创建失败", 'res'=>[]];
        }
        return response()->json($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher\TeacherEducation  $teacherEducation
     * @return \Illuminate\Http\Response
     */
    public function show(TeacherEducation $teacherEducation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher\TeacherEducation  $teacherEducation
     * @return \Illuminate\Http\Response
     */
    public function edit(TeacherEducation $teacherEducation)
    {
        $this->data["education"] = $teacherEducation;
        return view('teacher.education.update', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher\TeacherEducation  $teacherEducation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeacherEducation $teacherEducation)
    {
        $params = $request->all();
        if(is_null($teacherEducation)){
            $result = ['code' => 0, 'status' => false, 'msg'=>'记录不存在', 'res'=>[$params]];
            return response()->json($result);
        }

        $userUUID = $request->user()->user_uuid;
        $rules = TeacherEducation::getValidatorCreateRules($userUUID);
        $v = Validator::make($params, $rules);
        if ($v->fails()){
            $error = $v->errors()->first();
            $errors = $v->errors();
            $data = ['code' => 0, 'status' => false, 'msg'=>$error, 'res'=>[], 'errors'=>$errors];
            return response()->json($data);
        }
        $data = array_intersect_key($params, $rules);
        $result = $teacherEducation->update($data);
        if(!$result){
            return response()->json(['status' => false, 'msg' => '记录更新失败']);
        }
        return response()->json(['status' => true, 'msg' => '记录更新成功']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher\TeacherEducation  $teacherEducation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, TeacherEducation $teacherEducation)
    {
        if($teacherEducation->teacher_uuid != $request->user()->user_uuid){
            $result = ['code' => 0, 'status' => false, 'msg'=>'你没有权限删除该条记录', 'res'=>[]];
            return response()->json($result);
        }
        $result = [];
        try{
            $teacherEducation->delete();
            $result = ['code' => 0, 'status' => TRUE, 'msg'=>"记录删除成功", 'res'=>[$teacherEducation->toArray()]];
        }catch(Exception $e){
            $result = ['code' => 0, 'status' => FALSE, 'msg'=>"记录删除失败", 'res'=>[]];
        }
        return response()->json($result);
    }
}
