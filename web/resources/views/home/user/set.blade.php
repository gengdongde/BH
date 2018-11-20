@extends('home.layout.index')
@section('content')
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <span class="alert-link">{{ session('success') }}</span>.
    </div>
 @endif 
@if (session('error'))
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <span class="alert-link">{{ session('error') }}</span>.
    </div>
 @endif     
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="row">
					<div class="col-md-12">
						<div class="aTabLayout YaHei">
							<ul class="aTabNav clearfix">
							  <li class="current"><a href="javascript:">设置密码</a></li>
							  <li class=""><a href="javascript:">绑定手机号</a></li>
							  <li class=""><a href="javascript:">绑定邮箱</a></li>
							  <li class=""><a href="javascript:">屏蔽</a></li>
							 
							</ul>
							
							<div class="topicsImgTxtBar aTabMain">
								<!-- 设置密码 开始 -->
								<ul class="imgTxtBar clearfix imgTxtBar-b aTabActive" style="display: block;">
									<li class="clearfix" id="setupwd">
										<form action="/home/user/setpassword" method="post">
											{{ csrf_field() }}
											<div class="form-group">
										    	<label for="password">新密码</label>
										    	<input type="password" name="upwd" class="form-control" id="password" placeholder="6~16位字母数字下划线">
											</div>
										  	<div class="form-group">
										    	<label for="repassword">确认新密码</label>
										    	<input type="password" name="reupwd" class="form-control" id="repassword" placeholder="6~16位字母数字下划线">
											</div>
											<div>
												<span></span>
											</div>
										    <input type="submit" class="btn btn-default" value="修改">
										</form>
									</li>
									
								</ul>
								<!-- 设置密码 结束 -->
								
							
								<!-- 绑定手机号 开始 -->
								<ul class="imgTxtBar clearfix imgTxtBar-b" style="display: none;">
									<li class="clearfix" id="setphone">
										<form action="/home/user/setphone" method="post">
											{{ csrf_field() }}
											<div class="form-group">
										    	<label for="phone">手机号</label>
										    	<input type="text" name="tel" class="form-control" value="" id="phone">
											</div>
										  	<div class="form-group">
										    	<label for="code">验证码</label>
										    	<input type="text" name="code" class="form-inline" id="code">
										    	<span class="btn btn-info" onclick="sendcode()">发送</span>
											</div>
											<div>
												<span></span>
											</div>
										    <input type="submit" class="btn btn-default" value="绑定">
										</form>
									</li>
								</ul>
								<!-- 绑定手机号 结束 -->
								<!-- 绑定邮箱 开始 -->
								<ul class="imgTxtBar clearfix imgTxtBar-b" style="display: none;">
									<li class="clearfix" id="setemail">
										<form action="/home/user/setemail" method="post">
											{{ csrf_field() }}
											<div class="form-group">
										    	<label for="email">邮箱</label>
										    	<input type="text" name="email" class="form-control" value="" id="email">
											</div>
											<div>
												<span></span>
											</div>
										    <input type="submit" class="btn btn-default" value="绑定">
										</form>
									</li>
								</ul>
								<!-- 绑定邮箱 结束 -->
								<!-- 用户屏蔽 开始 -->
								<ul class="imgTxtBar clearfix imgTxtBar-b" style="display: none;">
									@foreach($users as $k=>$v)
									<li class="clearfix" id="setemail">
										<div class="row">
											<div class="col-md-1">
												<img src="{{ $v->userinfo($v->id)->first()->face }}" alt="..." class="" height="40" width="40" onerror="this.src='/uploads/1447135897105.png'" style="border:1px solid #fff;border-radius: 4px;">
											</div>
											<div class="col-md-9">
												<div class="row">
													<div class="col-md-12">
														<span><font style="font-size: 16px;font-weight:bold;">{{ $v->userinfo($v->id)->first()->uname or '' }}</font></span>
													</div>
													
												</div>
												<div class="row">
													<div class="col-md-12">
														<span><font style="font-size: 16px;">{{ $v->userinfo($v->id)->first()->signature or '' }}</font></span>
													</div>
												</div>
											</div>
											<div class="col-md-2">

												<a href="/home/shield/delete/{{ $v->id }}" class="btn btn-info btn-sm">取消屏蔽</a>
											</div>
										</div>

									</li>
									@endforeach
								</ul>
								<!-- 用户屏蔽 结束 -->
							</div>
						
						</div>
					</div>
				</div> 
			</div>
		</div> 
	</div>

	<script type="text/javascript">
		$('#setupwd form').submit(function(){
			
			var upwd = $('#password').val();
			var reupwd = $('#repassword').val();
			var preg = /^[a-zA-Z0-9_]{6,16}$/;
			if(!preg.test(upwd)){
				$('#setupwd form span').eq(0).html('<font style="color:red;font-size: 10px;">密码格式错误</font>');
				return false;
			}
			
			if(upwd != reupwd){
				$('#setupwd form span').eq(0).html('<font style="color:red;font-size: 10px;">两次密码不一致</font>');
				return false;
			}
			
			return true;
		})
	</script>
	<script type="text/javascript">
		function sendcode(){
			
			var phone = $.trim($('#phone').val());
            var preg = /^1[34578]\d{9}$/;
            if(preg.test(phone)){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.get('/home/user/sendcode',{'phone':phone},function(msg){
                    alert(msg);
                    if(msg.code == 2){
                        layer.msg('验证码发送成功!');
                    }else{
                        layer.msg('验证码发送失败!');
                    }
                },'json');
            }else{
                
                return $('#setphone form span').eq(1).html('<font style="color:red;font-size: 10px;">手机号格式错误</font>');
            }
		}
	</script>
	<script type="text/javascript">
		$('#setemail form').submit(function(){
			
			var email = $('#email').val();
			
			var preg = /^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.[a-zA-Z0-9]{2,6}$/;
			if(!preg.test(email)){
				$('#setemail form span').eq(0).html('<font style="color:red;font-size: 10px;">邮箱格式错误</font>');
				return false;
			}
			return true;
		})
	</script>
@endsection


	
						