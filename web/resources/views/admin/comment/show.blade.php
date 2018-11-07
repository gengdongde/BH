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
			                                    <tr role="row" class="text-center">
			                                    	
			                                    	<td>评论ID</td>
			                                    	<td>评论用户ID</td>
			                                    	<td>评论用户名</td>
			                                    	<td>评论内容</td>
			                                    	<td>点赞数量</td>
			                                    	<td>评论时间</td>
			                                    	<td>操作</td>
			                                    </tr>
			                                </thead>
			                                <tbody>
			                              		@foreach($data as $k=>$v)
			                              		<tr class="text-center">
			                              			<td>{{ $v->id }}</td>
			                              			<td>{{ $v->uid }}</td>
			                              			<td>{{ $v->user_detail()->where('uid',$v->uid)->first()->uname }}</td>
			                              			<td>{{ $v->content }}</td>
			                              			<td>{{ $v->cagree }}</td>
			                              			<td>{{ $v->created_at }}</td>
			                              			<td>
			                              				<form action="/admin/comment/{{$v->id}}" method="post">
			                              					{{ csrf_field() }}
			                              					{{ method_field('DELETE') }}
			                              					<button class="btn btn-danger btn-sm">删除</button>
			                              				</form>
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