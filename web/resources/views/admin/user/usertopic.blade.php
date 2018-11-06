@extends('admin.layout.index')
@section('content')
	<div class="container" style="width:300px;">
		<ul class="bg-info"">
			@foreach($tops as $k=>$v)
				<li class="btn btn-info" style="margin:5px;">{{ $v->tname }}</li>
			@endforeach
		</ul>
		
		<div>
			<a href="JavaScript:history.go(-1)" class="btn btn-success pull-right">返回上一页</a>
		</div>
	</div>


@endsection