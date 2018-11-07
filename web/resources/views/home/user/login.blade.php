<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>B乎</title>
    <link rel="stylesheet" type="text/css" href="/static/home/css/logo.css">
    <link rel="stylesheet" type="text/css" href="/static/home/css/bootstrap.min.css">
</head>
<body>
    <div class="dowebok"> 
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="logo"></div>
        <form action="/home/login/dologin" method="post">
            {{ csrf_field() }}
            <div class="form-item">
                <input id="tel" type="text" name="name" value="" autocomplete="off" placeholder="手机号/邮箱">
                
            </div>
            <div class="form-item">
                <input id="password" type="password" name="upwd" autocomplete="off" placeholder="登录密码">
                
            </div>
            <div class="form-item">
                <span><a href="">手机验证码登录</a></span>
            </div>
            <div class="form-item"><button id="submit">登　录</button></div>
            
        </form>
        <div class="reg-bar">
            <a class="reg" href="/home/logo">立即注册</a>
            <a class="forget" href="javascript:">忘记密码</a>
        </div>
    </div>

</body>
</html>