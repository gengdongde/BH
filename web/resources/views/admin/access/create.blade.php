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
	                               <form role="form" action="/admin/access" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label>权限名称</label>
                                            <input class="form-control" name="title" value="{{ old('title') }}" type="text">
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>选择权限层级</label>
                                            <select name="id" class="form-control">
                                                <option value="0">--顶级权限--</option>
                                                @foreach($acs as $k => $v)
                                                <option value="{{ $v->id }}">
                                                    {{str_repeat('|----',substr_count($v->path,',')).$v->title}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>                                         
                                        <div class="form-group">
                                            <label>URL</label>
                                            <input class="form-control" name="urls" value="{{ old('urls') }}" type="text">
                                            
                                        </div>                                        
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-outline btn-info">添加权限</button>
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