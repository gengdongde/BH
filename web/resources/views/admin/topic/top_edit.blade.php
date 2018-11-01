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
               <form role="form" action="/admin/topic/top_update/{{$data->id}}" method="post">
                    {{ csrf_field() }}                              
                    <div class="form-group">
                        <label>话题简介</label>
                        <textarea name="content" class="form-control" rows="3">{{$data->content}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>类型</label>
                        <input name="type" type="text" class="form-control" value="{{$data->type}}" rows="3"></input>
                    </div>                             

                    <div class="form-group">
                        <label>英文名</label>
                        <input class="form-control" type="text" name="ename" value="{{$data->ename}}" type="text">
                    </div>
                    <div class="form-group">
                        <label>释义</label>
                        <input class="form-control" type="text" name="interpretation" value="{{$data->interpretation}}" type="text">
                    </div> 
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline btn-warning">修改话题详情</button>
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