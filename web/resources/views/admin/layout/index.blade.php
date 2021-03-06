<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>B乎</title>

    <!-- Bootstrap Core CSS -->
    <link href="/static/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- MetisMenu CSS -->
    <link href="/static/admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/static/admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/static/admin/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/static/admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">后台管理系统</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/admin">后台管理系统</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i>{{ session('login.name') }}</a></li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i>登录</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="/admin/del"><i class="fa fa-sign-out fa-fw"></i>切换用户</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="/admin"><i class="fa fa-desktop"></i>首页</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-user"></i>用户管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                

                                
                                <li>
                                    <a href="/admin/user">用户列表</a>
                                </li>

                                <li>
                                    <a href="/admin/user/soft">黑名单</a>
                                </li>



                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                                              
<!-- <p class="fa fa-user"> fa-user </p> -->
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i>管理员管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/admin/adminuser">管理员列表</a>
                                </li>
                                <li>
                                    <a href="/admin/adminuser/create">添加管理员</a>
                                </li>                                
                                <li>
                                    <a href="/admin/access">权限管理</a>
                                </li>
                                <li>
                                    <a href="/admin/role">角色管理</a>
                                </li>

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>                       
                        <li>
                            <a href="#"><i class="fa  fa-comment fa-fw"></i>话题管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/admin/topic">话题列表</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>                        
                        <li>
                            <a href="#"><i class="fa fa-comments-o"></i>问题回答管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/admin/reply">问题回答列表</a>
                                </li>                                
                                <li>
                                    <a href="/admin/reply/report">被举报列表</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
<!-- azhegn 112-150 -->






































<!-- gengdongde 150之后 -->
                    

                    <li>
                        <a href="#"><i class="fa fa-question-circle"></i>问题管理<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/admin/problem">问题列表</a>
                            </li>
                            <li>
                                <a href="/admin/problem/report">被举报列表</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-chain"></i>友情链接管理<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/admin/link">友情链接</a>
                            </li>
                            
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    















































                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
<!-- content 开始 -->
        
       <div id="page-wrapper" >
            <div class="row">
                <div class="col-lg-12">
                <h1 class="page-header text-info text-center">{{$title,''}}</h1>
                </div>
        <!-- /.col-lg-12 -->
            </div>
        @if (session('success'))
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <span class="alert-link">{{ session('success') }}</span>.
        </div>
         @endif 
        @if (session('error'))
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <span class="alert-link">{{ session('error') }}</span>.
        </div>
         @endif     
        @section('content')

        @show
            
<!-- content 结束 -->
    </div>
<!-- /#wrapper -->

    <!-- jQuery -->
    <script src="/static/admin/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/static/admin/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/static/admin/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="/static/admin/vendor/raphael/raphael.min.js"></script>
    <script src="/static/admin/vendor/morrisjs/morris.min.js"></script>
    <script src="/static/admin/data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/static/admin/dist/js/sb-admin-2.js"></script>

</body>

</html>