@extends('admin.layout.index')

@section('content')

	<div id="page-wrapper" style="min-height: 443px;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ $title or '' }}</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                            	<div class="row">
                            		<form action="/admin/user" method="get">
                            			<div class="col-sm-6">
	                            			<div id="dataTables-example_filter" class="dataTables_filter">
	                            				<label>用户名:<input type="text" name="uname" class="form-control input-sm" placeholder="关键字" aria-controls="dataTables-example"></label>
	                            				<button class="btn bnt-success">查询</button>
	                            			</div>
	                            		</div>
                            		</form>
                            		
                            	</div>
                            	<div class="row">
                            		<div class="col-sm-12">
                            			<table width="100%" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info" style="width: 100%;">
			                                <thead>
			                                    <tr role="row">
			                                    	<td>Id</td>
			                                    	<td>用户名</td>
			                                    	<td>手机号</td>
			                                    	<td>邮箱</td>
			                                    	<td>注册时间</td>
			                                    	<td>用户详情</td>
			                                    	<td>操作</td>
			                                    </tr>
			                                </thead>
			                                <tbody>
			                                @foreach($users as $k=>$v)      
				                                <tr class="gradeA odd" role="row">
				                                	<td>{{ $v->id }}</td>
				                                	<td>{{ $v->userinfo()->find($v->id)->uname }}</td>
				                                	<td>{{ $v->tel }}</td>
				                                	<td>{{ $v->email }}</td>
				                                	<td>{{ $v->created_at }}</td>

				                                	<td>
				                                		<a href="">详情</a>
				                                	</td>
				                                	<td>
				                                		<a href="/admin/user/{{ $v->id }}/edit">修改</a>
				                                		<a href="">删除</a>
				                                	</td>
			                                        
				                                </tr>
				                            @endforeach
				                            </tbody>
			                            </table>
			                            <div>
			                            	{!! $users->appends(['uname'=>$request])->render() !!}
			                            </div>
			                        </div>
			                    </div>
			                   
			                </div>
                            <!-- /.table-responsive -->
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>

@endsection