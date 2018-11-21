@extends('home.layout.index')
@section('content')

@if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissable">
    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

	<div class="container content">
		<div class="row">
			<!-- content start -->
			<div class="col-xs-12 col-md-8" style="background: #fff; border-radius: 5px;">
				<div class="aTabLayout YaHei">
					<ul class="aTabNav clearfix">
					  <li class="current"><a href="javascript:;">推荐</a></li>
					  <li class=""><a href="javascript:;">关注</a></li>
					  <li class=""><a href="javascript:;">热榜</a></li>
					</ul>
					
					<div class="topicsImgTxtBar aTabMain">
						<!-- 推荐 开始 -->
						<ul class="imgTxtBar clearfix imgTxtBar-b aTabActive" style="display: block;">
							@foreach($problem as $k=>$v)
							<li class="clearfix">
								<div class="row">
									<div class="col-md-12">
										<h3><a href="/home/problem/{{ $v->id }}">{{ $v->pname }}</a></h3>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<span >发布与 {{ $v->created_at }}</span>
									</div>
									<div class="col-md-6">
										
										<a href="" style="display: inline-block;font-weight: bold;">{{ $v->user->uname }}</a>
										<span>发起了问题  • {{ $v->rep_num }} 个回答  </span>
									</div>	
																	
								</div>
								
							</li>
							@endforeach
						</ul>
						<!-- 推荐 结束 -->
						<!-- 关注 开始 -->
						
						<ul class="imgTxtBar clearfix imgTxtBar-b" style="display: none;">
							@if(empty($con_pro))
							<li class="clearfix">
								<div class="row">
									<div class="col-md-12">
										<div class="col-md-2 col-md-offset-5">
											<img src="/static/home/images/01.jpg" height='60'>
										</div>
									</div>
								</div>
								<br>
								<br>
								<div class="row">
									<div class="col-md-12">
										<div class="col-md-4 col-md-offset-5">
											<span><font style="font-size: 16px;font-weight: 100;">你还没有关注的用户</font></span>
										</div>
									</div>
								</div>
							</li>
							@endif
							
							@foreach($con_pro as $k=>$v)
							<li class="clearfix">
								<div class="row">
									<div class="col-md-12">
										<h3><a href="/home/problem/{{ $v->id }}">{{ $v->pname }}</a></h3>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<span >发布与 {{ $v->created_at }}</span>
									</div>
									<div class="col-md-6">
										
										<a href="" style="display: inline-block;font-weight: bold;">{{ $v->user->uname }}</a>
										<span>发起了问题  • {{ $v->rep_num }} 个回答  </span>
									</div>	
																	
								</div>
							</li>
							@endforeach
						
						</ul>
						<!-- 关注 结束 -->
						<!-- 热榜 开始 -->
						<ul class="imgTxtBar clearfix imgTxtBar-b" style="display: none;">
							@foreach($hot_pro as $k=>$v)
							<li class="clearfix">
								<div class="row">
									<div class="col-md-12">
										<h3><a href="/home/problem/{{ $v->id }}">{{ $v->pname }}</a></h3>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<span >发布与 {{ $v->created_at }}</span>
									</div>
									<div class="col-md-6">
										
										<a href="" style="display: inline-block;font-weight: bold;">{{ $v->user->uname }}</a>
										<span>发起了问题  • {{ $v->rep_num }} 个回答  </span>
									</div>	
																	
								</div>
							</li>
							@endforeach
						</ul>
						<!-- 热榜 结束 -->
						<ul class="imgTxtBar clearfix imgTxtBar-b" style="display: none;">
						</ul>

						<ul class="imgTxtBar clearfix imgTxtBar-b" style="display: none;">
						</ul>

						<ul class="imgTxtBar clearfix imgTxtBar-b" style="display: none;">
						</ul>
					</div>
					<!-- <div class="loadingMore bgf8"> <a class="gray-3 blue" href="javascript:">点击加载更多</a>
					  
					</div>  -->
					
				</div>
			</div>
			<!-- content end -->

			<!-- 侧边栏 start -->
			<!-- 个人应用 开始 -->
			<div class="col-xs-3 col-md-3 cebian" style="background: #fff;margin-left: 10px;">
				<div class="row center-block" >
			      <div class="col-xs-4 col-sm-4" >
			        <div style="display: inline-block;">
			        	<a href="" class="block_a">
			        		<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
			        		<div>写问题</div>
			        	</a>
			        </div>
			      </div>
			      <div class="col-xs-4 col-sm-4">
			        <div style="display: inline-block;">
			        	<a href="" class="block_a">
			        		<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
			        		<div>写回答</div>
			        	</a>
			        </div>
			      </div>
			      <div class="col-xs-4 col-sm-4">
			        <div style="display: inline-block;">
			        	<a href="" class="block_a">
			        		<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
			        		<div>写想法</div>
			        	</a>
			        </div>
			      </div>
			    </div>
			</div>
			<!-- 个人应用 结束 -->
			<!-- 个人收藏 开始 -->
			<div class="col-xs-3 col-md-3 cebian" style="background: #fff;margin-left: 10px;">
				<div><span>友情链接:</span></div>
				@foreach($links as $k=>$v)
					<a href="{{ $v->url }}" target="_blank"><img src="{{ $v->logo }}" width="80" height="60" border="1" align="absmiddle"></a>
				@endforeach 
				</div>
			</div>
			<!-- 个人收藏 结束 -->
			
			<!-- 侧边栏 end -->
		</div>
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
					    		@foreach($topics as $k=>$v)
					    		<option value="{{ $v->id }}">{{str_repeat('|----',substr_count($v->path,',')).$v->tname}}</option>
					    		@endforeach
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

@endsection
