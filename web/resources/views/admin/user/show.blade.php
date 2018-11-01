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
				<th>封面</th>
				<td>
					<img src="..." alt="..." class="img-thumbnail">
				</td>
			</tr>
			<tr>
				<th>头像</th>
				<td>
					<img src="..." alt="..." class="img-thumbnail">
				</td>
			</tr>
			<tr>
				<th>性别</th>
				<td>
					<p class="text-primary text-center">
						
						@if ( $user->userinfo()->find($id)->sex == 0 )
						女
						@else if ( $user->userinfo()->find($id)->sex == 1 )
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
	</div>
</body>
</html>