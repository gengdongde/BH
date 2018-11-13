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
							<div class="col-md-12">
								<div id="userinfo" class="row">
									
									<form action="/home/user/{{ session('uid') }}" method="post" class="form-horizontal">
										{{ csrf_field() }}
				    					{{ method_field('PUT') }}
				    						<div class="form-group" style="margin-top: 20px;">
												<label for="uname" class="col-md-2 control-label">用户名</label>
												<div class="col-md-10">
													<input type="text" name="uname" class="form-control" id="uname" value="{{ $user['uname'] or '' }}">
												</div>
											</div>
											<div class="form-group col-md-12 text-center">
												<label class="radio-inline">
													<input type="radio" name="sex" id="inlineRadio1"  @if($user['sex'] == 0 ) checked @endif value="0"> 女
												</label>
												<label class="radio-inline">
													<input type="radio" name="sex" id="inlineRadio2" @if($user['sex'] == 1 ) checked @endif value="1"> 男
												</label>
											</div>
											<div class="form-group" style="margin-top: 20px;">
												<label for="signature" class="col-md-2 control-label">一句话介绍自己</label>
												<div class="col-md-10">
													<input type="text" class="form-control" name="signature" id="signature" value="{{ $user['signature'] or '' }}">
												</div>
											</div>
											<div class="form-group" style="margin-top: 20px;">
												<label for="addr" class="col-md-2 control-label">地址</label>
												<div class="col-md-10">
													<input type="text" class="form-control" name="addr" id="addr" value="{{ $user['addr'] or '' }}">
												</div>
											</div>
											<div class="form-group">
											    <div class="col-sm-offset-2 col-sm-10">
											    	<button type="submit" class="btn btn-success">保存</button>
											    </div>
											</div>
									</form>
								</div>	
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div style="position: absolute;top:50px;right:10px;">
							<a href="/home/user" class="btn btn-primary">返回主页面</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			function verificationPicFile(file) {
			    var filePath = file.value;
			    if(filePath){
			        //读取图片数据
			        var filePic = file.files[0];
			        var reader = new FileReader();
			        reader.onload = function (e) {
			            var data = e.target.result;
			            //加载图片获取图片真实宽度和高度
			            var image = new Image();
			            image.onload=function(){
			                var width = image.width;
			                var height = image.height;
			                if (width >= 1200 | height >= 240){
			                    alert("文件尺寸符合！");
			                    return true;
			                }else {
			                    alert("文件尺寸应大于：1200*240！");
			                    file.value = "";
			                    return false;
			                }
			            };
			            image.src= data;
			        };
			        reader.readAsDataURL(filePic);
			    }else{
			        return false;
			    }
			}
			$('#face').mouseover(function(){
				$('#face form').css('z-index','3');
			}).mouseout(function(){
				$('#face form').css('z-index','1');
			});
		</script>

		
	</div>	

@endsection