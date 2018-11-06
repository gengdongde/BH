@extends('admin.layout.index')
@section('content')
	<div class="container">
		
		<table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline">
			<tr>
				<td>用户ID</td>
				<td>用户名</td>
				<td>封面</td>
				<td>头像</td>
				<td>性别</td>
				<td>一句好介绍</td>
				<td>地址</td>
			</tr>
			<tr>
				<td>{{$id}}</td>
				<td>{{ $user->userinfo->find($id)->uname }}</td>
				<td>
					<img src="{{ $user->userinfo()->find($id)->cover }}" alt="" class="img-thumbnail" style="width:100px;">
				</td>
				<td>
					<img src="{{ $user->userinfo()->find($id)->face }}" alt="" class="img-thumbnail" style="width:100px;">
				</td>
				<td>
					<p class="text-primary text-center">
						
						@if( $user->userinfo()->find($id)->sex == 0 )
						女
						@elseif( $user->userinfo()->find($id)->sex == 1 )
						男
						@endif
						
					</p>
				</td>
				<td>
					<p class="text-primary text-center">
						{{ $user->userinfo()->find($id)->signature }}
					</p>
				</td>
				<td>
					<p class="text-primary text-center">
						{{ $user->userinfo()->find($id)->addr }}
					</p>
				</td>
			</tr>
		</table>
		<div >
			<a href="JavaScript:history.go(-1)" class="btn btn-success pull-right">返回上一页</a>
		</div>
	</div>

@endsection
