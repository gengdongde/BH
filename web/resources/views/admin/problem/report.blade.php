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
                            		<form action="/admin/problem" method="get">
                            			<div class="col-sm-6">
	                            			<div class="dataTables_filter">
	                            				<label>用户名:<input type="text" name="uname" value="{{ $request['uname'] or '' }}" class="form-control input-sm" placeholder="关键字" ></label>
	                            				<label>问题:<input type="text" name="pname" value="{{ $request['pname'] or '' }}" class="form-control input-sm" placeholder="关键字" ></label>
	                            				<button class="btn btn-primary">查询</button>
	                            			</div>
	                            		</div>
                            		</form>                       
                            	</div>
                            	
                            	<div class="row">
                            		<div class="col-sm-12">
                            			<table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline">
			                                <thead>
			                                    <tr role="row" class="text-center">
			                                    	<td>ID</td>
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
			                              			<tr class="text-center">
			                              				<td>{{ $v->id }}</td>
			                              				<td>{{ $v->problemtopic()->find($v->tid)->tname }}</td>
			                              				<td>{{ $v->userdetail()->where('uid',$v->uid)->first()->uname }}</td>
			                              				<td>{{ $v->uid }}</td>
			                              				<td>{{ $v->pname }}</td>
			                              				<td>{{ $v->describe }}</td>
			                              				<td>{{ $v->clicks }}</td>
			                              				<td>

			                              					@if($v->report == 0)
															正常
															@elseif($v->report == 1)
															低质问题
															@elseif($v->report == 2)
															垃圾广告
															@elseif($v->report == 3)
															要害信息
															@elseif($v->report == 4)
															涉嫌侵权
															@endif

			                              				</td>
			                              				<td>{{ $v->created_at }}</td>
			                              				<td>
			                              					<!-- <form action="/admin/problem/{{$v->id}}" method="post" >
																{{ csrf_field() }}
																{{ method_field('DELETE') }}
																<button class="btn btn-danger btn-sm">删除</button>
															</form> -->
															<a href="javascript:;" class="btn btn-danger btn-sm" onclick="func(this,{{ $v->id }})">删除</a>
			                              				</td>
			                              			</tr>
			                              		@endforeach
			                              	</tbody>
			                            </table>
			                            <div class="text-center">
			                            	{!! $data->appends($request)->render() !!}
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
        <!-- jQuery -->
    	<script src="/static/admin/vendor/jquery/jquery.min.js"></script>
    	<script type="text/javascript">
    		function func(obj,id){
    			$.ajaxSetup({
			        headers: {
			            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        }
				});
    			$.post('/admin/problem/'+id,{"_method": "delete"},function(msg){
    				
    				if (msg == 'success'){
    					$(obj).parent().parent().remove();


    				} else {
    					alert('删除失败');
    				}
    			},'html');
    		}
    	</script>

@endsection