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
	.gs{
		background: #1e7bd0;
		color: #fff;
		
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
	.pl{
		    box-shadow: 0px 1px 4px #888888;
		margin-top: 10px;
		margin-left:30px;
	}
	.pl div{
		border-bottom: 1px solid #eee;
	}
	.my{
		height: 116px;
    	line-height: 116px;
    	text-align: center;
    	color: #999;
	}
	.plnr div
	{
		border:0;
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
					  	@if($utopic != null)
						<ul class="list-inline">
								@foreach($utopic as $k => $v)
						  			<li><a href="/topic/{{$v->id}}" class="topics @if($id == $v->id) gs @endif">{{$v->tname}}</a></li>
						  		@endforeach
						</ul>
						@else
						<div>
							<a href="/topics" class="btn btn-primary">您还没有关注话题进入话题广场-来这里发现更多有趣话题</a>
						</div>
						@endif
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
								@if($utopic != null)
								<!-- 图片区 -->
								<div class="col-xs-1 col-md-1" style="">
									<img style="width:50px;height:50px;border-radius: 5px;margin-top: 25px;" class="f-fl"src="@foreach($utopic as $k => $v)@if($id == $v->id) {{$v->topic_details->timg}} @endif @endforeach" alt="">
								</div>
								<!-- 文字区 -->
								<div class="col-xs-10 col-md-10" style="">
									
									<div class="row" style="padding: 17px;word-wrap: break-word;    margin-top: 18px;">
										<a href="/topic/{{$id}}/hot" style="color:#259;"><b>
											@foreach($utopic as $k => $v)  
												@if($id == $v->id) {{$v->tname}} @endif 
										@endforeach</b></a>
										<a href="/topicyt/{{$id}}/created_at" style="float:right;color:#698ebf;">时间排序</a>
										<a href="/topicyt/{{$id}}/" style="float:right;color:#698ebf;">热门排序|</a>
									</div>
									
								</div>
								@endif
							</div>
						</div>						
					</div>
				</div>
			</div>			

			<div class="row" >
				<div class="col-xs-12 col-md-11" >
					@if($problem != null)
					@foreach($problem as $k=>$v)
					<div class="row">
						<!-- 问题 -->
						<div class="col-xs-12 col-md-12" style="margin-top: 5px;"><b><a href="" style="color:blue;">{{$v->pname}}</a></b></div>
						<!-- 回答 -->
						@if($v->reply != null)
						<div class="col-xs-12 col-md-12" style="margin-top:8px;">
							<div class="row">
								<div class="ol-xs-1 col-md-1" style="width: 5.333333%;">
									<div class="agran{{$v->reply->id}}">
									<a href="javascript:;" onclick="funagree({{$v->reply->id}},{{$v->reply->agree}})" class="agran">{{$v->reply->agree}}</a></div>
								</div>
								<div class="ol-xs-11 col-md-11 tops" style="margin-left: 20px;">
									<p><b>{{$v->reply->user->uname}}</b><span style="color:#999;">&nbsp;{!! $v->reply->user->signature !!}</span></p>
										<p style="line-height: 21px;" class="con{{$v->reply->id}}">{{mb_substr($v->reply->reply_content['content'],0,120)}}<a href="javascript:;" style="color:blue;" onclick='contents("1","{{$v->reply->reply_content["content"]}}","{{mb_substr($v->reply->reply_content["content"],0,120)}}",{{$v->reply->id}})'>显示全部</a></p>
										<p style="margin:5px 0px;" class="hotopic"> 
											<a href="javascript:;" onclick="comments(this,{{$v->reply->id}});"><span class="glyphicon glyphicon-comment"></span>{{$v->reply->comment}}条评论</a>  
											<a href="#">• 举报</a>
										</p>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-12 pl coms{{$v->reply->id}}" style="display:none;">
							@if($v->reply->comment()->get()== '[]')
							<div class="row">
								<div class="col-xs-12 col-md-12 my">
									还没有评论,来成为第一个吧。
								</div>
							</div>
							@else
							@foreach($v->reply->comment()->get() as $k=>$v)							
							<div class="row">
								<div class="col-xs-12 col-md-12 plnr">
									<div class="" style="margin-top: 6px;"><img style="width:24px;height:24px;border-radius: 5px;" class="f-fl"src="{{$v->user_detail()->first()->face}}" alt="">{{$v->user_detail()->first()->uname}}</div>
									<div style="margin:10px 0px;">{{$v->content}}</div>
									<div class="" style="color:#999;"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>{{$v->cagree}}</div>
								</div>
							</div>
							@endforeach
							@endif
							<div class="row mso{{$v->reply->id}}">
								<div class="col-xs-12 col-md-12" style="height: 43px;line-height: 43px;background-color: #eee;">
									评论（{{$v->reply->comment()->select('*',DB::raw('count(rid) as raid'))->value('raid')}}）
								</div>
							</div>														
							<div class="row" >
								<div class="col-xs-12 col-md-12" style="margin: 12px 1px;border:0;">
									 <input type="text" class="form-control" id="comment" style="width:590px;display: initial;" placeholder="评论">
									<input type="submit" onclick="tjcom({{$v->reply->id}});" class="btn btn-success" value="评论">
								</div>
							</div>
						</div>
						@endif						
					</div>
					@endforeach
					@endif
				</div>
			</div>

		</div>

		<!-- 侧边栏 -->
		<div class="col-xs-6 col-md-4">
			<div class="blkuang">
				<a href="/topics" class="btn btn-primary">进入话题广场</a>
				<a href="/topics" style="color:blue;margin: 0px 98px;">来这里发现更多有趣话题</a>
			</div>
		</div>


		<div class="col-xs-6 col-md-4" style="">
			<div class="list-group" >
			<div style="border-bottom: 1px solid #999;">
		  <a href="/topic" class="list-group-item">
		  	<span><b>其他人关注的话题</b></span>
		  	<span style="float:right; color:blue;">换一换</span>
		  </a>
		  	</div>
		  	@foreach($topicgs as $k=>$v)
		  <div ><a href="/topic/{{$v->id}}/hot"  class="list-group-item" style="width:296px;display: inline-block;"><img style="width:40px;height:40px;border-radius:4px;" class="f-fl"src="/uploads/1447135897105.png" alt="">&nbsp;<span style="color:blue;"><b>{{$v->tname}}</b></span></a><div class="ufi{{$v->id}}" style="display:inline;"><a href="javascript:;" onclick="utopic(this,'1',{{$v->id}})" style="color:blue;"><span style="color:#ddd;" class="glyphicon glyphicon-plus ops" aria-hidden="true"></span>关注</a></div>
		  </div>
		  	@endforeach
		</div>
		</div>
	</div>
</div>
@endsection
<script type="text/javascript" src="/static/home/bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
	function utopic(obj,typ,tid){
		$.post('/topic/utopic',{'_token':'{{csrf_token()}}','typ':typ,'tid':tid},function(msg){
				$('.ufi'+tid).html("<a href='javascript:;' style='color:blue;'>已关注</a>");
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
	function comments(obj,tid)
	{
		$('.coms'+tid).slideToggle();
	}

	function tjcom(rid)
	{
		var comtent = $('#comment').val();
		if(comtent){
			$.post('/comment/tcom',{'_token':'{{csrf_token()}}','rid':rid,'content':comtent},function(msg){
				if(msg == '1'){
					alert('评论失败请重新评论!!!');
				}else{
					$('.mso'+rid).before(msg);
				}
			},'html');
		}else{
			alert('请评论!!!');
		}
	}

	function contents(type,con,com,rid)
	{

		if(type == '1'){
			$('.con'+rid).empty();
			$('.con'+rid).append(con+'<a href="javascript:;" style="color:blue;" onclick="contents(2,\''+con+'\',\''+com+'\','+rid+')">收起</a>');
		}else{
			$('.con'+rid).empty();
			$('.con'+rid).append(com+'<a href="javascript:;" style="color:blue;" onclick="contents(1,\''+con+'\',\''+com+'\','+rid+')">查看全部</a>');
		}
	}
</script>