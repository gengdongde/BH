<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>B乎</title>
    <link rel="stylesheet" type="text/css" href="/static/home/css/logo.css">
</head>
<body>
    <div class="dowebok">
      
        <div class="logo"></div>
        <form action="/auth/register" method="post">
            {{ csrf_field() }}
            <div class="form-item">
                <input id="tel" type="text" name="tel" value="{{ old('tel') }}" autocomplete="off" autofocus placeholder="手机号">
                <p class="tip"></p>
            </div>
            <div class="form-item">
                <input id="password" type="password" name="upwd" autocomplete="off" placeholder="注册密码">
                <p class="tip"></p>
            </div>
            <div class="form-item"><button id="submit">注　册</button></div>
        </form>
        <div class="reg-bar ">
            <span class="reg">已有账号?　</span>
            <a class="reg" href="/auth/login">登录</a>
            
        </div>
        
    </div>
</body>
</html>