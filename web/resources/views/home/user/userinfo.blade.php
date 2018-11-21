@extends('home.layout.index')
@section('content')

	<div class="container">
		<div class="row" id="info">
			<div class="col-md-12" style="background: #fff;">
				<!-- 封面 开始 -->
				<div class="row" id="cover" style="height:240px;background: #ccc;">
					<div class="col-xs-12 col-md-12 user_cover" style="padding:0px;">
						{{ csrf_field() }}
					    <img src="{{ $user->cover }}" alt="..." class="" onerror="this.src='/uploads/001.jpg'" height="240" width="100%" style="padding: 0px;">
					    <button type="button" class="layui-btn layui-btn-warm" id="test1" style="position: absolute;top:20px;right:0px;">
							编辑背景图
						</button>
					</div>
				</div>
				
				 <script>
					    	
					layui.use('upload', function(){
					  var upload = layui.upload;
					   
						//执行实例
						var uploadInst = upload.render({
						    elem: '#test1' //绑定元素
						    ,url: "/home/user/cover_upload/{{ $uid }}" //上传接口
						    ,method: 'post'
						    ,field: 'cover'
						    ,data: {'_token':$('input[name=_token]:eq(0)').val()}
						    , auto: false
						    ,before: function(obj) {
				                
				            }
						    ,choose: function(obj){  //上传前选择回调方法
				                var flag = true;
				                obj.preview(function(index, file, result){
				                    console.log(file);            //file表示文件信息，result表示文件src地址
				                    var img = new Image();
				                    img.src = result;
				                    img.onload = function () { //初始化夹在完成后获取上传图片宽高，判断限制上传图片的大小。
				                        if(img.width >=1200 && img.height >=240){
				                            obj.upload(index, file); //满足条件调用上传方法
				                        }else{
				                            flag = false;
				                            layer.msg("您上传的背景图必须大于1200*240尺寸！");
				                            return false;
				                        }
				                    }
				                    return flag;
				                });
				            }

						    ,done: function(res){
						      //上传完毕回调
						      if(res.code == 0){
						      	layer.msg(res.msg);
						      	$('.user_cover img').attr('src',res.data.src);
						      }else{
						      	layer.msg(res.msg);
						      }
						    }
						    ,error: function(){
						      //请求异常回调

						    }
						        
						});
					});
				</script>
				<!-- 封面 结束 -->

				
				<div class="row">
					<!-- 头像 开始 -->
					  <div class="col-xs-6 col-md-2" id="face">
					    <img src="{{ $user->face }}" alt="..." class="" height="160" width="160" onerror="this.src='/uploads/1447135897105.png'" style="position: relative;top:-68px;border:4px solid #fff;border-radius: 4px;  z-index: 2;">
					    <button type="button" class="layui-btn layui-btn-warm" id="test2"  style="position: absolute;right:65px;z-index:1;">
							编辑头像
						</button>
					  
					  </div>
					  <script>	
						layui.use('upload', function(){
						  var upload = layui.upload;
						   
							//执行实例
							var uploadInst = upload.render({
							    elem: '#test2' //绑定元素
							    ,url: "/home/user/face_upload/{{ $uid }}" //上传接口
							    ,method: 'post'
							    ,field: 'face'
							    ,data: {'_token':$('input[name=_token]:eq(0)').val()}
							    , auto: false
							    ,before: function(obj) {
					                
					            }
							    ,choose: function(obj){  //上传前选择回调方法
					                var flag = true;
					                obj.preview(function(index, file, result){
					                    console.log(file);            //file表示文件信息，result表示文件src地址
					                    var img = new Image();
					                    img.src = result;
					                    img.onload = function () { //初始化夹在完成后获取上传图片宽高，判断限制上传图片的大小。
					                        if(img.width >=160 && img.height >=160){
					                            obj.upload(index, file); //满足条件调用上传方法
					                        }else{
					                            flag = false;
					                            layer.msg("您上传的背景图必须大于1200*240尺寸！");
					                            return false;
					                        }
					                    }
					                    return flag;
					                });
					            }

							    ,done: function(res){
							      //上传完毕回调
							      if(res.code == 0){
							      	layer.msg(res.msg);
							      	$('#face img').attr('src',res.data.src);
							      }else{
							      	layer.msg(res.msg);
							      }
							    }
							    ,error: function(){
							      //请求异常回调

							    }
							        
							});
						});

						// 鼠标移入移出
						$('#face').mouseover(function(){
							$('#face button').css('z-index','3');
						}).mouseout(function(){
							$('#face button').css('z-index','1');
						});
					</script>
					<!-- 头像 结束 -->

					<div class="col-md-7">
						<div class="row" style="heigth:40px;">
							<div class="col-md-3">
								<span><font style="font-size: 26px;font-weight:bold;line-height: 40px;">{{ $user->uname or '' }}</font></span>
							</div>
							<div class="col-md-4">
								<span><font style="font-size: 16px;font-weight:bold;line-height: 40px;">{{ $user->signature or '' }}</font></span>
								
							</div>
						</div>
						<div class="row" style="height:40px;">
							<div class="col-md-1">
								<span class="btn-lg" style="line-height: 40px;">
									@if($user->sex == 0)
									<span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
									@elseif($user->sex == 1)
									<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
									@endif
								</span>
							</div>
							<div class="col-md-5">
								<span>
									<font style="font-size: 16px;font-weight:bold;line-height: 40px;">{{ $user->addr or '' }}</font>
								</span>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div style="position: absolute;top:50px;right:10px;">
							<a href="/home/user/{{ $uid or '' }}/edit" class="btn btn-primary">编辑个人资料</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row" >
			<div class="col-md-8" style="background: #fff;margin-top: 10px;">
				<div class="aTabLayout YaHei">
					<ul class="aTabNav clearfix">
					  <li class="current"><a href="javascript:">提问</a></li>
					  <li class=""><a href="javascript:">回答</a></li>
					  <li class=""><a href="javascript:">关注话题</a></li>
					  <li class=""><a href="javascript:">关注的人</a></li>
					</ul>
					
					<div class="topicsImgTxtBar aTabMain">
						<!-- 提问 开始 -->
						<ul class="imgTxtBar clearfix imgTxtBar-b aTabActive" style="display: block;">
							@foreach($user_pro as $k=>$v)
							<li class="clearfix">
								<div class="row">
									<div class="col-md-2">
										<span>发布了问题</span>
									</div>
									
								</div>
								
								<div class="row">
									<div class="col-md-12">
										<span><font style="font-size: 20px;font-weight: bold;">{{ $v->pname }}</font></span>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<span><font style="font-size: 10px;">　{{ $v->created_at }}　{{ $v->reply or '0' }}条回答</font></span>
									</div>
								</div>
							</li>
							@endforeach
						</ul>
						<!-- 提问 结束 -->
						<!-- 回答 开始 -->
						<ul class="imgTxtBar clearfix imgTxtBar-b" style="display: none;">
							@foreach($user_rep as $k=>$v)
							<li class="clearfix">
								<div class="row">
									<div class="col-md-8">
										<span><font style="font-size: 20px;font-weight: bold;">{{ $v->problem($v->pid)->first()->pname }}</font></span>
									</div>
								</div>
								<div class="row">
									<div class="col-md-1">
										<img src="{{ $user->face }}" alt="..." class="" height="40" width="40" onerror="this.src='/uploads/1447135897105.png'" style="border:1px solid #fff;border-radius: 4px;">
									</div>
									<div class="col-md-11">
										<div class="row">
											<div class="col-md-12">
												<span><font style="font-size: 16px;font-weight:bold;">{{ $user->uname or '' }}</font></span>
											</div>
											
										</div>
										<div class="row">
											<div class="col-md-12">
												<span><font style="font-size: 16px;">{!! $user->signature !!}</font></span>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<span><font style="font-size: 20px;">{!! $v->reply_content($v->id)->first()->content !!}</font></span>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<span><font style="font-size: 10px;">发布与　{{ $v->created_at }}</font></span>
									</div>
								</div>
							</li>
							@endforeach
						</ul>
						<!-- 回答 结束 -->
						<!-- 关注话题 开始 -->
						<ul class="imgTxtBar clearfix imgTxtBar-b" style="display: none;">
							@foreach($tops as $k=>$v)
							<li class="clearfix">
								<div class="row">
									<div class="col-md-2">
										<span><font style="font-size: 20px;font-weight: bold;">{{ $v->tname }}</font></span>
									</div>
									
								</div>
								
							</li>
							@endforeach
						</ul>
						<!-- 关注话题 结束 -->

						<!-- 关注的人 开始 -->
						<ul class="imgTxtBar clearfix imgTxtBar-b" style="display: none;">
							@foreach($con as $k=>$v)
							<li class="clearfix">
								<div class="row">
									<div class="col-md-1">
										<img src="{{ $v->face }}" alt="..." class="" height="40" width="40" onerror="this.src='/uploads/1447135897105.png'" style="border:1px solid #fff;border-radius: 4px;">
									</div>
									<div class="col-md-8">
										<div class="row">
											<div class="col-md-12">
												<span><font style="font-size: 16px;font-weight:bold;">{{ $v->uname or '' }}</font></span>
											</div>
											
										</div>
										<div class="row">
											<div class="col-md-12">
												<span><font style="font-size: 16px;">{!! $v->signature !!}}</font></span>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<form action="/home/concern/{{ $v->id }}" method="post" style="display: inline-block;">
											{{ csrf_field() }}
											{{ method_field('DELETE') }}
											<button class="btn btn-danger btn-sm">取消关注</button>
										</form>
										
									</div>
								</div>
								
							</li>
							@endforeach
						</ul>
						<!-- 关注的人 结束 -->
						
					</div>
				
				</div>
			</div>
			<div class="col-md-4" style="margin-top: 10px;">
				<div class="panel panel-default">
				  <!-- Default panel contents -->
					<div class="panel-heading">个人成就</div>
					<table class="table">
						<tr>
							<td>提问</td>
							<td>回答</td>
						</tr>
						<tr>
							<td>{{ $pro_num }}</td>
							<td>{{ $rep_num }}</td>
						</tr>
					</table>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<div class="list-group">
						  <a href="#" class="list-group-item"><span class="badge">{{ $top_num }}</span>我关注的话题</a>
						  <a href="#" class="list-group-item"><span class="badge">{{ $con_num }}</span>我关注的人</a>
						  
						</div>
					</div>
				</div>
			</div>
			
		</div>
		
	</div>	

@endsection