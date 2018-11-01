@extends('admin.layout.index')

@section('content')

	
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                            	<div class="row">
                            		<form action="/admin/user" method="get">
                            			<div class="col-sm-6 col-md-offset-9">
	                            			<div id="dataTables-example_filter" class="dataTables_filter">
	                            				<label>用户名:<input type="text" name="uname" value="{{ $request or '' }}" class="form-control input-sm" placeholder="关键字" aria-controls="dataTables-example"></label>
	                            				<button class="btn bnt-success">查询</button>
	                            			</div>
	                            		</div>
                            		</form>                       
                            	</div>
                            	<div class="row btn btn-info" style="margin:5px;">
                            		
                            			<a href="/admin/user/create">添加用户</a>
                          
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
			                                    	
			                                    	<td>用户详情</td>
			                                    	<td>提问问题</td>
			                                    	<td>关注用户</td>
			                                    	<td>屏蔽用户</td>
			                                    	<td>关注话题</td>
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
				                                	

				                                	<td>
				                                		<a href="/admin/user/{{ $v->id }}" class="btn btn-primary " data-toggle="modal" data-target="#myModal">详情</a>
				                                	</td>
				                                	<td>
				                                		<a href="/admin/problem/{{ $v->id }}" class="btn btn-primary " data-toggle="modal" data-target="#myProblem">问题</a>
				                                	</td>
				                                	<td>
				                                		<a href="/admin/concern/{{ $v->id }}" class="btn btn-primary " data-toggle="modal" data-target="#myConcern">关注用户</a>
				                                	</td>
				                                	<td>
				                                		<a href="/admin/shield/{{ $v->id }}" class="btn btn-primary " data-toggle="modal" data-target="#myShield">屏蔽用户</a>
				                                	</td>
				                                	<td>
				                                		<a href="/admin/user/{{ $v->id }}" class="btn btn-primary " data-toggle="modal" data-target="#myModal">关注话题</a>
				                                	</td>
				                                	<td>
				                                		<a href="/admin/user/{{ $v->id }}/edit" class="btn btn-warning">修改</a>
				                                		<form action="/admin/user/{{ $v->id }}" method="post" style="display: inline-block;">
				                                			{{ csrf_field() }}
				                                			{{ method_field('DELETE') }}
				                                			<button class="btn btn-danger" onclick="if ( confirm ( '确认要加入黑名单吗?' ) == true ) { return true; } else { return false; } ">黑名单
				                                			</button>
				                                		</form>
				                                		<a href="/admin/user/{{ $v->id }}/remove" onclick="if ( confirm ( '确认要永久删除吗?' ) == true ) { return true; } else { return false; } " class="btn btn-warning">删除</a>
				                                	</td>
			                                        
				                                </tr>
				                            @endforeach
				                            </tbody>
			                            </table>
			                            <div class="text-center">
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
        <!-- myModal用户详情 开始-->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  	<div class="modal-dialog" role="document">
			    <div class="modal-content">
				   
				    <div class="modal-body">
				        ...
				    </div>
				    
			    </div>
		  	</div>
		</div>
		<!-- myModal用户详情 结束-->

		<!-- myConcern关注用户 开始 -->
		<div class="modal fade" id="myConcern" tabindex="-1" role="dialog" aria-labelledby="myConcernLabel">
		  	<div class="modal-dialog" role="document">
			    <div class="modal-content"> 
				    <div class="modal-body">
				        ...
				    </div> 
			    </div>
		  	</div>
		</div>
		<!-- myConcern关注用户 结束 -->

		<!-- myProblem用户提问问题 开始 -->
		<div class="modal fade" id="myProblem" tabindex="-1" role="dialog" aria-labelledby="myConcernLabel">
		  	<div class="modal-dialog" role="document">
			    <div class="modal-content"> 
				    <div class="modal-body">
				        ...
				    </div> 
			    </div>
		  	</div>
		</div>
		<!-- myProblem用户提问问题 结束 -->

		<!-- myShield屏蔽用户 开始 -->
		<div class="modal fade" id="myShield" tabindex="-1" role="dialog" aria-labelledby="myConcernLabel">
		  	<div class="modal-dialog" role="document">
			    <div class="modal-content"> 
				    <div class="modal-body">
				        ...
				    </div> 
			    </div>
		  	</div>
		</div>
		<!-- myShield屏蔽用户 结束 -->
@endsection