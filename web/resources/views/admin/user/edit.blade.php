@extends('admin.layout.index')

@section('content')
	


	

		
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
	                
	                <div class="panel-body">
	                    <div class="row">
	                        <div class="col-lg-6">
	                            <form role="form" action="/admin/user/{{ $id }}" method="post">
	                            	{{ csrf_field() }}
	                            	{{ method_field('PUT') }}

	                            	 <div class="form-group">
	                                    <label for="tel">手机号</label>
	                                    <input class="form-control" id="tel" type="text" name="tel" value="{{ $user->tel }}">
	                                </div>
	                                <div class="form-group">
	                                    <label for="uname">用户名</label>
	                                    <input class="form-control" id="uname" type="text" name="uname" value="{{ $user->userinfo()->find($id)->uname }}">
	                                </div>
	                                
	                                
	                               
	                                <div class="form-group">
	                                    <label for="email">邮箱</label>
	                                    <input class="form-control" id="email" type="text" name="email" value="{{ $user->email }}">
	                                </div>
	                               
	                                <div class="form-group">
	                                    <label>性别</label>
	                                    <div class="radio">
	                                        <label>
	                                            <input type="radio" name="sex" id="optionsRadios1" value="0" @if($user->userinfo()->find($id)->sex == 0) checked @endif >女
	                                        </label>
	                                    </div>
	                                    <div class="radio">
	                                        <label>
	                                            <input type="radio" name="sex" id="optionsRadios2" value="1" @if($user->userinfo()->find($id)->sex == 1) checked @endif >男
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