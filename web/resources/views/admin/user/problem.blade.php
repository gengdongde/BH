@extends('admin.layout.index')
@section('content')
	<div class="container">
		
		<table class="table table-condensed bg-info">
			<tr>
				<td>类型</td>
				<td>问题</td>
				<td>描述</td>
				<td>点击量</td>
				<td>是否合法</td>
				<td>发布时间</td>
				<td>操作</td>	
			</tr>
			@foreach($data as $k=>$v)
			<tr>
				<td>{{ $v->problemtopic()->find($v->tid)->tname }}</td>
				<td>{{ $v->pname }}</td>
				<td>{{ $v->describe }}</td>
				<td>{{ $v->clicks }}</td>
				<td>
					
					@if($v->report == 0)
					正常
					@elseif($v->report == 1)
					低质问题
					@elseif($v->report == 2)
					垃圾广告
					@elseif($v->report == 3)
					要害信息
					@elseif($v->report == 4)
					涉嫌侵权
					@endif
				</td>
				<td>{{ $v->created_at }}</td>
			
				<td>
					

					<a href="/admin/problem/{{$v->id}}/delete" class="btn btn-danger btn-sm">删除</a>
				</td>
			</tr>
			@endforeach			
		</table>
		<div class="btn btn-success pull-right">
			<a href="JavaScript:history.go(-1)">返回上一页</a>
		</div>
	</div>


@endsection
