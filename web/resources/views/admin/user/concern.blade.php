<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	
	<div class="containter">
		<h1 class="text-info text-center">{{ $title or '' }}</h1>
		<table class="table table-condensed bg-info table-striped">
			<tr>
				<td>手机号</td>
				<td>用户名</td>
			</tr>
			@foreach($users as $k=>$v)
			<tr>
				<td>{{ $v->tel }}</td>
				<td>{{ $v->userinfo()->find($v->id)->uname }}</td>
			</tr>
			@endforeach
		</table>
	</div>
</body>
</html>