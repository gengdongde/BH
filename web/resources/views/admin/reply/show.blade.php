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
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class="col-lg-10">
                                            <div class="panel panel-info">
                                                <div class="panel-heading">
                                                    编辑时间:{{$re_con->created_at}}
                                                </div>
                                                <div class="panel-body">
                                                    <p>{{$re_con->content}}</p>
                                                </div>
                                                <div class="panel-footer">
                                                    <a href="/admin/reply" class="btn btn-outline btn-primary">返回</a>
                                                </div>
                                            </div>
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