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
									<div class="col-md-2">
										<a href="/home/problem/{{ $v->id }}" class="btn btn-default btn-sm">回答</a>
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
										<h3><a href="">{!! $v->describe !!}</a></h3>
										
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
									<div class="col-md-2">
										<a href="/home/problem/{{ $v->id }}" class="btn btn-default btn-sm">回答</a>
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
									<div class="col-md-2">
										<a href="/home/problem/{{ $v->id }}" class="btn btn-default btn-sm">回答</a>
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
					<a href="{{ $v->url }}" target="_blank"><img src="{{ $v->logo }}" width="80"  border="1" align="absmiddle"></a>
				@endforeach 
				</div>
			</div>
			<!-- 个人收藏 结束 -->
			
			<!-- 侧边栏 end -->
		</div>
	</div>


@endsection
