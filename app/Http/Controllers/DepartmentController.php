<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use Redirect;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $schoole_uuid = $request->user()->schooles[0]->schoole_uuid;
        $baseWhere = ['schoole_uuid' => $schoole_uuid];
        $this->data['parentDepartment'] = Department::where('department_parent_id', 0)->where($baseWhere)->get();
        $this->data['departmentList'] = Department::select('id', 'department_parent_id', 'department_name')
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
     * @param  \App\department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, department $department)
    {
        //
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
