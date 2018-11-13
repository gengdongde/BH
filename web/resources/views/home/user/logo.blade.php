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
    @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <div class="dowebok">
        <div>
            <div class="logo"></div>
        </div>
        <form action="/home/logo/save" method="post">
            {{ csrf_field() }}
            <div class="form-item">
                <input id="tel" type="text" name="tel" value="" autocomplete="off" autofocus placeholder="手机号">
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
            <a class="reg" href="/home/login">登录</a>
            
        </div>
        
    </div>
    <script src="/static/home/js/jquery.min.js"></script>
    <script>

        $(function () {
            $('#tel').focus(function(){
                $('p').eq(0).text('11位手机号');
            });
            // 验证手机号
            $('#tel').blur(function(){
                // 获取数据
                var tel = $(this).val();
                var tel_reg = /^[1]{1}[35789]{1}[0-9]{9}$/;

                if ( tel_reg.test(tel) ) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.get('/home/logo/check',{'tel':tel},function(msg){
                        if(msg == 'success'){
                            $('p').eq(0).text('手机号正确');
                        }else{
                            $('p').eq(0).text('手机号已存在');
                        }
                    },'html');
                }else{
                    $('p').eq(0).text('手机号格式错误');
                }
                
            });


            $('#password').focus(function(){
                $('p').eq(1).text('6~18位字母、数字、下划线');
            });
            // 验证密码
            $('#password').blur(function(){
                // 获取数据
                var upwd = $(this).val();
                var upwd_reg = /^[a-z0-9_]{6,18}$/;

                if ( upwd_reg.test(upwd) ) {
                    $('p').eq(1).text('密码格式正确');  
                }else{
                    $('p').eq(1).text('密码格式错误');
                }
                
            });
        })
    </script>

</body>
</html>