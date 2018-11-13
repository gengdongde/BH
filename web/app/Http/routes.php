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

Route::get('/','Home\IndexController@index');


// 后台首页
Route::get('/admin/','Admin\IndexController@index');

//后台登录
Route::get('/admin/login','Admin\LoginController@login');
Route::post('/admin/validateLogin','Admin\LoginController@validateLogin');
Route::get('/admin/del','Admin\LoginController@del');

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
Route::get('/admin/reply/report','Admin\ReplyController@report');
Route::get('/admin/reply/hf/{id}','Admin\ReplyController@hf');
Route::get('/admin/reply/delete/{id}','Admin\ReplyController@delete');
Route::resource('/admin/reply','Admin\ReplyController');









































// master 路由
// 后台用户回收站
Route::get('admin/user/soft','Admin\UserController@soft');
// 回收站恢复数据
Route::get('admin/user/{id}/restore','Admin\UserController@restore');
// 永久删除数据
Route::get('admin/user/{id}/remove','Admin\UserController@remove');
// 后台用户提问问题 用户列表
Route::get('admin/problem/{id}/delete','Admin\ProblemController@delete');
// 后台用户提问问题 被举报列表
Route::get('admin/problem/report','Admin\ProblemController@report');
// 后台用户关注用户
Route::resource('admin/concern','Admin\UserConcernController');
// 后台用户屏蔽用户
Route::resource('admin/shield','Admin\UserShieldController');
// 后台用户关注话题
Route::get('admin/user/{id}/usertopic','Admin\UserController@usertopic');
// 后台用户管理
Route::resource('admin/user','Admin\UserController');

// 评论管理
Route::resource('admin/comment','Admin\CommentController');

// 后台提问问题管理
Route::resource('admin/problem','Admin\ProblemController');
// 友情链接发布
Route::get('admin/link/btn','Admin\LinkController@btn');
// 后台友情链接
Route::resource('admin/link','Admin\LinkController');

// // 前台注册页面
Route::get('home/logo','Home\LoginController@logo');
// 前台注册页面验证手机号是否存在
Route::get('home/logo/check','Home\LoginController@check');
// 前台注册页面保存
Route::post('home/logo/save','Home\LoginController@save');
// 前台登录页面
Route::get('home/login','Home\LoginController@login');
// 前台登录页面验证手机号和密码
Route::post('home/login/dologin','Home\LoginController@dologin');

// 认证路由...
// Route::get('auth/login', 'Auth\AuthController@getLogin');
// Route::post('auth/login', 'Auth\AuthController@postLogin');
// Route::get('auth/logout', 'Auth\AuthController@getLogout');

// // 注册路由...
// Route::get('auth/register', 'Auth\AuthController@getRegister');
// Route::post('auth/register', 'Auth\AuthController@postRegister');

// 前台首页
Route::resource('home/index','Home\IndexController');


























































##前台##
//发现 页
Route::get('/explore','Home\ExploreController@explore');
//话题页
Route::get('/topic','Home\TopicController@topic');
//话题广场页
Route::get('/topics/{id?}','Home\TopicController@topics');
//话题详情页
Route::get('/topic/{id}/{type}','Home\TopicController@hot');
//搜索页
Route::get('/search','Home\SearchController@search');