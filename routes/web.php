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

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('roles', 'RoleController');
Route::resource('schooles', 'SchooleController');
Route::resource('departments', 'DepartmentController');
Auth::routes();
Route::get('logout', 'Auth\LoginController@getLogout');
Route::get('/home', 'HomeController@index')->name('home');
