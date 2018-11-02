@extends('admin.layout.index')
@section('content')
	<div class="container" style="width:300px;">
		
		<table class="table bg-info">
			<tr>
				<th>封面</th>
				<td>
					<img src="{{ $user->userinfo()->find($id)->cover }}" alt="" class="img-thumbnail" style="width:100px;">
				</td>
			</tr>
			<tr>
				<th>头像</th>
				<td>
					<img src="{{ $user->userinfo()->find($id)->face }}" alt="" class="img-thumbnail" style="width:100px;">
				</td>
			</tr>
			<tr>
				<th>性别</th>
				<td>
					<p class="text-primary text-center">
						
						@if( $user->userinfo()->find($id)->sex == 0 )
						女
						@elseif( $user->userinfo()->find($id)->sex == 1 )
						男
						@endif
						
					</p>
				</td>
			</tr>
			<tr>
				<th>一句好介绍</th>
				<td>
					<p class="text-primary text-center">
						{{ $user->userinfo()->find($id)->signature }}
					</p>
				</td>
			</tr>
			<tr>
				<th>地址</th>
				<td>
					<p class="text-primary text-center">
						{{ $user->userinfo()->find($id)->addr }}
					</p>
				</td>
			</tr>
		</table>
		<div class="btn btn-success pull-right">
			<a href="JavaScript:history.go(-1)">返回上一页</a>
		</div>
	</div>

@endsection
