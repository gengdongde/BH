<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>用户登录</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="Keywords" content="网站关键词">
    <meta name="Description" content="网站介绍">
    <link rel="stylesheet" href="/static/home/login/css/base.css">
    <link rel="stylesheet" href="/static/home/login/css/iconfont.css">
    <link rel="stylesheet" href="/static/home/login/css/reg.css">
    <script type="text/javascript" src="/static/home/bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/static/home/layui/css/layui.css">

    <script src="/static/home/layui/layui.all.js"></script>
    <script>
        var layer = layui.layer
        ,form = layui.form;
    </script>
</head>
<body>
<div id="ajax-hook"></div>
<div class="wrap">
    <div class="wpn">
        <div class="form-data pos">
            <a href=""><img src="/static/home/login/img/logo.png" class="head-logo"></a>
            <div class="change-login">
                <p class="account_number on">账号登录</p>
                <p class="message">短信登录</p>
            </div>
            <div class="form1">
                <form action="/home/login/dologin" method="post">
                    {{ csrf_field() }}
                    <p class="p-input pos">
                        <label for="num">手机号/邮箱</label>
                        <input type="text" name="name" value="" id="num">
                        <span class="tel-warn num-err hide"><em>账号或密码错误，请重新输入</em><i class="icon-warn"></i></span>
                    </p>
                    <p class="p-input pos">
                        <label for="pass">请输入密码</label>
                        <input type="password" style="display:none"/>
                        <input type="password" name="upwd" id="pass" autocomplete="new-password">
                        <span class="tel-warn pass-err hide"><em>账号或密码错误，请重新输入</em><i class="icon-warn"></i></span>
                    </p>
                    <p>
                        <span class="tel-warn num-err hide" >

                            <em style="margin-left: 200px;color:red;">
                                @if (session('error'))
                                    <div class="alert alert-success">
                                        {{ session('error') }}
                                    </div>
                                @endif
                            </em>
                            
                            
                        </span>
                    </p>
                    <button class="lang-btn off log-btn">登录</button>
                </form> 
            </div>
            <div class="form2 hide">
                <form action="/home/login/dologin_code" method="post">
                    {{ csrf_field() }}
                    <p class="p-input pos">
                        <label for="num2">手机号</label>
                        <input type="number" name="tel" id="num2">
                        <span class="tel-warn num2-err hide"><em>账号或密码错误</em><i class="icon-warn"></i></span>
                    </p>
                    <p class="p-input pos">
                        <label for="veri-code">输入验证码</label>
                        <input type="number" name="code" id="veri-code">
                        <a href="javascript:;" class="send">发送验证码</a>
                        <span class="time hide"><em>120</em>s</span>
                        <span class="tel-warn error hide">验证码错误</span>
                    </p>
                    <p>
                        <span class="tel-warn num-err hide" >

                            <em style="margin-left: 200px;color:red;">
                                @if (session('error'))
                                    <div class="alert alert-success">
                                        {{ session('error') }}
                                    </div>
                                @endif
                            </em>
                        </span>
                    </p>
                    <button class="lang-btn off log-btn">登录</button>
                </form>
                
            </div>
            <div class="r-forget cl">
                <a href="/home/register" class="z">账号注册</a>
                <a href="" class="y">忘记密码</a>
            </div>
           <hr>
            <div class="third-party">
                <a href="#" class="log-qq icon-qq-round"></a>
                <a href="#" class="log-qq icon-weixin"></a>
                <a href="#" class="log-qq icon-sina1"></a>
            </div>
            <p class="right">Powered by © 2018</p>
        </div>
    </div>
</div>
<script src="/static/home/login/js/jquery.js"></script>
<script src="/static/home/login/js/agree.js"></script>
<script src="/static/home/login/js/login.js"></script>
<script type="text/javascript">
    $(function(){
        $('.send').click(function(){
            var phone = $.trim($('#num2').val());
            var preg = /^1[34578]\d{9}$/;
            if(preg.test(phone)){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.get('/home/login/sendcode',{'phone':phone},function(msg){
                    
                    if(msg.code == 2){
                        layer.msg('验证码发送成功!');
                    }else{
                        layer.msg('验证码发送失败!');
                    }
                },'json');
            }else{
                $('.num2-err').removeClass('hide');
                $('.num2-err').text('请输入正确的手机号');
            }
        })   
    })  
</script>
<div style="text-align:center;">
<p><a href="" target="_blank">B乎</a></p>
</div>
</body>
</html>