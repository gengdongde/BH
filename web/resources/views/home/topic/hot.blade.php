@extends('home.layout.index')
@section('content')
<style type="text/css">
	.znr{
		border-radius:3px;
		box-shadow: 0px 1px 4px #eee;
		background:#fff;
	}
	.pse p{
		margin-top:8px;
		    font-size: 15px;
   		 color: #646464;
   		 line-height: 26px;
	}
	.xang li{
		display: inline-block;
		height: 45px;
    	line-height: 45px;
		padding: 0px 23px;
		    font-size: 20px;
	}
	.xang li a:hover{
	color:blue;
	text-decoration:none;
	}
	.xzd{
		border-bottom: 2px solid blue;
	}
	.gxqu{
		border-radius:3px;
		margin-top:10px;
		background:#fff;
		box-shadow: 0px 1px 4px #eee;
	}
	.gxqu p{
		margin-top:8px;
		    font-size: 17px;
   		 color:#646464;
   		 line-height: 24px;
	}
	.chebl{
		margin-top:10px;
		background:#fff;
		box-shadow: 0px 1px 4px #eee;
	}
	.gzz{
		border-right:1px solid #ddd;
	}
	.gzz,.wts{
	padding: 16px 0; 
    text-align: center;
	}
	.chebl span{
		color:#999;
		font-size:18px;
	}
	.chebl p{
		font-size:22px;
	}
	.hy{
		text-align: center;
		border-radius:7px;
		margin-top:10px;
		margin-left:0px;
		background:#fff;
		box-shadow: 0px 1px 4px #eee;
	}

	.hy span{
		font-weight:bold;
		font-size:20px;
	}
	.user{
		margin-top:10px;
		background:#fff;

	}
	.topics{
		background:#fff;
	}
</style>
<div class="container">
	<div class="row">
		<!-- 主内容 -->
		<div class="col-xs-12 col-md-8">
			<div class="row znr">
				<div class="col-xs-12 col-md-12">
					<div class="row" style="padding: 15px 5px;border-bottom: 1px solid #ddd;">
								<!-- 图片区 -->
						<div class="col-xs-2 col-md-2" style="margin-right: 8px;">
							<img style="width:125px;height:125px;border-radius: 5px;" class="f-fl"src="/uploads/1447135897105.png" alt="">
						</div>
						<!-- 文字区 -->
						<div class="col-xs-9 col-md-9 pse" style="">
							<span><h3><b>话题标题</b></h3></span>
							<p>动漫，即动画、漫画的合称，指动画与漫画的集合，取这两个词的第一个字合二为一称之为“动漫”，与游戏无关，并非专业术语。其中，日…<a href="" style="color:blue;">查看全部简介​</a></p>
							<p><a href="javascript:;"  class="btn btn-info">关注话题</a></p>
						</div>
					</div>
				</div>
				<!-- 选项 -->
				<div class="col-xs-12 col-md-12">
					<ul class="xang">
						<li class="xzd"><a href="">简介</a></li>
						<li><a href="">讨论</a></li>
					</ul>
				</div>
			</div>
			<!-- 简介 -->
			<div class="row gxqu" style="padding: 15px 5px;">
				<div class="col-xs-12 col-md-12">
					<span><h3><b>话题</b></h3></span>
					<p style="padding-bottom:20px;margin-bottom:20px;border-bottom:1px solid #ddd;">动漫，即动画、漫画的合称，指动画与漫画的集合，取这两个词的第一个字合二为一称之为“动漫”，与游戏无关，并非专业术语。其中，日本动漫是动漫领域中的典型代表，是动漫领域的领军人。 在很多场合，“动漫”一词被误用于指“动画”，十分容易引发歧义。</p>
					<span><h3><b>更多信息</b></h3></span>
					<div class="row" style="margin-top:15px;font-size:20px;color:#999;">
						<div class="col-xs-6 col-md-4">
							<b>中文名</b>
						</div>
						<div class="col-xs-6 col-md-6">
							动漫
						</div>
					</div>
				</div>
			</div>
			<!-- 结束 -->
		</div>
		<!-- 侧边栏 -->
		<div class="col-xs-12 col-md-4">
			<div class="row"  style="margin-left:0px;">
				<div class="col-xs-12 col-md-12 chebl">
					<div class="col-xs-12 col-md-6 gzz">
						<span>关注者</span>
						<p><b>123,13,4</b></p>
					</div>
					<div class="col-xs-12 col-md-6 wts">
						<span>问题数</span>
						<p><b>123,13,4</b></p>
					</div>
				</div>
			</div>
			<div class="row hy">
				<div class="col-xs-12 col-md-12" style="padding:12px 0px;border-bottom:1px solid #eee;" >
					<span>活跃回答者</span>
				</div>
				<div class="col-xs-12 col-md-12 user">
					<div class="row" style="border-bottom:1px solid #eee;padding-bottom:10px;">
					<div class="col-xs-1 col-md-3">
					    <img src="/uploads/1447135897105.png" style="width:40px;height:40px;border-radius:4px;">
					</div>
					<div class="col-xs-11 col-md-9">
						<p><a style="font-size:15px;font-weight:bold;color: #444;" href="">疯癫的A兵者</a></p>
						<p style="color: #8590a6;">话题下 110 回答，54K 赞同</p>
					</div>
					</div>
				</div>
			</div>
			<div class="row hy">
				<div class="col-xs-12 col-md-12 topics" style="padding:12px 0px;">
					<p style="font-size:19px;font-weight:bold;color:#444;">父话题</p>
					<p></p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection