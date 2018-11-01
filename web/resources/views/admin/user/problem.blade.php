<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	
	<div class="containter">
		<h1 class="text-info text-center">{{ $title or '' }}</h1>
		<table class="table table-condensed bg-info">
			<tr>
				<td>类型</td>
				<td>问题</td>
				<td>描述</td>
				<td>点击量</td>
				<td>举报</td>
				<td>操作</td>	
			</tr>
			@foreach($data as $k=>$v)
			<tr>
				<td>{{ $v->tname }}</td>
				<td>{{ $v->pname }}</td>
				<td>{{ $v->describe }}</td>
				<td>{{ $v->clicks }}</td>
				<td>{{ $v->report }}</td>
				<td><a href="">删除</a></td>
			</tr>
			@endforeach			
		</table>
	</div>
</body>
</html>