@extends('admin.layout.index')
@section('content')
	<div class="container" style="width:300px;">
		<div class="bg-success">
			@foreach($tops as $k=>$v)
				<a href="javascript:;" class="btn btn-info" style="margin: 5px;">{{ $v->tname }}</a>
			@endforeach
		</div>
		
		<div class="btn btn-success pull-right" style="margin:5px;">
			<a href="JavaScript:history.go(-1)" class="text-muted" style="color: #fff;">返回上一页</a>
		</div>
	</div>


@endsection