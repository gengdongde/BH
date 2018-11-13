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
							<li class="clearfix">
								<div class="row">
									<div class="col-md-12">
										<h3>美国人最爱的网上杂货店：沃尔玛超亚马逊成第一</h3>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12" style="margin:5px 0px;">
										<div class="con_text"><img class="f-fl" width="150" height="115" src="/uploads/1447135897105.png" alt=""></div>
										<div class="con_text" style="width:595px; height:108px;"><p class="gray-8 SimSun">美国网民在网上购买食品杂货，最喜欢去哪里？最近Retail Feedback Group做过一次调查，发现美国网民的第一选择是沃尔玛，然后是亚马逊，再然后是本..美国网民在网上购买食品杂货，最喜欢去哪里？最近Retail Feedback Group做过一次调查，发现美国网民的第一选择是沃尔玛，然后是亚马逊，再然后是本美国网民在网上购买食品杂货，最喜欢去哪里？最近Retail Feedback Group做过一次调查，发现美国网民的第一选择是沃尔玛，然后是亚马逊，再然后是本美国网民在网上购买食品杂货，最喜欢去哪里？最近Retail Feedback Group做过一次调查，发现美国网民的第一选择是沃尔玛，然后是亚马逊，再然后是本民在网上购买食品杂货，最喜欢去哪里？最近Retail Feedback Group做过一次调查，发现美国网民的第一选择是沃尔玛，然后是亚马逊，再然后是本美国网民在网上购买食品杂货，最喜欢去哪里？最近Retail Feedback Group做过一次调查，发现美国网民的第一选择是沃尔玛，然后是亚马逊，再然后是本民在网上购买食品杂货，最喜欢去哪里？最近Retail Feedback Group做过一次调查，发现美国网民的第一选择是沃尔玛，然后是亚马逊，再然后是本美国网民在网上购买食品杂货，最喜欢去哪里？最近Retail Feedback Group做过一次调查，发现美国网民的第一选择是沃尔玛，然后是亚马逊，再然后是本民在网上购买食品杂货，最喜欢去哪里？最近Retail Feedback Group做过一次调查，发现美国网民的第一选择是沃尔玛，然后是亚马逊，再然后是本美国网民在网上购买食品杂货，最喜欢去哪里？最近Retail Feedback Group做过一次调查，发现美国网民的第一选择是沃尔玛，然后是亚马逊，再然后是本民在网上购买食品杂货，最喜欢去哪里？最近Retail Feedback Group做过一次调查，发现美国网民的第一选择是沃尔玛，然后是亚马逊，再然后是本美国网民在网上购买食品杂货，最喜欢去哪里？最近Retail Feedback Group做过一次调查，发现美国网民的第一选择是沃尔玛，然后是亚马逊，再然后是本</p></div>
									</div>
								  
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="tagtime">
											<span class="date">11月07日</span>
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
						</ul>
						<!-- 推荐 结束 -->
						<!-- 关注 开始 -->
						<ul class="imgTxtBar clearfix imgTxtBar-b" style="display: none;">
							<li class="clearfix">
								<a target="_blank" href="//www.chinaz.com/web/2018/1105/954553.shtml">
							    	<div class="w150 icoposition fl">
							    		<picture>
										  	<source srcset="//pic.chinaz.com/thumb/2018/1105/2018110511074854.webp" type="image/webp">
										  	<source srcset="//pic.chinaz.com/thumb/2018/1105/2018110511074854.jpg" type="image/jpeg"> 
										  	<img class="f-fl" width="150" height="115" src="picture/2018110511074854.jpg" alt="导航栏设计样式大全">
										</picture>
									</div>
								    <div class="w510 fr">
								      	<div class="txtBox w490">
								        	<div class="txt">
								          		<h5 class="w490">导航栏设计样式大全：样式汇总以及优、缺点分析</h5>
								        		<p class="gray-8 SimSun">元素的组合，允许用户在信息架构中穿行……..</p>
								            	<div class="clearfix gray-9 SimSun mt10"> </div>
								        	</div>
								      	</div>
								    </div>
							    </a>
							    <div class="tagtime">
							    	<span class="date">11月05日</span>
							    	<span class="times">[<a href="http://www.chinaz.com/web/seo/">优化</a>]</span>
							    	<span class="tags">
										<a target="_blank" href="/tags/daohanglansheji.shtml">导航栏设计</a>
										<a target="_blank" href="/tags/daohanglanshejiyouhua.shtml">导航栏设计优化</a>
										<a target="_blank" href="/tags/daohanglanshejiyangshi.shtml">导航栏设计样式</a>
										<a target="_blank" href="/tags/daohanglanyouhua.shtml">导航栏优化</a>
									</span>
								</div>
							</li>
						</ul>
						<!-- 关注 结束 -->
						<!-- 热榜 开始 -->
						<ul class="imgTxtBar clearfix imgTxtBar-b" style="display: none;">
							<li class="clearfix">
								<a target="_blank" href="//www.chinaz.com/web/2018/1105/954553.shtml">
							    	<div class="w150 icoposition fl">
							    		<picture>
										  	<source srcset="//pic.chinaz.com/thumb/2018/1105/2018110511074854.webp" type="image/webp">
										  	<source srcset="//pic.chinaz.com/thumb/2018/1105/2018110511074854.jpg" type="image/jpeg"> 
										  	<img class="f-fl" width="150" height="115" src="picture/2018110511074854.jpg" alt="导航栏设计样式大全">
										</picture>
									</div>
								    <div class="w510 fr">
								      	<div class="txtBox w490">
								        	<div class="txt">
								          		<h5 class="w490">附近ask感觉</h5>
								        		<p class="gray-8 SimSun">大算法的撒个看发射点发多少……..</p>
								            	<div class="clearfix gray-9 SimSun mt10"> </div>
								        	</div>
								      	</div>
								    </div>
							    </a>
							    <div class="tagtime">
							    	<span class="date">11月05日</span>
							    	<span class="times">[<a href="http://www.chinaz.com/web/seo/">优化</a>]</span>
							    	<span class="tags">
										<a target="_blank" href="/tags/daohanglansheji.shtml">导航栏设计</a>
										<a target="_blank" href="/tags/daohanglanshejiyouhua.shtml">导航栏设计优化</a>
										<a target="_blank" href="/tags/daohanglanshejiyangshi.shtml">导航栏设计样式</a>
										<a target="_blank" href="/tags/daohanglanyouhua.shtml">导航栏优化</a>
									</span>
								</div>
							</li>
						</ul>
						<!-- 热榜 结束 -->
						<!-- <ul class="imgTxtBar clearfix imgTxtBar-b" style="display: none;">
						</ul>

						<ul class="imgTxtBar clearfix imgTxtBar-b" style="display: none;">
						</ul>

						<ul class="imgTxtBar clearfix imgTxtBar-b" style="display: none;">
						</ul> -->
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
			        		<div>写问题</div>
			        	</a>
			        </div>
			      </div>
			      <div class="col-xs-4 col-sm-4">
			        <div style="display: inline-block;">
			        	<a href="" class="block_a">
			        		<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
			        		<div>写问题</div>
			        	</a>
			        </div>
			      </div>
			    </div>
			</div>
			<!-- 个人应用 结束 -->
			<!-- 个人收藏 开始 -->
			<div class="col-xs-3 col-md-3 cebian" style="background: #fff;margin-left: 10px;">
				<div class="list-group">
				  <a href="#" class="list-group-item" >
				  	<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
				    我的收藏
				  </a>
				  <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
				  <a href="#" class="list-group-item">Morbi leo risus</a>
				  <a href="#" class="list-group-item">Porta ac consectetur ac</a>
				  <a href="#" class="list-group-item">Vestibulum at eros</a>
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
	        <form action="/home/problem" method="post" id="MyProblem">
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


	        

	        console.log($('#ueditor').val());
	      
	       
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
			var preg = /\?{1}/;
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

		// 话题描述
		
			// console.log('aaa');
			// var text = ;
			// console.log(text);
			
		

		

		// 判断话题
		$('#tid').blur(function(){
			
			var sel = $('#tid option:selected').val();
			if(sel){
				Istid = true;
			}
		});
		

		
		$('#MyProblem').submit(function(){	
			
			if(Ispname && Istid){


				return true;

			}
        	return false;
        });
	</script>
@endsection
