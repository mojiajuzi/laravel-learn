<?php

namespace App\Http\Controllers;

use App\Schoole;
use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;
use Redirect;

class SchooleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['schooles'] = Schoole::paginate(15);
        return view('admin.schoole.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.schoole.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = Schoole::getValidatorCreateRules();
        $this->validate($request, $rules);
        $params = $request->all();
        $params['schoole_uuid'] = Uuid::generate()->string;
        if(Schoole::create($params)){
            $this->setAlertMessage('数据写入失败');
            $this->setAlertType("error");
        }
        return Redirect::to('schooles/create')->with($this->notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Schoole  $schoole
     * @return \Illuminate\Http\Response
     */
    public function show(Schoole $schoole)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Schoole  $schoole
     * @return \Illuminate\Http\Response
     */
    public function edit(Schoole $schoole)
    {
        $this->data['schoole'] = $schoole;
        return view('admin.schoole.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Schoole  $schoole
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schoole $schoole)
    {
        dd($schoole);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Schoole  $schoole
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schoole $schoole)
    {
        //
    }
}
