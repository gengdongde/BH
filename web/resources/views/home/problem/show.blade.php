<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title></title>
	<link rel="stylesheet" type="text/css" href="/static/home/bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<link type="text/css" href="/static/home/css/base.css" rel="stylesheet" />
	<link type="text/css" href="/static/home/css/common.css" rel="stylesheet" />
	
	<script src="/static/home/js/jquery-1.11.0.min.js" type="text/javascript"></script>
	<script src="/static/home/js/common.js" type="text/javascript"></script>
	<script src="/static/home/js/picturefill.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="/static/home/bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="/static/home/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	
	

	<script type="text/javascript" src="/static/home/js/m.js"></script>
	<script type="text/javascript" src="/static/home/js/scrolltext.js"></script>
	
	<link rel="stylesheet" type="text/css" href="/static/home/layui/css/layui.css">
	<script src="/static/home/layui/layui.all.js"></script>
	<script>
		var layer = layui.layer
  		,form = layui.form;
	</script>
	<style>
		body{
			
			padding-top:60px;
		}
		#bgad {
		  display: block;
		  height: 800px;
		  overflow: hidden;
		  position: absolute;
		  top: 34px;
		  width: 100%;
		  z-index: 0;
		}
		.aaa{
			  width:100%;
			  margin:0px auto;
			  position:fixed;
			  top:0px;
			  left:0px;
			  _position:absolute;
			  _top:expression(documentElement.scrollTop + 'px'); 
			  z-index:9999;
			  text-align:left;"
		}
		.content .cebian{
			padding:20px;
			margin-bottom: 10px;
		}
		.content .cebian .block_a{
			/*margin:0 0 0 10px;*/

			flex-direction: column;
			text-decoration:none; 
			font-size: 16px;
		}
		.content .cebian span{
			margin-left: 14px;
		}
		.content .list-group{
			font-size: 16px;
			
		}
		.content .list-group .list-group-item{
			border:0px;
		}
		.header .container a{
			font-size: 20px;
			color:#111;
		}

		.content .col-md-8{
			box-shadow: 0px 1px 4px #888888;
		}
		.content .col-md-8 .clearfix{
			/*margin-top: 5px;*/
		}
		.content .cebian{
			box-shadow: 0px 1px 4px #888888;
		}
		.content .topicsImgTxtBar .con_text{
			display: inline-block;
			overflow: hidden;
		}
	</style>
	
</head>
<body>
	<div class="header">
		<nav class="navbar navbar-default navbar-fixed-top" style="background: #fff;">
		  <div class="container">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <a class="navbar-brand" href="/home/index">B乎</a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li><a href="/home/index">首页</a></li>
		        <li><a href="/explore">发现</a></li>
		        <li><a href="/topic">话题</a></li> 
		      </ul>
		      <form class="navbar-form navbar-left" action="/search" method="GET">
		        <div class="form-group">
		          <input type="text" name="q" class="form-control" value="" placeholder="搜索">
		        </div>
		      </form>
		      
		      <ul class="nav navbar-nav navbar-right">
		        <li><a href="#"> <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> </a></li>
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="glyphicon glyphicon-user" aria-hidden="true"></span> </a>
		          <ul class="dropdown-menu">
		            <li><a href="/home/user">我的主页</a></li>
		            <li><a href="/home/user/set">设置</a></li>
		            <li><a href="/home/login/logout">退出</a></li>
		          </ul>
		        </li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>	
	</div>
	<!-- header 结束 -->
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
		<div class="row" style="background: #fff;">
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-12">
						<a href="" class="btn btn-info btn-sm">{{ $topic->tname }}</a>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-12">
						<h3>{{ $problem->pname }}</h3>
						<br>
						<h4>{!! $problem->describe !!}</h4>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-1">
						<button class="btn btn-success" id="reply">回答</button>
					</div>
					<div class="col-md-1">
						<button class="btn btn-danger" data-toggle="modal" data-target="#rep_report">举报</button>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<table class="table text-center">
					<tr>
						<td>点击量</td>
						<td>回答数量</td>
					</tr>
					<tr>
						<td>{{ $problem->clicks }}</td>
						<td>{{ $rep_num }}</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<br>

	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-8" style="background: #fff; border-radius: 5px;">
				<div class="row">
					<!-- reply start -->
					<div class="col-md-12" id="my_reply" style="display: none;">
						<div class="row">
							<div class="col-md-1">
								<img src="{{ $user_login->face }}" alt="..." class="" height="40" width="40" onerror="this.src='/uploads/moren.jpg'" style="border:1px solid #fff;border-radius: 4px;">
							</div>
							<div class="col-md-8">
								<div class="row">
									<div class="col-md-12">
										<span><font style="font-size: 20px;font-weight:bold;line-height: 40px;">{{ $user_login->uname }}</font></span>
									</div>
								</div>
							</div>
						</div>
						
						<form action="/home/reply" method="post" >
							{{ csrf_field() }}
							<div class="row">
							  <div class="col-md-12">
							  	<input type="hidden" name="pid" value="{{ $problem->id }}">
							    <script id="content" name="content" type="text/plain" class="center-block">写回答,必填</script>
							  </div>
							</div>
							<div class="row">
								<div class="col-md-2">
							    	<label>
								    	<input type="checkbox" name="che" value="1">匿名提问
								  	</label>
								</div>
							  
								<div class="col-md-1">
							    	<button type="submit" class="btn btn-info btn-sm">提交</button>
								</div>
							</div>
						</form>
						<!-- 配置文件 -->
					    <script type="text/javascript" src="/ueditor/ueditor.config.js"></script>
					    <!-- 编辑器源码文件 -->
					    <script type="text/javascript" src="/ueditor/ueditor.all.js"></script>
					    <!-- 实例化编辑器 -->
					    <script type="text/javascript">
					        var editor = UE.getEditor('content',{
					        	toolbars: [
								      ['bold', 'italic', 'underline', 'blockquote', 'pasteplain', '|','map','insertvideo','simpleupload', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc'],
								]
					        });  
					    </script>
						
					</div>
					<!-- reply end -->
					<div class="col-md-12">
						<div class="aTabLayout YaHei">
							<div class="topicsImgTxtBar aTabMain">
								<!-- content start -->
								<ul class="imgTxtBar clearfix imgTxtBar-b aTabActive" style="display: block;">
									@foreach($rep as $k=>$v)
									<li class="clearfix">
										<div class="row">
											<div class="col-md-1">
												<img src="{{ $v->user->face }}" alt="..." class="" height="40" width="40" onerror="this.src='/uploads/moren.jpg'" style="border:1px solid #fff;border-radius: 4px;">
											</div>
											<div class="col-md-8">
												<div class="row">
													<div class="col-md-12">
														<span><font style="font-size: 20px;font-weight:bold;line-height: 40px;">{{ $v->user->uname }}</font></span>
													</div>
												</div>
											</div>
										</div>
										<br>
										<div class="row">
											<div class="col-md-12">
												{!! $v->reply_content($v->id)->first()->content !!}
											</div>
										</div>
										<br>
										<div class="row">
											<div class="col-md-4">
												<span >发布与 {{ $v->created_at }}</span>
											</div>
											<div class="col-md-1">
												<button class="btn btn-success btn-sm" onclick="agree(this,{{ $v->id }})" id="agree">赞同</button>
											</div>	
											<div class="col-md-1">
												<button class="btn btn-danger btn-sm" onclick="report(this,{{ $v->id }})" id="report">举报</button>
											</div>								
										</div>
										
									</li>
									@endforeach
								</ul>
								<!-- content end -->
							</div>
						</div>
					</div>
				</div>

				
			</div>
			

			<!-- 侧边栏 start -->
			<!-- 个人应用 开始 -->
			<div class="col-xs-3 col-md-3 cebian" style="background: #fff;margin-left: 10px;">
				<div class="row center-block" >
			    	<div class="panel panel-default">
					  <!-- Default panel contents -->
						<div class="panel-heading">关于作者</div>
						<table class="table text-center">
							<tr>
								<div class="row">
									<div class="col-md-2">
										<img src="{{ $user->face }}" alt="..." class="" height="40" width="40" onerror="this.src='/uploads/moren.jpg'" style="border:1px solid #fff;border-radius: 4px;">
									</div>
									<div class="col-md-8">
										<div class="row">
											<div class="col-md-12">
												<span><font style="font-size: 16px;font-weight:bold;line-height: 40px;">{{ $user->uname }}</font></span>
											</div>
										</div>
										
									</div>
								</div>
								
							</tr>
							<tr>
								<td>回答</td>
								<td>关注者</td>
							</tr>
							<tr>
								<td>{{ $user_rep }}</td>
								<td>{{ $user_con }}</td>
							</tr>
							<tr>
								<td>
									@if( empty($cuser->cid) )
									<button class="btn btn-info" id="concern" onclick="concern({{  $user->uid  }})" >关注</button>
									@elseif( $cuser->cid )
									<button class="btn btn-info" id="del_con" onclick="del_con({{  $user->uid  }})" >取消关注</button>
									@endif

								</td>
							</tr>
						</table>
					</div>
			    </div>
			</div>
			<!-- 个人应用 结束 -->
			<!-- 侧边栏 end -->
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="rep_report" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title text-info" id="myModalLabel">我要举报</h4>
	      </div>
	      <div class="modal-body">
	      		<form action="/home/problemreport" method="post">
      				{{ csrf_field() }}
	      			<input type="hidden" name="pid" value="{{ $problem->id }}">
	      			 <div class="radio">
	      			 	
					    <label>
					      <input type="radio" name="report" value="1">低质问题 
					    </label>
					    <label>
					      <input type="radio" name="report" checked value="2">垃圾广告 
					    </label>
					    <label>
					      <input type="radio" name="report" value="3">要害信息 
					    </label>
					    <label>
					      <input type="radio" name="report" value="4">涉嫌侵权 
					    </label>
					  </div>
					  <button type="submit" class="btn btn-default">提交</button>
      				
	      		</form>
	        
	        
	      </div>
      	
	    </div>
	  </div>
	</div>
<!-- 提问模态框 结束 -->
	<script type="text/javascript">
		// 回答
		$('#reply').click(function(){
			$('#my_reply').css('display','');
		})



		// 关注用户
		function concern(id){
			$.ajaxSetup({
		        headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        }
			});
			$.post('/home/concern',{'cid':id},function(msg){
				console.log(msg);
				if(msg == 'success'){
					layer.msg('关注成功');
					$('#concern').parent().html("<button class='btn btn-info' id='del_con' onclick='del_con({{  $user->uid  }})' >取消关注</button>");

					
				}else{
					layer.msg('操作失败');
				}
			},'html');
		}
		// 取消关注
		function del_con(id){
			$.ajaxSetup({
		        headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        }
			});
			$.post('/home/concern/del_con',{'cid':id},function(msg){
				console.log(msg);
				if(msg == 'success'){
					layer.msg('已取消关注');
					$('#del_con').parent().html("<button class='btn btn-info' id='concern' onclick='concern({{  $user->uid  }})' >关注</button>");
					
					
					
				}else{
					layer.msg('操作失败');
				}
			},'html');
		}
	</script>
</body>
</html>