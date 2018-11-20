@extends('admin.layout.index')

@section('content')

    
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            被举报的回答
                        </div>
                        <!-- .panel-heading -->
                        <div class="panel-body">

                            <div class="panel-group" id="accordion">
                                @if($rey != null)
                                @foreach($rey as $k =>$v)
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $v->id }}" aria-expanded="false" class="collapsed">所回答的问题:{{$v->problem()->where('id',$v->pid)->first()->pname}}</a>
                                        </h4>
                                    </div>
                                    <div id="collapse{{ $v->id }}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">
                                            回答的内容:{{$v->reply_content->content}}
                                        </div>
                                        <div class="panel-body">
                                            举报原因:
                                            @if($v->report == '1')
                                                低质问题
                                            @elseif($v->report == '2')
                                                垃圾广告
                                            @elseif($v->report == '3')
                                                要害信息
                                            @elseif($v->report == '4')
                                                涉嫌侵权
                                            @endif
                                        </div>
                                        <a href="/admin/reply/hf/{{$v->id}}" class="btn btn-outline btn-info">已审查恢复回答</a>
                                        <a href="/admin/reply/delete/{{$v->id}}" class="btn btn-outline btn-danger">已审查永久删除</a>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- .panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            <!-- /.row -->
        </div>
</div>
@endsection