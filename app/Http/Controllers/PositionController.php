<?php

namespace App\Http\Controllers;

use App\Position;
use App\TeacherDetail;
use App\Department;
use Illuminate\Http\Request;
use Redirect;
use Validator;

class PositionController extends Controller
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
        $departmentID = $request->get("department_id");
        if(is_null($departmentID))
            return Redirect::back();

        $this->data['department'] =  Department::with('positions')
            ->where('id', $departmentID)
            ->first();

        $schooleUUID = $this->getSchooleUuid();
        $this->data['teacherAll'] = TeacherDetail::where('schoole_uuid', $schooleUUID)
            ->pluck('teacher_name', 'schoole_uuid')
            ->toArray();
        return view("admin.position.index", $this->data);
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
       $schooleUUID = $this->getSchooleUuid();
       //TODO: 对部门id,进行校验
       $departmentID = $request->get("department_id");
       $rules = Position::getCreateRules($schooleUUID, $departmentID);
       $this->validate($request, $rules);
       if(!Position::create($request->all())){
            $this->setAlertMessage('职位创建失败');
            $this->setAlertType('error');
       }
       return Redirect::to("/positions")->with($this->notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function show(Position $position)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function edit(Position $position)
    {
        $this->data['position'] = $position;
        return view("admin.position.edit", $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Position $position)
    {
       $schooleUUID = $this->getSchooleUUid();
       $departmentID = $request->get('department_id');
       $positionID = $position->id;
       $rules = Position::getUpdateRules($schooleUUID, $departmentID, $positionID);
       $v = Validator::make($request->all(), $rules);
       if($v->fails())
        return response()->json(['status' => false, 'msg' => $v->errors()->first()]);
    
        $result = $position->update($request->all());
        if(!$result){
            return response()->json(['status' => false, 'msg' => '部门职位更新失败']);
        }
        return response()->json(['status' => true, 'msg' => '部门职位更新成功']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Position $position)
    {
        //
    }
}
