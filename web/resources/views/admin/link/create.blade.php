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
	        <div class="col-lg-6">
	            <div class="panel panel-default">
	                
	                <div class="panel-body">
	                    <div class="row">
	                        <div class="col-lg-12">
	                            <form role="form" action="/admin/link" method="post" enctype="multipart/form-data">
	                            	{{ csrf_field() }}

	                            	<div class="form-group">
	                                    <label for="name">网站名称</label>
	                                    <input class="form-control" id="name" type="text" name="name" value="">
	                                </div>
	                                <div class="form-group">
	                                    <label for="url">网址</label>
	                                    <input class="form-control" id="url" type="text" name="url" value="">
	                                </div>
	                                <div class="form-group">
                                        <label for="logo">LOGO</label>
                                        <input type="file" id="logo" class="form-control" name="logo" value="">
                                    </div>
	                                <button type="submit" class="btn btn-success form-control">提交</button>
	                                
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