@extends('admin.layout.index')
@section('content')
	
	<div class="container" >
		
		<table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline">
			<tr>
				<td>ID</td>
				<td>用户名</td>
				<td>手机号</td>
				<td>邮箱</td>
				<td>性别</td>
				<td>地址</td>
				<td>头像</td>
			</tr>
			@foreach($users as $k=>$v)
			<tr>
				<td>{{ $v->id }}</td>
				<td>{{ $v->userinfo()->find($v->id)->uname }}</td>
				<td>{{ $v->tel }}</td>
				<td>{{ $v->email }}</td>
				<td>
					@if($v->userinfo()->find($v->id)->sex == 0)
					女
					@elseif($v->userinfo()->find($v->id)->sex == 1)
					男
					@endif
				</td>
				<td>{{ $v->userinfo()->find($v->id)->addr }}</td>
				<td>
					<img src="{{ $v->userinfo()->find($v->id)->face }}" style="width:150px;">
				</td>
			</tr>
			@endforeach
		</table>
		<div >
			<a href="JavaScript:history.go(-1)" class="btn btn-success pull-right">返回上一页</a>
		</div>
	</div>
@endsection