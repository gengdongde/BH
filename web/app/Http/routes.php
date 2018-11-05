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
Route::get('/admin/adminuser/stus/{id}','Admin\AdminUserController@is_status');
Route::resource('/admin/adminuser','Admin\AdminUserController');
//权限管理
Route::resource('/admin/access','Admin\AccessController');
//角色管理
Route::get('/admin/role/stus/{id}','Admin\RoleController@stus');
Route::resource('/admin/role','Admin\RoleController');
//话题管理
Route::get('/admin/topic/is_to','Admin\TopicController@is_to');
Route::get('/admin/topic/top_edit/{id}','Admin\TopicController@top_edit');
Route::post('/admin/topic/top_update/{id}','Admin\TopicController@top_update');
Route::resource('/admin/topic','Admin\TopicController');
//问题回答管理
Route::resource('/admin/reply','Admin\ReplyController');








































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
// 后台用户关注话题
Route::get('admin/user/{id}/usertopic','Admin\UserController@usertopic');
// 后台用户管理
Route::resource('admin/user','Admin\UserController');


// 友情链接发布
Route::get('admin/link/btn','Admin\LinkController@btn');
// 后台友情链接
Route::resource('admin/link','Admin\LinkController');



















