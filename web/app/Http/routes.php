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
Route::resource('/admin/adminuser','Admin\AdminUserController');








































// master 路由
// 后台用户回收站
Route::get('admin/user/soft','Admin\UserController@soft');
// 回收站恢复数据
Route::get('admin/user/{id}/restore','Admin\UserController@restore');
// 永久删除数据
Route::get('admin/user/{id}/remove','Admin\UserController@remove');
// 用户提问问题
Route::resource('admin/problem','Admin\ProblemController');
// 后台用户关注用户
Route::resource('admin/concern','Admin\UserConcernController');
// 后台用户屏蔽用户
Route::resource('admin/shield','Admin\UserShieldController');
// 后台用户管理
Route::resource('admin/user','Admin\UserController');


// 友情链接发布
Route::get('admin/link/btn','Admin\LinkController@btn');
// 后台友情链接
Route::resource('admin/link','Admin\LinkController');



















