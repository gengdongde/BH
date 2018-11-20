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


	.user{
		margin-top:10px;
		background:#fff;

	}
	.topics{
		background:#fff;
	}
	.hots{
		margin-top:15px;
		border-radius:3px;
		background:#fff;
		box-shadow: 0px 1px 4px #eee;
	}
	.agran{
		padding: 8px;
    background: #eff6fa;
    color: #698ebf;
    border-radius: 5px;
	}
	.hotopic a{
color: #999;
	}
	.list-inline{
		display: inline-block;
    padding-right: 5px;
    padding-left: 5px;
	}
	a.topf:hover{
				background: #1e7bd0;
		color: #fff;
		 text-decoration:none;
	}
	.topf{
		    border: 1px solid #a5a5f1;
    display: block;
    height: 24px;
    border-radius: 13px;
    padding: 3px 5px 8px 5px;
    color: #1e7bd0;
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
							<img style="width:125px;height:125px;border-radius: 5px;" class="f-fl"src="{{$topic->topic_details->timg}}" alt="">
						</div>
						<!-- 文字区 -->
						<div class="col-xs-9 col-md-9 pse" style="">
							<span><h3><b>{{$topic->tname}}</b></h3></span>
							<p>{{mb_substr($topic->topic_details->content,0,65)}}<a href="/topic/{{$topic->id}}/intro" style="color:blue;">查看全部简介​</a></p>
							<p class="ufi">@if(!$iftopc)<a href="javascript:;" onclick="utopic(this,'1',{{$topic->id}})"  class="btn btn-info">关注话题</a>@else
								<a href="javascript:;" onclick="utopic(this,'2',{{$topic->id}})" class="btn btn-default" style="background:#eee;">取消关注</a>  
							   @endif
							</p>
						</div>
					</div>
				</div>
				<!-- 选项 -->
				<div class="col-xs-12 col-md-12">
					<ul class="xang">
						<li @if($type == 'intro') class="xzd" @endif><a href="/topic/{{$topic->id}}/intro">简介</a></li>
						<li @if($type == 'hot') class="xzd" @endif><a href="/topic/{{$topic->id}}/hot">讨论</a></li>
					</ul>
				</div>
			</div>
			<!-- 简介 -->
			<div class="row gxqu" style="padding: 15px 5px; @if($type != 'intro') display:none; @endif">
				<div class="col-xs-12 col-md-12">
					<span><h3><b>话题</b></h3></span>
					<p style="padding-bottom:20px;margin-bottom:20px;border-bottom:1px solid #ddd;">{{$topic->topic_details->content}}</p>
					<span><h3><b>更多信息</b></h3></span>
					<div class="row" style="margin-top:15px;font-size:20px;color:#999;line-height:35px;">
						<div class="col-xs-6 col-md-4">
							<b>中文名</b>
						</div>
						<div class="col-xs-6 col-md-6">
							{{$topic->tname}}
						</div>						
						<div class="col-xs-6 col-md-4">
							<b>英文名</b>
						</div>
						<div class="col-xs-6 col-md-6">
							{{$topic->topic_details->ename}}
						</div>						
						<div class="col-xs-6 col-md-4">
							<b>释义</b>
						</div>
						<div class="col-xs-6 col-md-6">
							{{$topic->topic_details->interpretation}}
						</div>
					</div>
				</div>
			</div>
			<!-- 结束 -->
			<div class="row hots" style="">
				<div class="col-xs-12 col-md-12">
					@foreach($problem as $k=>$v)
					<div class="row">
						<!-- 问题 -->
						<div class="col-xs-12 col-md-12" style="margin-top: 5px;"><b><a href="" style="color:blue;">{{$v->pname}}</a></b></div>
						<!-- 回答 -->
						<div class="col-xs-12 col-md-12" style="margin-top:8px;border-bottom: 1px solid #eee;">
							<div class="row">
								<div class="ol-xs-1 col-md-1" style="width: 5.333333%;">
									<div class="agran{{$v->reply->id}}">
									<a href="javascript:;" onclick="funagree({{$v->reply->id}},{{$v->reply->agree}})" class="agran">{{$v->reply->agree}}</a></div>
								</div>
								<div class="ol-xs-11 col-md-11 tops" style="margin-left: 20px;">
									<p><b>{{$v->reply->user->uname}}</b><span style="color:#999;">&nbsp;{{$v->reply->user->signature}}</span></p>
										<p style="line-height: 21px;">{{mb_substr($v->reply->reply_content['content'],0,120)}}<a href="" style="color:blue;">显示全部</a></p>
										<p style="margin:5px 0px;" class="hotopic"> 
											<a href="#"><span class="glyphicon glyphicon-comment"></span>{{$v->reply->comment}}条评论</a>  
											<a href="#">• 举报</a>
										</p>
								</div>
							</div>
						</div>						
					</div>
					@endforeach
				</div>
			</div>
		</div>
		<!-- 侧边栏 -->
		<div class="col-xs-12 col-md-4">
			<div class="row"  style="margin-left:0px;">
				<div class="col-xs-12 col-md-12 chebl">
					<div class="col-xs-12 col-md-6 gzz">
						<span>关注者</span>
						<p><b>{{$uts}}</b></p>
					</div>
					<div class="col-xs-12 col-md-6 wts">
						<span>问题数</span>
						<p><b>{{$topro}}</b></p>
					</div>
				</div>
			</div>

			<div class="row hy">
				<div class="col-xs-12 col-md-12 topics" style="padding:12px 0px;">
					<p style="font-size:19px;font-weight:bold;color:#444;">父话题</p>
					<p>
						<ul class="list-inline">
							@if(!empty($topf))
						  <li><a href="/topic/{{$topf->id}}/hot" class="topf">{{$topf->tname}}</a></li>
						  	@endif
					    </ul>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
<script type="text/javascript" src="/static/home/bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
	function utopic(obj,typ,tid){
		$.post('/topic/utopic',{'_token':'{{csrf_token()}}','typ':typ,'tid':tid},function(msg){
			if(msg == '1'){
				$('.ufi').html("<a href='javascript:;' onclick='utopic(this,1,"+tid+")'  class='btn btn-info'>关注话题</a>");
			}else{
				$('.ufi').html('<a href="javascript:;" onclick="utopic(this,2,'+tid+')" class="btn btn-default" style="background:#eee;">取消关注</a>');
			}
		},'html');
	}

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