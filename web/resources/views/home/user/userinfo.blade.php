@extends('home.layout.index')
@section('content')

	<div class="container">
		<div class="row" id="info">
			<div class="col-md-12" style="background: #fff;">
				<!-- 封面 开始 -->
				<div class="row" id="cover" style="height:240px;background: #ccc;">
					<div class="col-xs-12 col-md-12 user_cover" style="padding:0px;">
						{{ csrf_field() }}
					    <img src="{{ $user['cover'] }}" alt="..." class="" onerror="this.src='/uploads/001.jpg'" height="240" width="100%" style="padding: 0px;">
					    <button type="button" class="layui-btn layui-btn-warm" id="test1" onchange="verificationPicFile(this)" style="position: absolute;top:20px;right:0px;">
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
						    ,url: "/home/user/cover_upload/{{ $user['uid'] }}" //上传接口
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
					    <img src="{{ $user['face'] }}" alt="..." class="" height="160" width="160" onerror="this.src='/uploads/1447135897105.png'" style="position: relative;top:-68px;border:4px solid #fff;border-radius: 4px;  z-index: 2;">
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
							    ,url: "/home/user/face_upload/{{ $user['uid'] }}" //上传接口
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
								<span><font style="font-size: 26px;font-weight:bold;line-height: 40px;">{{ $user['uname'] }}</font></span>
							</div>
							<div class="col-md-4">
								<span><font style="font-size: 16px;font-weight:bold;line-height: 40px;">{{ $user['signature'] }}</font></span>
								
							</div>
						</div>
						<div class="row" style="height:40px;">
							<div class="col-md-1">
								<span class="btn-lg" style="line-height: 40px;">
									@if($user['sex'] == 0)
									<span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
									@elseif($user['sex'] == 1)
									<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
									@endif
								</span>
							</div>
							<div class="col-md-5">
								<span>
									<font style="font-size: 16px;font-weight:bold;line-height: 40px;">{{ $user['addr'] or '' }}</font>
								</span>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div style="position: absolute;top:50px;right:10px;">
							<a href="/home/user/{{ $user['uid'] or '' }}/edit" class="btn btn-primary">编辑个人资料</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row" >
			<div class="col-md-8" style="background: #fff;margin-top: 10px;">
				<div class="aTabLayout YaHei">
					<ul class="aTabNav clearfix">
					  <li class="current"><a href="javascript:">动态</a></li>
					  <li class=""><a href="javascript:">关注</a></li>
					  <li class=""><a href="javascript:">热榜</a></li>
					</ul>
					
					<div class="topicsImgTxtBar aTabMain">
						<!-- 推荐 开始 -->
						<ul class="imgTxtBar clearfix imgTxtBar-b aTabActive" style="display: block;">
							<li class="clearfix">
								<div class="row">
									<div class="col-md-2">
										<span>发布了问题</span>
									</div>
									<div class="col-md-2 col-md-offset-8">
										<span>1小时前</span>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<span><font style="font-size: 20px;font-weight: bold;">美国人最爱的网上杂货店：沃尔玛超亚马逊成第一</font></span>
									</div>
								</div>

							</li>
							<li class="clearfix">
								<div class="row">
									<div class="col-md-2">
										<span>发布了问题</span>
									</div>
									<div class="col-md-2 col-md-offset-8">
										<span>1小时前</span>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<span><font style="font-size: 20px;font-weight: bold;">美国人最爱的网上杂货店：沃尔玛超亚马逊成第一</font></span>
									</div>
								</div>

							</li>
							<li class="clearfix">
								<div class="row">
									<div class="col-md-2">
										<span>发布了问题</span>
									</div>
									<div class="col-md-2 col-md-offset-8">
										<span>1小时前</span>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<span><font style="font-size: 20px;font-weight: bold;">美国人最爱的网上杂货店：沃尔玛超亚马逊成第一</font></span>
									</div>
								</div>

							</li>
							
						</ul>
						<!-- 发布 结束 -->
						<!-- 关注 开始 -->
						<ul class="imgTxtBar clearfix imgTxtBar-b" style="display: none;">
							<li class="clearfix">
								<div class="row">
									<div class="col-md-2">
										<span>关注了话题</span>
									</div>
									<div class="col-md-2 col-md-offset-8">
										<span>1小时前</span>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<span><font style="font-size: 20px;font-weight: bold;">大算法的撒个看发射点发多少……..</font></span>
									</div>
								</div>
							</li>
							
							<li class="clearfix">
								<div class="row">
									<div class="col-md-2">
										<span>关注了话题</span>
									</div>
									<div class="col-md-2 col-md-offset-8">
										<span>1小时前</span>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<span><font style="font-size: 20px;font-weight: bold;">大算法的撒个看发射点发多少……..</font></span>
									</div>
								</div>
							</li>
							<li class="clearfix">
								<div class="row">
									<div class="col-md-2">
										<span>关注了话题</span>
									</div>
									<div class="col-md-2 col-md-offset-8">
										<span>1小时前</span>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<span><font style="font-size: 20px;font-weight: bold;">大算法的撒个看发射点发多少……..</font></span>
									</div>
								</div>
							</li>
						</ul>
						<!-- 关注 结束 -->
						<!-- 热榜 开始 -->
						<ul class="imgTxtBar clearfix imgTxtBar-b" style="display: none;">
							<li class="clearfix">
								<div class="row">
									<div class="col-md-2">
										<span>热榜</span>
									</div>
									<div class="col-md-2 col-md-offset-8">
										<span>1小时前</span>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<span><font style="font-size: 20px;font-weight: bold;">大算法的撒个看发射点发多少……..</font></span>
									</div>
								</div>
							</li>
							
						</ul>
						
						
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
							<td>12</td>
							<td>122</td>
						</tr>
					</table>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<div class="list-group">
						  <a href="#" class="list-group-item"><span class="badge">14</span>我的收藏</a>
						  <a href="#" class="list-group-item"><span class="badge">14</span>关注话题</a>
						  <a href="#" class="list-group-item"><span class="badge">14</span>关注问题</a>
						</div>
					</div>
					
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="jumbotron">
							<h1>{{  $user['uname'] }}</h1>
							<p>{{ $user['signature'] }}</p>
							<p><a class="btn btn-primary btn-lg" href="#" role="button">关注我</a></p>
						</div>
					</div>
					
				</div>
			</div>
			
		</div>
		
	</div>	

@endsection