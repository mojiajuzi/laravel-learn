<?php

namespace App\Http\Controllers;

use App\Teacher\TeacherBasic;
use Illuminate\Http\Request;
use Validator;
use App\Helper\GenderHelper;
use App\Helper\CultureHelper;
use App\Helper\CardHelper;
use App\Helper\MarryHelper;
use App\Helper\PoliticalHelper;
use App\Helper\DegreeHelper;
use App\Helper\PermananentHelper;

class TeacherBasicController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $this->data["basic"] = TeacherBasic::where("teacher_uuid", $user->user_uuid)->first();
        return view("teacher.basic.index", $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher\TeacherBasic  $teacherBasic
     * @return \Illuminate\Http\Response
     */
    public function show(TeacherBasic $teacherBasic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher\TeacherBasic  $teacherBasic
     * @return \Illuminate\Http\Response
     */
    public function edit(TeacherBasic $teacherBasic)
    {
        $this->data["basic"] = $teacherBasic;
        $this->data['genderArr'] = GenderHelper::getGenderType();
        $this->data['cultureArr'] = CultureHelper::getCultureType();
        $this->data['cardArr'] = CardHelper::getCardType();
        $this->data['marryArr'] = MarryHelper::getMarryType();
        $this->data['politicalArr'] = PoliticalHelper::getPoliticalType();
        $this->data['permananentArr'] = PermananentHelper::getPermananentType();
        return view("teacher.basic.update", $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher\TeacherBasic  $teacherBasic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeacherBasic $teacherBasic)
    {
       $rules = TeacherBasic::getValidatorCreateRules($teacherBasic->teacher_uuid);
       $params = $request->all();
       $v = Validator::make($params, $rules);
       if ($v->fails()){
           $error = $v->errors()->first();
           $errors = $v->errors();
           $data = ['code' => 0, 'status' => false, 'msg'=>$error, 'res'=>[], 'errors'=>$errors];
           return response()->json($data);
       }
       foreach($rules as $k => $rule){
           if(isset($params[$k]) &&  $params[$k])
                $teacherBasic->$k = $params[$k];
       }
       $result = [];
       try{
           $teacherBasic->save();
           $result = ['code' => 0, 'status' => TRUE, 'msg'=>"基本资料更新成功", 'res'=>[$params]];
       }catch(Exception $e){
           $result = ['code' => 0, 'status' => FALSE, 'msg'=>"基本资料更新失败", 'res'=>[$params]];
       }
       return response()->json($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher\TeacherBasic  $teacherBasic
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeacherBasic $teacherBasic)
    {
        //
    }
}
