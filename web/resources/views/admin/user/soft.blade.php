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
                            		<div class="col-sm-12">
                            			<table width="100%" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info" style="width: 100%;">
			                                <thead>
			                                    <tr role="row">
			                                    	<td>Id</td>
			                                    	
			                                    	<td>手机号</td>
			                                    	<td>邮箱</td>
			                                    	<td>删除时间</td>
			                                    	<td>用户详情</td>
			                                    	<td>操作</td>
			                                    </tr>
			                                </thead>
			                               <tbody>
			                                @foreach($users as $k=>$v)      
				                                <tr class="gradeA odd" role="row">
				                                	<td>{{ $v->id }}</td>
				                                	
				                                	<td>{{ $v->tel }}</td>
				                                	<td>{{ $v->email }}</td>
				                                	<td>{{ $v->deleted_at }}</td>

				                                	<td>
				                                		<a href="">详情</a>
				                                	</td>
				                                	<td>
				                                		<a href="/admin/user/{{ $v->id }}/restore" onclick="if ( confirm ( '确认要恢复吗?' ) == true ) { return true; } else { return false; } " class="btn btn-warning">恢复</a>
				                                		<a href="/admin/user/{{ $v->id }}/remove" onclick="if ( confirm ( '确认要永久删除吗?' ) == true ) { return true; } else { return false; } " class="btn btn-warning">删除</a>
				                                		
				                                	</td>
			                                        
				                                </tr>
				                            @endforeach
				                            </tbody>
			                            </table>
			                            
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