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
	                            			<div class="dataTables_filter">
	                            				<label>用户名:<input type="text" name="uname" value="{{ $request or '' }}" class="form-control input-sm" placeholder="关键字" ></label>
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
			                                    	<td>分类</td>
			                                    	<td>用户名</td>
			                                    	<td>用户ID</td>
			                                    	<td>问题</td>
			                                    	<td>问题描述</td>
			                                    	<td>点击量</td>
			                                    	<td>是否合法</td>
			                                    	<td>发布时间</td>
			                                    	<td>操作</td>
			                                    </tr>
			                                </thead>
			                              	<tbody>
			                              		@foreach($data as $k=>$v)
			                              			<tr>
			                              				<td>{{ $v->id }}</td>
			                              				<td></td>
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