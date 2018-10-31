<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


// 后台首页
Route::get('/admin/','Admin\IndexController@index');
//管理员管理
Route::resource('/admin/adminuser', 'Admin\AdminUserController');








































// master 路由


// 后台用户管理
Route::resource('admin/user','Admin\UserController');



















