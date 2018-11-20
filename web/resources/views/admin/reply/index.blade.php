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
                                    <form action="/admin/adminuser" method="get">
                                        <div class="col-sm-6">
                                            <div id="dataTables-example_filter" class="dataTables_filter">
                                                <label>管理员用户名:<input type="text" name="name" class="form-control input-sm" placeholder="关键字" aria-controls="dataTables-example"></label>
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
                                                    <td>问题名称</td>
                                                    <td>回答用户</td>
                                                    <td>点赞数量</td>
                                                    <td>评论数量</td>
                                                    <td>查看评论</td>
                                                    <td>编辑时间</td>
                                                    <td>修改时间</td>
                                                    <td>操作</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($rey as $k => $v)     
                                                <tr class="gradeA odd" role="row">
                                                    <td>{{$v->id}}</td>
                                                    <td>{{$v->problem()->where('id',$v->pid)->first()->pname}}</td>
                                                    <td>{{$v->user_detail()->where('uid',$v->uid)->first()->uname}}</td>
                                                    <td>{{$v->agree}}</td>
                                                    <td>{{ $v->com }}</td>
                                                    <td>
                                                        <a href="/admin/comment/{{ $v->id }}" class="btn btn-info btn-sm">查看评论</a>
                                                    </td>
                                                    <td>{{$v->created_at}}</td>
                                                    <td>{{$v->updated_at}}</td>
                                                    <td>
                                                        <a href="/admin/reply/{{$v->id}}" class="btn btn-outline btn-info">问答内容</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <div>
                                            <!-- ->appends(['name'=>$request]) -->
                                            {!! $rey->render() !!}
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