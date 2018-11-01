@extends('admin.layout.index')

@section('content')
         <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="/admin/topic/top_edit/{{$data->id}}" class="btn btn-outline btn-warning">修改</a>
                        </div>

                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#home" data-toggle="tab">话题简介</a>
                                </li>
                                <li><a href="#profile" data-toggle="tab">类型</a>
                                </li>
                                <li><a href="#messages" data-toggle="tab">英文名</a>
                                </li>
                                <li><a href="#settings" data-toggle="tab">释义</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home">
                                    <h4>话题简介</h4>
                                    <p>{{$data->content}}</p>
                                </div>
                                <div class="tab-pane fade" id="profile">
                                    <h4>类型</h4>
                                    <p>{{$data->type}}</p>
                                </div>
                                <div class="tab-pane fade" id="messages">
                                    <h4>英文名</h4>
                                    <p>{{$data->ename}}</p>
                                </div>
                                <div class="tab-pane fade" id="settings">
                                    <h4>释义</h4>
                                    <p>{{$data->interpretation}}</p>
                                </div>
                            </div>
                		  	<div class="col-sm-4">
                    		</div>
                   		  	<div class="col-sm-4">
                   		  		<div class="alert alert-info">
                                	创建时间
                                	<a href="#" class="alert-link">{{$data->created_at}}</a>.
                            	</div>
                    		</div>                   		  	
                    		<div class="col-sm-4">
                   		  		<div class="alert alert-warning">
                                	修改时间
                                	<a href="#" class="alert-link">{{$data->updated_at}}</a>.
                            	</div>
                    		</div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
@endsection