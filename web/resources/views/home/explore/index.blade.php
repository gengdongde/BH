<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="/static/home/bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<link type="text/css" href="/static/home/css/base.css" rel="stylesheet" />
	<link type="text/css" href="/static/home/css/common.css" rel="stylesheet" />
	
	<script src="/static/home/js/jquery-1.11.0.min.js" type="text/javascript"></script>
	<script src="/static/home/js/common.js" type="text/javascript"></script>
	<script src="/static/home/js/picturefill.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="/static/home/bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="/static/home/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<!-- 	<script>
		var _hmt = _hmt || [];
		(function() {
		  var hm = document.createElement("script");
		  hm.src = "//hm.baidu.com/hm.js?aecc9715b0f5d5f7f34fba48a3c511d6";
		  var s = document.getElementsByTagName("script")[0]; 
		  s.parentNode.insertBefore(hm, s);
		})();
	</script> -->
	

	<script type="text/javascript" src="/static/home/js/m.js"></script>
	<script type="text/javascript" src="/static/home/js/scrolltext.js"></script>
<style>
		body{
			background-color:#fff;
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
			/*font-size: 16px;*/
			
		}
		.content .list-group .list-group-item{
			border:0px;
		}
		.header .container a{
			font-size: 20px;
			color:#111;
		}

		.content .col-md-8{
			box-shadow: 0px -1px 3px #888888;
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
	.cebian{
		padding: 20px;
    margin-bottom: 10px;
        box-shadow: 0px 1px 4px #888888;
            border-radius: 2px;

	}
	.list-group-item{
		border: 0px;
	}
	.listbj{
		border-top:1px solid #eee;
		line-height:25px;
	}
	 .clearfix a{
		color:#666!important;

	}
	.btn-primary{
		background-color: #d2dfea;
		border-color: #e8f4ff;
	}
	.list-group-item{
		border-bottom:1px solid #eee;

	}
	img{
		border-radius:3px;
	}
	.navbar{
		background-color:#dec95f;
	}
	</style>
	
</head>
<body>
	<div class="header">
		<nav class="navbar navbar-default navbar-fixed-top">
		  <div class="container">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      
		      <a class="navbar-brand" href="#">B乎</a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li><a href="/">首页</a></li>
		        <li><a href="/explore">发现</a></li>
		        <li><a href="/topic">话题</a></li> 
		      </ul>
		      <form class="navbar-form navbar-left">
		        <div class="form-group">
		          <input type="text" class="form-control" value="" placeholder="搜索">
		        </div>
		      </form>
		      <ul class="nav navbar-nav">
		      	<li><button class="btn btn-success" style="margin-top: 9px;background-color:#e4c52c;" data-toggle="modal" data-target="#myModal">提问</button></li>
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

<div class="container content">
	<div class="row">
		<div class="col-xs-12 col-md-9" style="margin-left:39px;width:813px;">
			<div class="row">
				<div class="col-xs-12 col-md-12">
		<div class="panel panel-default" style="border: 0px;">
		  <!-- Default panel contents -->
		  <div class="panel-heading"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>&nbsp;编辑推荐<span style="float:right;"><a>更多推荐 »</a></span></div>
		  <div class="panel-body">
		    <p>{{$prof->problem()->first()->pname}}</p>
		    <p>{{$prof->problem()->first()->describe}}</p>
		  </div>
		  <!-- List group -->
		  <ul class="list-group">
		  	@foreach($prodate as $v)
		    <li class="list-group-item listbj" style="border-top: 1px solid #eee;"><a href="/home/problem/{{$v->problem()->first()->id}}" style="color:blue;">{{$v->problem()->first()->pname}}</a><span style="float:right;color:#999999;">问答</span></li>
		    @endforeach
		  </ul>
		</div>

		</div>	
		</div>
		<div class="row">
			<div class="col-xs-10 col-md-12" style="background: #fff; border-radius: 5px;">
				<div class="aTabLayout YaHei">
					<ul class="aTabNav clearfix" style="">
					  <li @if($pagn == 1) class="current" @endif><a href="javascript:;">今日最热</a></li>
					  <li @if($pagn == 2) class="current" @endif><a href="javascript:;">本月最热</a></li>
					</ul>
					
					<div class="topicsImgTxtBar aTabMain">
						<!-- 推荐 开始 -->
								<ul class="imgTxtBar clearfix imgTxtBar-b aTabActive" @if($pagn == 1) style="display: block;"@else style="display: none;" @endif>
							@foreach($retent as $k => $v)
							<li class="clearfix">
								<div class="row">
									<div class="col-md-12">
										<h3>
										<button class="btn btn-primary" title="点赞量" type="button">
										  <span class="badge"><div class="agran{{$v->id}}"><a href="javascript:;" onclick="funagree({{$v->id}},{{$v->agree}})" class="agran">{{$v->agree}}</a></div></span>
										</button>
										{{$v->problem()->first()->pname}}</h3>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12" style="margin:5px 0px;">
										<div class="con_text"><img class="f-fl" width="150" height="115" src="/uploads/1447135897105.png" alt=""></div>
										<div class="con_text" style="width:596px; height:108px;"><p class="gray-8 SimSun">{!!$v->reply_content()->first()['content']!!}</p></div>
									</div>
								  
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="tagtime">
											<span class="date">{{$v->created_at}}</span>
											<span class="times">[<a href="http://www.chinaz.com/news/en/">外闻</a>]</span>
											<span class="tags">
												<a target="_blank" href="/tags/wangshangzahuodian.shtml">网上杂货店</a>
												<a target="_blank" href="/tags/woerma.shtml">沃尔玛</a>
												<a target="_blank" href="/tags/yamaxun.shtml">亚马逊</a>
											</span>
										</div>
									</div>
								</div>
							</li>
							@endforeach

							{!! $retent->render() !!}
						</ul>
						<ul class="imgTxtBar clearfix imgTxtBar-b" @if($pagn == 2) style="display: block;" @else style="display: none;" @endif>
						@foreach($mtent as $k => $v)
							<li class="clearfix">
								<div class="row">
									<div class="col-md-12">
										<h3>
										<button class="btn btn-primary" title="点赞量" type="button">
										  <span class="badge">{{$v->agree}}</span>
										</button>
										{{$v->problem()->first()->pname}}</h3>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12" style="margin:5px 0px;">
										<div class="con_text"><img class="f-fl" width="150" height="115" src="" alt=""></div>
										<div class="con_text" style="width:596px; height:108px;"><p class="gray-8 SimSun">{!!$v->reply_content()->first()['content']!!}</p></div>
									</div>
								  
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="tagtime">
											<span class="date">{{$v->created_at}}</span>
											<span class="times">[<a href="http://www.chinaz.com/news/en/">外闻</a>]</span>
											<span class="tags">
												<a target="_blank" href="/tags/wangshangzahuodian.shtml">网上杂货店</a>
												<a target="_blank" href="/tags/woerma.shtml">沃尔玛</a>
												<a target="_blank" href="/tags/yamaxun.shtml">亚马逊</a>
											</span>
										</div>
									</div>
								</div>
							</li>
							@endforeach
							<div>
							{!! $mtent->render() !!}
							</div>
						</ul>
					</div>
					
				</div>

			</div>
			<!-- content end -->


		</div>
	</div>
					<!-- 侧边栏 start -->
	<!-- 个人收藏 开始 -->
<div class="col-xs-3 col-md-3 cebian" style="background: #fff;margin-left: 10px;">
		<div class="list-group" >
			<div style="border-bottom: 1px solid #999;">
		  <a href="#" class="list-group-item">
		  	<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
		  	<span>热门话题</span>
		  	<span style="float:right;">更多推荐 »</span>
		  </a>
		  	</div>
		  	@foreach($topicr as $k => $v)
		  <div style="border-bottom: 1px solid #eee;"><a href="#"  class="list-group-item"><img style="width:40px;height:40px;" class="f-fl" width="150" height="115" src="{{$v->timg}}" alt="">&nbsp;<span style="color:blue;">{{ $v->tname }}</span><span style="float:right;color:#999999;">{{$v->taid}}&nbsp;人关注</span></a>
		  </div>
		  	@endforeach
		</div>
	</div>
		<!-- 个人收藏 结束 -->
	
	<!-- 侧边栏 end -->
	<!-- content start -->
</div>
</div>
</body>
</html>		
<!-- <script type="text/javascript" src="/static/home/bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script> -->
<script type="text/javascript">
function funagree(rid,agree){
		var agreej = agree+1;
		$.post('/reply/replyagree',{'_token':'{{csrf_token()}}','rid':rid,'agree':agree},function(msg){
			if(msg == '1'){
				agreej = agree-1;
				$('.agran'+rid).html('<a href="javascript:;" onclick="funagree('+rid+','+agreej+')" class="agran">'+(agree-1)+'</a>');
			}else{
				agreej = agree+1;
				$('.agran'+rid).html('<a href="javascript:;" onclick="funagree('+rid+','+agreej+')" class="agran">'+(agree+1)+'</a>');
			}
		},'html');
	}
</script>