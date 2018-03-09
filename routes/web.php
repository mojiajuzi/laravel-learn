<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



//学校基本信息设置
Route::resource('schooles', 'SchooleController');
Route::resource('departments', 'DepartmentController');
Route::resource('positions', 'PositionController');
Route::resource("grades", 'GradeController');
Route::resource("organization", 'OrganizationController');

//教师基本操作
Route::group(['prefix' => 'schoole'], function(){
    //教师申请
    Route::get("apply", 'SchooleTeacherController@apply')->name('schoole_apply');
    Route::post("apply", 'SchooleTeacherController@applySubmit');
    Route::get('apply_list', 'SchooleTeacherController@applyList');
    Route::post("apply_review", 'SchooleTeacherController@applyReview');
    Route::get("teacher_template", "SchooleTeacherController@teacherTemplate");
    Route::get("student_template", "SchooleTeacherController@studentTemplate");
    Route::post("teacher_import", "SchooleTeacherController@teacherImport");
    //教师管理
    Route::resource('teachers', 'TeacherDetailController');
});

//教师资料填写
Route::group(["prefix" => "teacher"], function(){
    Route::resource("/basic", "TeacherBasicController", ["parameters" => [
        "basic" => "teacher_basic"
    ]]);
    Route::resource("/work", "TeacherWorkController", ["parameters" => [
        "work" => "teacher_work"
    ]]);
    Route::resource("/family", "TeacherFamilyController", ["parameters" => [
        "family" => "teacher_family"
    ]]);
    Route::resource("/emergency", "TeacherEmergencyController", ["parameters" => [
        "emergency" => "teacher_emergency"
    ]]);
    Route::resource("/education", "TeacherEducationController", ["parameters" => [
        "education" => "teacher_education"
    ]]);
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@getLogout');
Route::resource('roles', 'RoleController');
Route::get("code", 'Auth\RegisterController@sendCode');