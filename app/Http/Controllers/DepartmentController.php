<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use Redirect;
use Validator;

class DepartmentController extends Controller
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
        $schoole_uuid = $this->getSchooleUuid();
        $baseWhere = ['schoole_uuid' => $schoole_uuid];
        $this->data['departmentList'] = Department::select('id', 'department_name', 'department_full_name')
            ->where($baseWhere)
            ->get();
        return view('admin.department.index', $this->data);
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
        $rules = Department::getCreateRules( $schooleUuid);
        $this->validate($request, $rules);
        $params = $request->all();
        $params['schoole_uuid'] =  $schooleUuid;
        try{
            Department::create($params);
            return  Redirect::to('departments')->with($this->notification);
        }catch(\Exception $e){
            $this->setAlertMessage('数据写入失败');
            $this->setAlertType("error");
            return Redirect::to('departments')->with($this->notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        $this->data['departmentList'] = Department::select('id', 'department_name')
            ->where('schoole_uuid', $this->getSchooleUuid())
            ->get();
        $this->data['department'] = $department;
        return view('admin.department.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $schooleUuid = $this->getSchooleUuid();
        $rules = Department::getUpdateRules($schooleUuid, $department->id);
        $v = Validator::make($request->all(), $rules);
        if($v->fails())
            return response()->json(['status' => false, 'msg' => $v->errors()->first()]);
            
        $result = $department->update($request->all());
        if(!$result){
            return response()->json(['status' => false, 'msg' => '部门更新失败']);
        }
        return response()->json(['status' => true, 'msg' => '部门更新成功']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(department $department)
    {
        //
    }
}
