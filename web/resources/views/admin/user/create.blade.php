@extends('admin.layout.index')

@section('content')
	


	<div id="page-wrapper">
		
		@if (count($errors) > 0)
	    <div class="alert alert-danger alert-dismissable">
	    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	    	
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
		@endif
	    <!-- /.row -->
	    <div class="row">
	        <div class="col-lg-12">
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                   {{$title or ''}}
	                </div>
	                <div class="panel-body">
	                    <div class="row">
	                        <div class="col-lg-6">
	                            <form role="form" action="/admin/user" method="post">
	                            	{{ csrf_field() }}

	                            	 <div class="form-group">
	                                    <label for="tel">手机号</label>
	                                    <input class="form-control" id="tel" type="text" name="tel" value="{{ old('tel') }}">
	                                </div>
	                                <div class="form-group">
	                                    <label for="uname">用户名</label>
	                                    <input class="form-control" id="uname" type="text" name="uname" value="{{ old('uname') }}">
	                                </div>
	                                <div class="form-group">
	                                    <label for="upwd">密码</label>
	                                    <input class="form-control" id="upwd" type="password" name="upwd">
	                                </div>
	                                <div class="form-group">
	                                    <label for="reupwd">确认密码</label>
	                                    <input class="form-control" id="reupwd" type="password" name="reupwd">
	                                </div>
	                                
	                               
	                                <div class="form-group">
	                                    <label for="email">邮箱</label>
	                                    <input class="form-control" id="email" type="text" name="email" value="{{ old('email') }}">
	                                </div>
	                               
	                                <div class="form-group">
	                                    <label>性别</label>
	                                    <div class="radio">
	                                        <label>
	                                            <input type="radio" name="sex" id="optionsRadios1" value="0" checked>女
	                                        </label>
	                                    </div>
	                                    <div class="radio">
	                                        <label>
	                                            <input type="radio" name="sex" id="optionsRadios2" value="1">男
	                                        </label>
	                                    </div>
	                                    
	                                </div>
	                                
	                                
	                               
	                                <button type="submit" class="btn btn-success">提交</button>
	                                <button type="reset" class="btn btn-default">重置</button>
	                            </form>
	                        </div>
	                    
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