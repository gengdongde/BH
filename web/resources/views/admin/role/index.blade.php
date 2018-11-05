@extends('admin.layout.index')

@section('content')

    
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                <div class="col-sm-6">
                                    <a href="/admin/role/create" class="btn btn-outline btn-success">添加角色</a>                     
                                </div>
                                <div class="row">
                                    <form action="/admin/role" method="get">
                                        <div class="col-sm-6">
                                            <div id="dataTables-example_filter" class="dataTables_filter">
                                                <label>角色名:<input type="text" name="roname" class="form-control input-sm" placeholder="关键字" aria-controls="dataTables-example"></label>
                                                <button type="submit" class="btn bnt-success">查询</button>
                                                
                                            </div>
                                        </div>
                                    </form>

                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <table width="100%" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info" style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <td>Id</td>
                                                    <td>角色名称</td>
                                                    <td>拥有权限</td>
                                                    <td>状态</td>
                                                    <td>创建时间</td>
                                                    <td>修改时间</td>
                                                    <td>操作</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($role as $k => $v)
                                                <tr class="gradeA odd" role="row">
                                                    <td>{{$v->id}}</td>
                                                    <td>{{$v->roname}}</td>
                                                    <td>
                                                        @foreach($v->access()->get() as $vv)
                                                        {{$vv->title.'，'}}
                                                        @endforeach
                                                    </td>
                                                    <td>@if($v->status == 1)<a class="text-danger" title="启用?" href="/admin/role/stus/{{ $v->id }}">未启用</a>@else<a class="text-muted" title="禁用?" href="/admin/role/stus/{{ $v->id }}">已启用.</a>@endif</td>
                                                    <td>{{$v->created_at}}</td>
                                                    <td>{{$v->updated_at}}</td>
                                                    <td>
                                                        <a href="/admin/role/{{$v->id}}/edit" class="btn btn-outline btn-warning">修改拥有权限</a>
                                                        <form action="/admin/role/{{$v->id}}" method="post" style="display:inline-block;">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <button type="submit" onclick="if(window.confirm('你确定需要删除')){return true;}else{return false;}" class="btn btn-outline btn-danger">删除</button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div>
                                            <!-- ->appends(['name'=>$request]) -->
                                           {!! $role->appends(['roname'=>$request])->render()
                                           !!}
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

@endsection