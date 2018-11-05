@extends('admin.layout.index')
@section('content')

    
            <!-- /.row -->
	<div class="row">
	    <div class="col-lg-12">
	        <div class="panel panel-default">
	            <div class="panel-heading">
	                请按需求填写
	            </div>
	            <div class="panel-body">
	                <div class="row">
	                    <div class="col-lg-6">
	                        <form role="form" action="/admin/adminuser" method="post">
	                        	{{ csrf_field() }}
		                        <div class="form-group">
		                            <label>管理员用户名</label>
		                            <input class="form-control" name="name" value="{{ old('name') }}" type="text">
		                            
		                        </div>		                        
		                        <div class="form-group">
		                            <label>管理员密码</label>
		                            <input class="form-control" name="upwd" type="password">
		                           
		                        </div>		                        
		                        <div class="form-group">
		                            <label>确认管理员密码</label>
		                            <input class="form-control" name="upwd_confirmation" type="password">
		                            
		                        </div>
                                <dir class="form-group">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                选择角色
                                            </div>
                                            <div class="panel-body">
                                                @foreach($role as $k => $v)
                                                <p>{{ $v->roname }}:<input type="checkbox" value="{{$v->id}}" name="role_id[]"></p>
                                                @endforeach
                                            </div>
                                        </div>
                                </dir>
								<div class="form-group">
                                    <label>是否启用:</label>
                                    <input type="checkbox" name="status" value="2" checked=""> 立即启用
                                </div>
                                <div class="form-group">
                                	<button type="submit" class="btn btn-outline btn-info">添加管理员</button>
                            	</div>
                        	</form>
                        </div>
                        @if (count($errors) > 0)
                        <div class="col-lg-6">
                        	@foreach ($errors->all() as $error)
                        	<div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <span class="alert-link">{{ $error }}</span>.
                            </div>
                            @endforeach
                        </div>
                        @endif
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
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