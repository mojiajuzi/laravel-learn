<?php

namespace App\Http\Controllers;

use App\Schoole;
use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;
use Redirect;
use DB;

class SchooleController extends Controller
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
        if($user->schooles->isEmpty()){
            $this->setAlertMessage('尚未创建学校,先创建');
            $this->setAlertType("info");
            return Redirect::to('schooles/create')->with($this->notification);
        }
        $url = "schooles/".$user->schooles[0]->id;
        return  Redirect::to(url($url));

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
        $user = $request->user();
        try{
            DB::transaction(function()use($params,$user){
                $schoole= Schoole::create($params);
                $user->schooles()->attach($params['schoole_uuid'], ['user_uuid' => $user->user_uuid]);
                $url = "schooles/".$schoole->id;
                return  Redirect::to($url);
            });
        }catch(\Exception $e){
            $this->setAlertMessage('数据写入失败');
            $this->setAlertType("error");
            return Redirect::to('schooles/create')->with($this->notification)->with($params);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Schoole  $schoole
     * @return \Illuminate\Http\Response
     */
    public function show(Schoole $schoole)
    {
       $this->data['schoole'] = $schoole;
       return view('admin.schoole.show', $this->data);
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
        $rules = Schoole::getUpdateRules($schoole->id);
        $this->validate($request, $rules);
        $result = $schoole->update($request->all());
        if(-1 == $result){
            $this->setAlertMessage('学校信息更新失败');
            $this->setAlertType('error');
        }
        return Redirect::to('schooles')->with($this->notification);
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
