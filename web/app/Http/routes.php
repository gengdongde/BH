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
// 后台问题被举报 恢复
Route::get('admin/problem/hf/{id}/{pid}','Admin\ProblemController@hf');
// 后台查看问题回答
Route::get('/admin/reply/ck/{id}','Admin\ReplyController@ck');

// 友情链接发布
Route::get('admin/link/btn','Admin\LinkController@btn');
// 后台友情链接
Route::resource('admin/link','Admin\LinkController');

// // 前台注册页面
Route::get('home/register','Home\LoginController@logo');
// 前台注册页面验证手机号是否存在
Route::get('home/register/check','Home\LoginController@check');
// 前台注册 验证码
Route::get('home/register/insert','Home\LoginController@insert');
// 前台注册页面保存
Route::post('home/register/save','Home\LoginController@save');
// 前台登录页面
Route::get('home/login','Home\LoginController@login');
// 前台登录页面验证手机号和密码
Route::post('home/login/dologin','Home\LoginController@dologin');
// 前台登录 验证码登录
Route::post('home/login/dologin_code','Home\LoginController@dologin_code');
// 发送验证码
Route::get('home/login/sendcode','Home\LoginController@sendcode');
// 退出
Route::get('/home/login/logout','Home\LoginController@logout');


// 前台首页
Route::resource('/home/index','Home\IndexController');
// 提问问题
Route::resource('/home/problem','Home\ProblemController');

// 前台设置页面
Route::get('/home/user/set','Home\UserController@set');
// 设置页面 设置密码
Route::post('/home/user/setpassword','Home\UserController@setpassword');

// 前台绑定手机号 发送验证码
Route::get('/home/user/sendcode','Home\UserController@sendcode');
// 前台设置绑定手机号
Route::post('/home/user/setphone','Home\UserController@setphone');

// 前台设置绑定邮箱
Route::post('/home/user/setemail','Home\UserController@setemail');

// 前台屏蔽用户
Route::resource('/home/shield','Home\ShieldController');
// 前台设置 取消屏蔽
Route::get('home/shield/delete/{id}','Home\ShieldController@delete');


// 前台用户中心 修改封面
Route::post('/home/user/cover_upload/{id}','Home\UserController@cover_upload');
// 修改头像
Route::post('/home/user/face_upload/{id}','Home\UserController@face_upload');
// 用户中心
Route::resource('/home/user','Home\UserController');

// 点击关注用户
Route::post('/home/concern/del_con','Home\UserConcernController@del_con');

// 关注用户
Route::resource('/home/concern','Home\UserConcernController');


// 写回答
Route::resource('/home/reply','Home\ReplyController');

// 举报问题
Route::resource('/home/problemreport','Home\ProblemReportController');



















































##前台##
//发现 页
Route::get('/explore','Home\ExploreController@explore');
//话题页
Route::get('/topic/{id?}','Home\TopicController@topic');
Route::get('/topicyt/{id?}/{type?}','Home\TopicController@topic');
//话题广场页
Route::get('/topics/{id?}','Home\TopicController@topics');
//话题详情页
Route::get('/topic/{id}/{type}','Home\TopicController@hot');
//关注
Route::post('/topic/utopic','Home\TopicController@utopic');
//搜索页
Route::get('/search','Home\SearchController@search');
//问答赞同
Route::post('/reply/replyagree','Home\ReplyController@replyagree');
Route::get('/reply/cs','Home\ReplyController@cs');
//评论
Route::post('/comment/tcom','Home\CommentController@tcom');
