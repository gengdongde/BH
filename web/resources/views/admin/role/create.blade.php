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
	                               <form role="form" action="/admin/role" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label>角色名称</label>
                                            <input class="form-control" name="roname" value="{{ old('roname') }}" type="text">
                                            
                                        </div>               
                                        @foreach($access as $v)
                                            @if($v->path == '0')
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                {{$v->title}}<input type="checkbox" name="access_id[]" value="{{$v->id}}"><br>
                                            </div>
                                            <div class="panel-body">
                                                @foreach($access as $vv)
                                                 @if($vv->pid == $v->id)
                                                    <p>
                                                        {{$vv->title}}<input type="checkbox" name="access_id[]" value="{{$vv->id}}">
                                                    </p>
                                                 @endif
                                                @endforeach 
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach                              
                                        <div class="form-group">
                                            <label>状态</label>
                                            <input type="checkbox" name="status" value="2">
                                        </div>                              
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-outline btn-info">添加角色</button>
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