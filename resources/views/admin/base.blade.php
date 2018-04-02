<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link href="{{asset('static/img/favicon.ico')}}" rel="shortcut icon" type="image/x-icon">
    <title>吖扑科学有限公司</title>

    <script src="{{asset('myadmin/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>

    <script src="http://hayageek.github.io/jQuery-Upload-File/4.0.11/jquery.uploadfile.min.js" type="text/javascript"></script>
    <!-- 告诉浏览器响应屏幕宽度 -->
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="{{asset('myadmin/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('myadmin/dist/css/family.css')}}" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <!--<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />-->
    <link href="{{asset('myadmin/bootstrap/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <!--<link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />-->
    <!-- Theme style -->
    <link href="{{asset('myadmin/dist/css/AdminLTE.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="{{asset('myadmin/dist/css/skins/_all-skins.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="{{asset('myadmin/plugins/iCheck/flat/blue.css')}}" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="{{asset('myadmin/plugins/morris/morris.css')}}" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="{{asset('myadmin/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="{{asset('myadmin/plugins/datepicker/datepicker3.css')}}" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="{{asset('myadmin/plugins/daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="{{asset('myadmin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{asset('myadmin/bootstrap/js/html5shiv.min.js')}}"></script>
    <script src="{{asset('myadmin/bootstrap/js/respond.min.js')}}"></script>
    <link href="https://rawgithub.com/hayageek/jquery-upload-file/master/css/uploadfile.css" rel="stylesheet">
            <script src="{{asset('static/js/jquery.min.js')}}"></script>
    <![endif]-->
    <script>

    </script>
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">     
      <header class="main-header">
        <!-- Logo -->
        <a href="{{url('admin')}}" class="logo">
          <!-- 对于侧边栏迷你50x50像素迷你标志 -->
          <span class="logo-mini"><b>YA</b>PU</span>
          <!-- 正常状态和移动设备标识 -->
          <span class="logo-lg">网站后台管理</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">切换导航</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                @if(session('adminuser'))
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="margin-right:14px;font-size: 44px; "><span class="hidden-xs">管理员:</span>{{session('adminuser')->name}}
                </a>
                @endif
              </li>
            </ul>
          </div>
        </nav>
      </header>    
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left info">
              <a href="#"><i class="fa fa-circle text-success"></i> 在线</a>
              <a href="{{URL('admin/logout')}}">退出</a>
            </div>
          </div>
          <ul class="sidebar-menu">
		     <li class="treeview">
              <a href="{{URl('/')}}" target=" _blank">
               <i class="fa fa-files-o"></i>
                <span>网站首页</span>                
              </a> 
			 </li>
            <li class="treeview">
              <a href="{{URl('admin/users')}}">
                <i class="fa fa-laptop"></i>
                <span>管理员信息</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('admin/users')}}"><i class="fa fa-circle-o"></i> 管理员信息</a></li>
                <li><a href="{{URL('admin/role')}}"><i class="fa fa-circle-o"></i> 角色管理</a></li>
                <li><a href="{{URL('admin/node')}}"><i class="fa fa-circle-o"></i> 权限管理</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="{{URl('admin/')}}">
                <i class="fa fa-pie-chart"></i> <span>首页头部</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{URl('admin/navigation')}}"><i class="fa fa-circle-o"></i>左导航栏</a></li>
                <li><a href="{{URl('admin/rightnavigation')}}"><i class="fa fa-circle-o"></i>右导航栏</a></li>
                <li><a href="{{URl('admin/diagram')}}"><i class="fa fa-circle-o"></i>导航栏上下图</a></li>
                <li><a href="{{URl('admin/logo')}}"><i class="fa fa-circle-o"></i>logo图</a></li>
                <li><a href="{{URl('admin/carousely')}}"><i class="fa fa-circle-o"></i>一轮播图</a></li>
                <li><a href="{{URl('admin/carousel')}}"><i class="fa fa-circle-o"></i>轮播图</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="{{URl('admin/product')}}">
                <i class="fa fa-folder"></i> <span>首页导航产品</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('admin/title')}}"><i class="fa fa-circle-o"></i>产品标题</a></li>
                <li><a href="{{url('admin/product_table')}}"><i class="fa fa-circle-o"></i>套件产品</a></li>
                <li><a href="{{url('admin/product')}}"><i class="fa fa-circle-o"></i>产品零件</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="{{url('admin/introduction')}}">
                <i class="fa fa-folder"></i> <span>学习详情</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('admin/Totalcourse')}}"><i class="fa fa-circle-o"></i>学习视频总介绍</a></li>
                <li><a href="{{url('admin/curriculum')}}"><i class="fa fa-circle-o"></i>学习课程使用总介绍</a></li>
                <li><a href="{{url('admin/introduction')}}"><i class="fa fa-circle-o"></i>学习概述</a></li>
                <li><a href="{{url('admin/Learning')}}"><i class="fa fa-circle-o"></i>学习课节</a></li>
                <li><a href="{{url('admin/type')}}"><i class="fa fa-circle-o"></i>课节分类</a></li>
                <li><a href="{{url('admin/course')}}"><i class="fa fa-circle-o"></i>学习图和建议</a></li>
                <li><a href="{{url('admin/Course_video')}}"><i class="fa fa-circle-o"></i>学习视频课程</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="{{URl('admin/bottom')}}">
                <i class="fa fa-laptop"></i>
                <span>底部版本</span>
              </a>
            </li>
            <li class="treeview">
              <a href="{{URl('admin/shangchuan')}}">
                <i class="fa fa-share"></i>
                <span>上传</span>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

          @section('content')
              页面主内容区
          @show
     
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>版本</b> 1
        </div>
        <strong>Acridine Science &copy; 2014-2015 <a href="http://www.uper.cc">吖扑科学有限公司</a>.</strong> 保留所有权利.
      </footer>

      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class='control-sidebar-bg'></div>
    </div><!-- ./wrapper -->

    <!-- xdl-model提示框模板 -->
    <div id="xdl-alert" class="modal">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            <h5 class="modal-title"><i class="fa fa-exclamation-circle"></i> [Title]</h5>
          </div>
          <div class="modal-body small">
            <p>[Message]</p>
          </div>
          <div class="modal-footer" >
            <button type="button" class="btn btn-primary ok" data-dismiss="modal">[BtnOk]</button>
            <button type="button" class="btn btn-default cancel" data-dismiss="modal">[BtnCancel]</button>
          </div>
        </div>
      </div>
    </div>
    <!-- xdl-model-end -->


    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('myadmin/bootstrap/js/jquery-ui.min.js')}}" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        //$.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{asset('myadmin/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
    {{--
<!-- Morris.js charts -->
<script src="{{asset('myadmin/bootstrap/js/raphael-min.js')}}"></script>
<script src="{{asset('myadmin/plugins/morris/morris.min.js')}}" type="text/javascript"></script>
    --}}
    <!-- Sparkline -->
    <script src="{{asset('myadmin/plugins/sparkline/jquery.sparkline.min.js')}}" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="{{asset('myadmin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('myadmin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('myadmin/plugins/knob/jquery.knob.js')}}" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="{{asset('myadmin/bootstrap/js/moment.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('myadmin/plugins/daterangepicker/daterangepicker.js')}}" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="{{asset('myadmin/plugins/datepicker/bootstrap-datepicker.js')}}" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{asset('myadmin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="{{asset('myadmin/plugins/slimScroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='{{asset('myadmin/plugins/fastclick/fastclick.min.js')}}'></script>
    <!-- AdminLTE App -->
    <script src="{{asset('myadmin/dist/js/app.min.js')}}" type="text/javascript"></script>

<!-- AdminLTE 仪表板演示（这只是用于演示目的） -->
<script src="{{asset('myadmin/dist/js/pages/dashboard.js')}}" type="text/javascript"></script>

    <!-- XDL-model-提示框 -->
    <script src="{{asset('myadmin/bootstrap/js/xdl-modal-alert-confirm.js')}}" type="text/javascript"></script>
    <!-- AdminLTE 用于演示目的 -->
    <script src="{{asset('myadmin/dist/js/demo.js')}}" type="text/javascript"></script>

    @if(session("err"))
      <script type="text/javascript">
          Modal.alert({msg: "{{session('err')}}",title: ' 信息提示',btnok: '确定',btncl:'取消'});
      </script>
    @endif

    @yield('myscript')

  </body>
</html>

