@extends('admin.layout.index')

@section('content')

        <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">   
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">    <div class="row btn btn-info" style="margin:5px;">	
                            		<a href="/admin/link/create">添加</a>                         
                            	</div>
                            	<div class="row">
                            		<div class="col-sm-12">
                            			<table width="100%" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info" style="width: 100%;">
			                                <thead>
			                                    <tr role="row">
			                                    	<td>Id</td>
			                                    	<td>网站名称</td>
			                                    	<td>网址</td>
			                                    	<td>LOGO</td>
			                                    	<td>状态</td>
			                                    	<td>操作</td>
			                                    </tr>
			                                </thead>
			                                <tbody>
                                                @foreach($links as $k=>$v)
                                                <tr>
                                                    <td>{{ $v->id }}</td>
                                                    <td>{{ $v->name }}</td>
                                                    <td>{{ $v->url }}</td>
                                                    <td>
                                                        <img src="{{ $v->logo }}" style="width:50px;">
                                                        
                                                    </td>
                                                    <td>       
                                                        <a href="javascript:;" onclick="btn({{$v->id}},this)">
                                                            @if($v->status == 1)
                                                            未发布
                                                            @elseif($v->status == 2 )
                                                            发布
                                                            @endif
                                                        </a>  
                                                    </td>
                                                    <td>
                                                       
                                                        <form action="/admin/link/{{ $v->id }}" method="post" style="display: inline-block;">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <button class="btn btn-danger" onclick="if ( confirm ( '确认要删除吗?' ) == true ) { return true; } else { return false; } ">删除
                                                            </button>
                                                        </form>
                                                    </td>
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
         <script src="/static/admin/vendor/jquery/jquery.min.js"></script>
        <script type="text/javascript">
            function btn(id,obj){
                $.get('/admin/link/btn',{'status':2,'id':id},function(msg){
                    if(msg == 'success'){
                        return $(obj).text('发布');
                    }else{
                        return $(obj).text('未发布');
                    }
                },'html');
            }
        </script>

@endsection