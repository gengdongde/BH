@extends('home.layout.index')
@section('content')

	<div class="container">
		<div class="row" id="info">
			<div class="col-md-12" style="background: #fff;">
				<!-- 封面 开始 -->
				<div class="row" id="cover" style="height:240px;background: #ccc;">
					<div class="col-xs-12 col-md-12 user_cover" style="padding:0px;">
					    <img src="{{ $user->cover }}" alt="..." class="" onerror="this.src='/uploads/001.jpg'" height="240" width="100%" style="padding: 0px;">
					</div>
				</div>
				
				<div class="row">
					<!-- 头像 开始 -->
					  <div class="col-xs-6 col-md-2" id="face">
					    <img src="{{ $user->face }}" alt="..." class="" height="160" width="160" onerror="this.src='/uploads/1447135897105.png'" style="position: relative;top:-68px;border:4px solid #fff;border-radius: 4px;">
					  </div>
					<!-- 头像 结束 -->

					<div class="col-md-7">
						<div class="row" style="heigth:40px;">
							<div class="col-md-3">
								<span><font style="font-size: 26px;font-weight:bold;line-height: 40px;">{{ $user->uname or '' }}</font></span>
							</div>
							<div class="col-md-4">
								<span><font style="font-size: 16px;font-weight:bold;line-height: 40px;">{{ $user->signature or '' }}</font></span>
								
							</div>
						</div>
						<div class="row" style="height:40px;">
							<div class="col-md-1">
								<span class="btn-lg" style="line-height: 40px;">
									@if($user->sex == 0)
									<span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
									@elseif($user->sex == 1)
									<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
									@endif
								</span>
							</div>
							<div class="col-md-5">
								<span>
									<font style="font-size: 16px;font-weight:bold;line-height: 40px;">{{ $user->addr or '' }}</font>
								</span>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="row" >
			<div class="col-md-8" style="background: #fff;margin-top: 10px;">
				<div class="aTabLayout YaHei">
					<ul class="aTabNav clearfix">
					  <li class="current"><a href="javascript:">提问</a></li>
					  <li class=""><a href="javascript:">回答</a></li>
					  
					</ul>
					
					<div class="topicsImgTxtBar aTabMain">
						<!-- 提问 开始 -->
						<ul class="imgTxtBar clearfix imgTxtBar-b aTabActive" style="display: block;">
							@foreach($user_pro as $k=>$v)
							<li class="clearfix">
								<div class="row">
									<div class="col-md-2">
										<span>发布了问题</span>
									</div>
									
								</div>
								
								<div class="row">
									<div class="col-md-12">
										<span><font style="font-size: 20px;font-weight: bold;">{{ $v->pname }}</font></span>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<span><font style="font-size: 10px;">　{{ $v->created_at }}　{{ $v->reply or '0' }}条回答</font></span>
									</div>
								</div>
							</li>
							@endforeach
						</ul>
						<!-- 提问 结束 -->
						<!-- 回答 开始 -->
						<ul class="imgTxtBar clearfix imgTxtBar-b" style="display: none;">
							@foreach($user_rep as $k=>$v)
							<li class="clearfix">
								<div class="row">
									<div class="col-md-8">
										<span><font style="font-size: 20px;font-weight: bold;">{{ $v->problem($v->pid)->first()->pname }}</font></span>
									</div>
								</div>
								<div class="row">
									<div class="col-md-1">
										<img src="{{ $user->face }}" alt="..." class="" height="40" width="40" onerror="this.src='/uploads/1447135897105.png'" style="border:1px solid #fff;border-radius: 4px;">
									</div>
									<div class="col-md-11">
										<div class="row">
											<div class="col-md-12">
												<span><font style="font-size: 16px;font-weight:bold;">{{ $user->uname or '' }}</font></span>
											</div>
											
										</div>
										<div class="row">
											<div class="col-md-12">
												<span><font style="font-size: 16px;">{{ $user->signature or '' }}</font></span>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<span><font style="font-size: 20px;">{{ $v->reply_content($v->id)->first()->content }}</font></span>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<span><font style="font-size: 10px;">发布与　{{ $v->created_at }}</font></span>
									</div>
								</div>
							</li>
							@endforeach
						</ul>
						<!-- 回答 结束 -->
					</div>
				</div>
			</div>
			<div class="col-md-4" style="margin-top: 10px;">
				<div class="panel panel-default">
				  <!-- Default panel contents -->
					<div class="panel-heading">个人成就</div>
					<table class="table">
						<tr>
							<td>提问</td>
							<td>回答</td>
						</tr>
						<tr>
							<td>{{ $pro_num }}</td>
							<td>{{ $rep_num }}</td>
						</tr>
					</table>
				</div>
			</div>
			
		</div>
		
	</div>	

@endsection