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


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', 'Auth\LoginController@getLogout');
Route::resource('roles', 'RoleController');
