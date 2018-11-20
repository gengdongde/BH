<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>用户注册</title>
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
                <!--<p class="tel-warn hide"><i class="icon-warn"></i></p>-->
                <form action="/home/register/save" method="post">
                    {{ csrf_field() }}
                    <p class="p-input pos">
                        <label for="tel">手机号</label>
                        <input type="number" id="tel" name="tel" autocomplete="off">
                        <span class="tel-warn tel-err hide"><em></em><i class="icon-warn"></i></span>
                    </p>
                    <p class="p-input pos" id="sendcode">
                        <label for="veri-code">输入验证码</label>
                        <input type="number" name="code" id="veri-code">
                        <a href="javascript:;" class="send">发送验证码</a>
                        <span class="time hide"><em>120</em>s</span>
                        <span class="error hide"><em></em><i class="icon-warn" style="margin-left: 5px"></i></span>
                    </p>
                    
                    <div class="reg_checkboxline pos">
                        <span class="z"><i class="icon-ok-sign boxcol" nullmsg="请同意!"></i></span>
                        <input type="hidden" name="agree" value="1">
                        <div class="Validform_checktip"></div>
                        <p>我已阅读并接受 <a href="#" target="_brack">《B乎协议说明》</a></p>
                    </div>
                    <button class="lang-btn">注册</button>
                </form>
                
                
                <div class="bottom-info">已有账号，<a href="/home/login">马上登录</a></div>
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
    <script src="/static/home/login/js/reg.js"></script>
	<div style="text-align:center;">
    <p><a href="" target="_blank">B乎</a></p>
</div>
<script type="text/javascript">
    $(function(){
            
            // 验证手机号
            $('#tel').blur(function(){
                // 获取数据
                var phone = $.trim($('#tel').val());
                var preg = /^1[34578]\d{9}$/;
                if ( preg.test(phone) ) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.get('/home/register/check',{'tel':phone},function(msg){
                        if(msg == 'success'){
                            $('.tel-err').removeClass('hide');
                            $('.tel-err').text('手机号正确');
                            
                        }else{
                            $('.tel-err').removeClass('hide');
                            $('.tel-err').text('手机号已存在');
                            
                        }
                    },'html');
                }else{
                    $('.tel-err').removeClass('hide');
                    $('.tel-err').text('手机号格式错误');
                    
                }
                
            });

            // 
            $('.send').click(function(){
                var phone = $.trim($('#tel').val());
                $.get('/home/login/sendcode',{'phone':phone},function(msg){
                    
                    if(msg.code == 2){
                        layer.msg('验证码发送成功!');
                    }else{
                        layer.msg(msg.msg);
                    }
                },'json');
            })  

            
            
       
        
    })
</script>
</body>
</html>