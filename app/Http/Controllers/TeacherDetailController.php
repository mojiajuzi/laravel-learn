<?php

namespace App\Http\Controllers;

use App\TeacherDetail;
use Illuminate\Http\Request;

class TeacherDetailController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schooleUUID = $this->getSchooleUuid();
        $this->data['teacherList'] = TeacherDetail::paginate($this->pageSize);
        return view('admin.teacher.index', $this->data);
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
     * @param  \App\TeacherDetail  $teacherDetail
     * @return \Illuminate\Http\Response
     */
    public function show(TeacherDetail $teacherDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TeacherDetail  $teacherDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(TeacherDetail $teacherDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TeacherDetail  $teacherDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeacherDetail $teacherDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TeacherDetail  $teacherDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeacherDetail $teacherDetail)
    {
        //
    }
}
