<?php

namespace App\Http\Controllers;

use App\Grade;
use Illuminate\Http\Request;
use Validator;
use Redirect;

class GradeController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schoole_uuid = $this->getSchooleUuid();
        $baseWhere = ['schoole_uuid' => $schoole_uuid];
        $this->data['gradeList'] = Grade::select('id', 'grade_name', 'grade_full_name')
            ->where($baseWhere)
            ->get();
        return view('admin.grade.index', $this->data);
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
        $schooleUuid = $this->getSchooleUuid();
        $rules = Grade::getCreateRules( $schooleUuid);
        $this->validate($request, $rules);
        $params = $request->all();
        $params['schoole_uuid'] =  $schooleUuid;
        try{
            Grade::create($params);
            return  Redirect::to('grades')->with($this->notification);
        }catch(\Exception $e){
            $this->setAlertMessage('数据写入失败');
            $this->setAlertType("error");
            return Redirect::to('grades')->with($this->notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(Grade $grade)
    {
        $this->data['grade'] = $grade;
        return view('admin.grade.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grade $grade)
    {
        $schooleUuid = $this->getSchooleUuid();
        $rules = Grade::getUpdateRules($schooleUuid, $grade->id);
        $v = Validator::make($request->all(), $rules);
        if($v->fails())
            return response()->json(['status' => false, 'msg' => $v->errors()->first()]);
            
        $result = $grade->update($request->all());
        if(!$result){
            return response()->json(['status' => false, 'msg' => '年级更新失败']);
        }
        return response()->json(['status' => true, 'msg' => '年级更新成功']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grade $grade)
    {
        //
    }
}
