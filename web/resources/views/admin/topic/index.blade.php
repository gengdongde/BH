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
                            		  <div class="col-sm-6">
	                            		<!-- Button trigger modal -->
										<a href="/adimn/topic/create" class="btn btn-outline btn-success" data-toggle="modal" data-target="#myModal">
										  添加话题
										</a>
	                            		</div>
                            	</div>
                            	<div class="row">
                            		<div class="col-sm-12">
                            			<table width="100%" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info" style="width: 100%;">
			                                <thead>
			                                    <tr role="row">
			                                    	<td>Id</td>
			                                    	<td>话题名称</td>
			                                    	<td>添加时间</td>
			                                    	<td>话题详情</td>
			                                    </tr>
			                                </thead>
			                                <tbody>
			                                	@foreach($data as $k => $v)
			                                	<tr>
			                                		<td>{{$v->id}}</td>
			                                		<td>{{str_repeat('|----',substr_count($v->path,',')).$v->tname}}</td>
			                                		<td>{{$v->created_at}}</td>
			                                		<td><a href="/admin/topic/{{$v->id}}" class="btn btn-outline btn-info">话题详情</a></td>
			                                	</tr>
			                                	@endforeach
				                            </tbody>
			                            </table>
			                            <div>
			                            	<!--  -->
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
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">话题</h4>
      </div>
      <div class="modal-body">
       <form role="form" action="/admin/topic" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label>话题名称</label>
                <input class="form-control" name="tname" value="{{ old('tname') }}" type="text">
                
            </div>                              
            <div class="form-group">
                <label>选择话题层级</label>
                <select name="id" class="form-control">
                	<option value="0">--顶级话题--</option>
                	@foreach($data as $k => $v)
                   	<option value="{{ $v->id }}">
                   		{{str_repeat('|----',substr_count($v->path,',')).$v->tname}}
                   	</option>
                    @endforeach
                </select>
            </div> 
            <div class="panel panel-info">
                <div class="panel-heading">
                    话题详情可不填
                </div>
            </div> 
            <div class="form-group">
                <label>话题简介</label>
                <textarea name="content" class="form-control" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label>话题图片</label>
                <input name="timg" type="file" class="form-control" rows="3">
            </div>
            <div class="form-group">
                <label>类型</label>
                <input name="type" type="text" class="form-control" rows="3">
            </div>                             

            <div class="form-group">
                <label>英文名</label>
                <input class="form-control" name="ename" value="" type="text">
            </div>
            <div class="form-group">
                <label>释义</label>
                <input class="form-control" name="interpretation" value="" type="text">
            </div> 
            <div class="form-group">
                <button type="submit" class="btn btn-outline btn-info">添加话题</button>
            </div>
        </form>
      </div>
      <div class="modal-footer" id="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script src="/static/admin/vendor/jquery/jquery.min.js"></script>
<script type="text/javascript">
	//绑定事件发送ajax
	$("input[name='tname']").blur(function(){
		var tname = $("input[name='tname']").val();
		if(tname == ""){
			alert('请填写数据');
		}else{
			$.get('/admin/topic/is_to',{'tname':tname},function(msg){
				if(msg == 'success'){
					var succ = "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><span class='alert-link'>该话题不存在可添加.</span>.</div>";
					$("div[id='modal-footer']").prepend(succ);
				}else{
					var succ = "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><span class='alert-link'>该话题已存在不可添加.</span>.</div>";
					$("div[id='modal-footer']").prepend(succ);
				}
			},'html')
		}
	});
</script>
@endsection