@extends('home.layout.index')
@section('content')
<style type="text/css">
body{
	background:#fff;

}
	.topics{
		border:1px solid blue;
		display:block;
		height:24px;
		border: 1px solid #a5a5f1;
	    display: block;
	    height: 24px;
	    border-radius: 13px;
	    padding: 3px 5px 8px 5px;
	    color:#1e7bd0;
	}
	a.topics:hover{
		background: #1e7bd0;
		color: #fff;
		 text-decoration:none;
	}
	.list-inline li{
		margin-bottom:10px;
	}
	.list-group-item{
		border:0px;
	}
	.agran{

		    padding: 8px;
		    background: #eff6fa;
		    color: #698ebf;
		    border-radius:5px;
	}
	.agran:hover{
		background: #0f7cbb;
		color:#fff;
		text-decoration:none;
	}
	.tops a:hover{
		color:blue;
	}	
	.tops a{
		color:#999;
	}
	.blkuang{
		border-radius: 4px;
		border: 1px solid #cce1ef;
    	background: #eff6fA;
    	padding-bottom: 41px;
	}
	.btn-primary{
		       margin: 39px 116px;
		       margin-bottom:20px;
	}
</style>
<div class="container" style="">
	<!-- 主内容 -->
	<div class="row">
		<div class="col-xs-12 col-md-8">
			<!-- 话题广场  一级话题展示区 -->
			<div class="row">
				<div class="col-xs-12 col-md-11">
					<div class="panel panel-default" style="border: 0px solid; box-shadow: 0 1px 1px #fff;border-bottom:1px solid #eee;" >
					  <div class="panel-heading" style="background-color: #fff; margin:5px;"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;已关注的话题动态<a style="float:right;color:#9999;">共关注 23 个话题</a></div>
					  <div class="panel-body">
						<ul class="list-inline">
						  <li><a href="" class="topics">关注话题</a></li>
						  <li><a href="" class="topics">关注话题</a></li>
						  <li><a href="" class="topics">关注话题</a></li>
						  <li><a href="" class="topics">关注话题</a></li>
						  <li><a href="" class="topics">关注话题</a></li>
						  <li><a href="" class="topics">关注话题</a></li>
						  <li><a href="" class="topics">关注话题</a></li>
						  <li><a href="" class="topics">关注话题</a></li>
						  <li><a href="" class="topics">关注话题</a></li>
						  <li><a href="" class="topics">关注话题</a></li>
						  <li><a href="" class="topics">关注话题</a></li>
						  <li><a href="" class="topics">关注话题</a></li>
						</ul>
					  </div>
					</div>

				</div>
			</div>
			<!-- 所有二级子话题展示区 -->
			<div class="row" style="margin-bottom:30px;">
				<div class="col-xs-12 col-md-11">

					<div class="row">
						<div class="col-xs-12 col-md-12" style="">
							<div class="row" style="position: relative;">
								<!-- 图片区 -->
								<div class="col-xs-1 col-md-1" style="">
									<img style="width:50px;height:50px;border-radius: 5px;margin-top: 25px;" class="f-fl"src="/uploads/1447135897105.png" alt="">
								</div>
								<!-- 文字区 -->
								<div class="col-xs-10 col-md-10" style="">
									<div class="row" style="padding: 17px;word-wrap: break-word;    margin-top: 18px;">
										<a href="" style="color:#259;"><b>话题名称</b></a>
										<a href="" style="float:right;color:#698ebf;">时间排序</a>
										<a href="" style="float:right;color:#999;">热门排序|</a>
									</div>
								</div>
							</div>
						</div>						
					</div>
				</div>
			</div>			

			<div class="row">
				<div class="col-xs-12 col-md-11" >

					<div class="row">
						<!-- 问题 -->
						<div class="col-xs-12 col-md-12" style=""><b><a href="" style="color:blue;">从经济学角度看，双十一什么也不买，是种损失吗？</a></b></div>
						<!-- 回答 -->
						<div class="col-xs-12 col-md-12" style="margin-top:8px;">
							<div class="row">
								<div class="ol-xs-1 col-md-1" style="width: 5.333333%;">
									<a class="agran">12</a>
								</div>
								<div class="ol-xs-11 col-md-11 tops">
									<p><b>安晓辉</b><span style="color:#999;">《程序员的成长课》作者，职业规划师，自…</p>
										<P style="line-height: 21px;">谢邀。 正午肯拍，王凯肯演，都要烧高香了。其他事情，都是次要的了。 书粉可以继续不满，但听不听是剧方的事。影视化对作者是极其强烈的诱惑，书粉根本无力抵挡。 想想《笑傲江湖》的“东方姑娘”，酱油改主角，男人改女人，官配变小三，播出来以后照样能…<a href="" style="color:blue;">显示全部</a></P>
										<p style="margin:5px 0px;">
											<a href="javascript:;"><span class="glyphicon glyphicon-plus"></span>关注问题</a>  
											<a href="#"><span class="glyphicon glyphicon-comment"></span> 1 条评论</a>  
											<a href="#"><span class="glyphicon glyphicon-bookmark"></span> 收藏</a> 
											<a href="#">• 举报</a>
										</p>
								</div>
							</div>
						</div>						
					</div>
				</div>
			</div>

		</div>

		<!-- 侧边栏 -->
		<div class="col-xs-6 col-md-4">
			<div class="blkuang">
				<a href="/topics" class="btn btn-primary">进入话题广场</a>
				<a href="/topics" style="color:blue;margin: 0px 110px;">来这里发现更多有趣话题</a>
			</div>
		</div>


		<div class="col-xs-6 col-md-4" style="">
			<div class="list-group" >
			<div style="border-bottom: 1px solid #999;">
		  <a href="#" class="list-group-item">
		  	<span><b>其他人关注的话题</b></span>
		  	<span style="float:right; color:blue;">换一换</span>
		  </a>
		  	</div>
		  	
		  <div style="border-bottom: 1px solid #eee;"><a href="#"  class="list-group-item"><img style="width:40px;height:40px;border-radius:4px;" class="f-fl"src="/uploads/1447135897105.png" alt="">&nbsp;<span style="color:blue;position: absolute;top: 19px;"><b>热门话题</b></span></a><a style="    position: absolute;top: 58px;right: 28px;color:blue;"><span style="color:#ddd;" class="glyphicon glyphicon-plus ops" aria-hidden="true"></span>关注</a>
		  </div>
		  	
		</div>
		</div>
	</div>
</div>
@endsection