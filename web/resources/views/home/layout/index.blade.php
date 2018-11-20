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
		      <ul class="nav navbar-nav">
		      	<li><button type="button" class="btn btn-info" style="margin-top: 10px;" data-toggle="modal" data-target="#myModal">提问</button></li>
		      </ul>
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
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title text-info" id="myModalLabel">我要提问</h4>
	      </div>
	      <div class="modal-body">
	        <form action="/home/problem" method="post" id="MyProblem" enctype="multipart/form-data">
        		{{ csrf_field() }}
	        	<div class="row">
				  <div class="col-xs-2">
				    <img src=""  class=" img-responsive" onerror="this.src='/uploads/1447135897105.png'">
				  </div>
				  <div class="col-xs-10">
				    <input type="text" id="pname" name="pname" class="form-control" maxlength='20' minlength='4' placeholder="最多20个字">
				    <span></span>
				  </div>
				</div>
				<div class="row">
					<br>
				  <div class="col-xs-12">
				    <script id="ueditor" name="content" type="text/plain" class="center-block"></script>
				  </div>
				</div>
				<div class="row">
				  <div class="col-xs-4">
				    	<label>
					    	<select name="tid" id="tid" class="text-info input-sm">
					    		<option value="">-选择话题-</option>
					    		<option value="1">历史</option>
					    		<option value="2">物理</option>
					    		<option value="3">互联网</option>
					    	</select>
					  	</label>
				  </div>
				  
				 
				</div>
				<div class="row">
				  <div class="col-xs-4 text-info">
				    	<label>
					    	<input type="checkbox" name="che" value="1">匿名提问
					  	</label>
				  </div>
				  
				  <div class="col-xs-2 col-md-offset-6">
				    	<button type="submit" class="btn btn-info">提交</button>
				  </div>
				</div>
	        </form>
	        
	      </div>
      	<!-- 配置文件 -->
	    <script type="text/javascript" src="/ueditor/ueditor.config.js"></script>
	    <!-- 编辑器源码文件 -->
	    <script type="text/javascript" src="/ueditor/ueditor.all.js"></script>
	    <!-- 实例化编辑器 -->
	    <script type="text/javascript">
	        var editor = UE.getEditor('ueditor',{
	        	toolbars: [
				      ['bold', 'italic', 'underline', 'blockquote', 'pasteplain', '|','map','insertvideo','simpleupload', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc'],
				]
	        });  
	    </script>
	    </div>
	  </div>
	</div>
<!-- 提问模态框 结束 -->

<!-- 模态框验证 -->
	<script type="text/javascript">
		var Ispname,Iscontent,Istid = false;
		
		// 判断提问问题 
		$('#pname').blur(function(){
			// 获取数据
			var pname = $('#pname').val();
			var p_sub = pname.substr(pname.length-1,1);
			
			// 正则
			var preg = /(\?|？){1}/;
			var pre = /^([\u4e00-\u9fa5]|[\w]){4,20}/;
			$('#pname+span').html(" ")

			// 判断
			if(pre.test(pname)){
				
				if(preg.test(p_sub)){
					Ispname = true;
				}else{
					$('#pname+span').html("<font style='color:red;font-size:12px;'>以?结尾</font>")
				}
			}else{
				$('#pname+span').html("<font style='color:red;font-size:12px;'>最少四个字最多20个字</font>")
			}
		});

		// 判断话题
		$('#tid').blur(function(){
			
			var sel = $('#tid option:selected').val();
			if(sel){
				Istid = true;
			}
		});
		
		// 提交
		$('#MyProblem').submit(function(){	
			if(Ispname && Istid){
				return true;
			}
        	return false;
        });
	</script>
	@section('content')























	@show
	

</body>
</html>