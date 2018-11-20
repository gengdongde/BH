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
		.gs{
		background: #1e7bd0;
		color: #fff;
		
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
					  <div class="panel-heading" style="background-color: #fff; margin:5px;"><span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>&nbsp;话题广场<a style="float:right;color:#9999;">已关注</a></div>
					  <div class="panel-body">
						<ul class="list-inline">
							@foreach($topicy as $k => $v)
						  <li><a href="/topics/{{$v->id}}" class="topics @if($ftopice->id == $v->id) gs @endif">{{ $v->tname }}</a></li>
						   @endforeach
						</ul>
					  </div>
					</div>

				</div>
			</div>
			<!-- 所有二级子话题展示区 -->
			<div class="row">
				<div class="col-xs-12 col-md-11">
					<div class="row">
						<div class="col-xs-6 col-md-6" style="">
							<div class="row" style="position: relative;">
								<!-- 图片区 -->
								<div class="col-xs-2 col-md-2" style="">
									<img style="width:50px;height:50px;border-radius: 5px;margin-top: 25px;" class="f-fl"src="{{$ftopice->topic_details->timg}}" alt="">
								</div>
								<!-- 文字区 -->
								<div class="col-xs-10 col-md-10" style="">
									<div class="row" style="padding: 17px;word-wrap: break-word;">
										<a href="/topic/{{$ftopice->id}}/hot" style="color:#259;"><b>{{$ftopice->tname}}</b></a>
										<p style="width:239px;margin:3px;">{{mb_substr($ftopice->topic_details->content,0,30)}}...</p>
										<div class="ufi{{$ftopice->id}}">
										<a href="javascript:;" class="ufi" @if(empty($ftopice->tis)) onclick="utopic(this,'1',{{$ftopice->id}})" @else onclick="utopic(this,'2',{{$ftopice->id}})" @endif style="position:absolute; right:15px; top:18px;color:#698ebf;">@if(empty($ftopice->tis))<span style="color:#ddd;" class="glyphicon glyphicon-plus" aria-hidden="true"></span>关注@else 取消关注 @endif</a>
									</div>
									</div>
								</div>
							</div>
						</div>											
						@foreach($topice as $k=>$v)
						<div class="col-xs-6 col-md-6" style="">
							<div class="row" style="position: relative;">
								<!-- 图片区 -->
								<div class="col-xs-2 col-md-2" style="">
									<img style="width:50px;height:50px;border-radius: 5px;margin-top: 25px;" class="f-fl"src="{{$v->topic_details->timg}}" alt="">
								</div>
								<!-- 文字区 -->
								<div class="col-xs-10 col-md-10" style="">
									<div class="row" style="padding: 17px;word-wrap: break-word;">
										<a href="/topic/{{$v->id}}/hot" style="color:#259;"><b>{{$v->tname}}</b></a>
										<p style="width:239px;margin:3px;">{{mb_substr($v->topic_details->content,0,30)}}...</p>
										<div class="ufi{{$v->id}}">
										<a href="javascript:;" class="ufi" @if(empty($v->tis)) onclick="utopic(this,'1',{{$v->id}})" @else onclick="utopic(this,'2',{{$v->id}})" @endif style="position:absolute; right:15px; top:18px;color:#698ebf;">@if(empty($v->tis))<span style="color:#ddd;" class="glyphicon glyphicon-plus" aria-hidden="true"></span>关注@else 取消关注 @endif</a>
									</div>
									</div>
								</div>
							</div>
						</div>						
						@endforeach
					</div>

				</div>
			</div>
		</div>

		<!-- 侧边栏 -->
		<div class="col-xs-6 col-md-4" style="">
			<div class="list-group" >
			<div style="border-bottom: 1px solid #999;">
		  <a href="#" class="list-group-item">
		  	<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
		  	<span>热门话题</span>
		  	<span style="float:right;">更多推荐 »</span>
		  </a>
		  	</div>
		  	@foreach($topicr as $k => $v)
		  <div style="border-bottom: 1px solid #eee;"><a href="/topic/{{$v->id}}/hot"  class="list-group-item"><img style="width:40px;height:40px;border-radius:4px;" class="f-fl" src="/uploads/1447135897105.png" alt="">&nbsp;<span style="color:blue;">{{ $v->tname }}</span><span style="float:right;color:#999999;">{{$v->taid}}&nbsp;人关注</span></a>
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
			if(msg == '1'){
				$('.ufi'+tid).html('<a href="javascript:;" class="ufi" onclick="utopic(this,1,'+tid+')" style="position:absolute; right:15px; top:18px;color:#698ebf;"><span style="color:#ddd;" class="glyphicon glyphicon-plus" aria-hidden="true"></span>关注</a>');
			}else{
				$('.ufi'+tid).html("<a href='javascript:;' class='ufi' onclick='utopic(this,2,"+tid+")' style='position:absolute; right:15px; top:18px;color:#698ebf;'>取消关注</a>");
			}
		},'html');
	}
</script>