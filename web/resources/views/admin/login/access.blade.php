@extends('admin.layout.index')

@section('content')
<div class="col-lg-12">
    <div class="panel panel-red">
        <div class="panel-heading">
            无权限
        </div>
        <div class="panel-body">
            <p style="font-size:3em;color:#768399;">您暂无访问权限，请联系管理员再访问 ...</p>
        </div>
        <div class="panel-footer" style="color:#768399;">
            You have no access right now. Please contact the administrator to visit again...
        </div>
    </div>
    <!-- /.col-lg-4 -->
</div>
@endsection