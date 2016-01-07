<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>后台管理系统-小角落</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link href="http://cdn.bootcss.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="http://cdn.bootcss.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
  <link href="umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
  <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="dist/js/app.min.js"></script>
  <script type="text/javascript" charset="utf-8" src="umeditor/umeditor.config.js"></script>
  <script type="text/javascript" charset="utf-8" src="umeditor/umeditor.min.js"></script>
  <script type="text/javascript" src="umeditor/lang/zh-cn/zh-cn.js"></script>
  <script src="plugins/fastclick/fastclick.js"></script>
  <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <!--[if lt IE 9]>
  <script src="http://cdn.bootcss.com/html5shiv/3.7.3/html5shiv-printshiv.min.js"></script>
  <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">后台</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">后台管理系统</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">收到10个系统通知</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li><!-- start notification -->
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 昨天有 5 个用户注册
                    </a>
                  </li>
                  <li><!-- start notification -->
                    <a href="#">
                      <i class="fa fa-dashboard text-aqua"></i> 昨天总浏览量 1233 PV
                    </a>
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="#">查看所有</a></li>
            </ul>
          </li>
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">刘顺平</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  刘顺平 - 管理员
                  <small>近期登录 2016-1-16 12:34</small>
                </p>
              </li>
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">资料修改</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">退出</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <section class="sidebar">

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">功能菜单</li>
      
          <li class="treeview">
          <a href="#"><i class="fa fa-plus"></i> <span>添加测试题</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="score_question.html"><i class="fa fa-circle-o text-red"></i>多选评分</a></li>
            <li><a href="jump_question.html"><i class="fa fa-circle-o text-yellow"></i>多选跳转</a></li>
            <li><a href="single.html"><i class="fa fa-circle-o text-aqua"></i>单选题</a></li>
          </ul>
        </li>
        <li class="active"><a href="#"><i class="fa fa-th"></i> <span>题库管理</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">

        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">测试题管理</h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
                  <input type="text" class="form-control input-sm" placeholder="搜索测试题">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><input type="checkbox">
                </button>

                 <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>

                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-circle-o text-red"></i> 添加评分题</button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-circle-o text-yellow"></i> 添加跳转题</button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-circle-o text-aqua"></i> 添加单选题</button>
               
                </div>

                <div class="btn-group ">
                  <button type="button" class="btn btn-sm btn-default">分类筛选</button>
                  <button type="button" class="btn btn-sm  btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">爱情</a></li>
                    <li><a href="#">智商</a></li>
                    <li><a href="#">个性</a></li>
                    <li class="divider"></li>
                    <li><a href="#">趣味</a></li>
                  </ul>
                </div>
                <!-- /.btn-group -->
               
                <div class="pull-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
              <table class="table table-hover">
                <tbody><tr>
                  <th>选择</th>
                  <th>ID</th>
                  <th>题目</th>
                  <th>总题数</th>
                  <th>浏览数</th>
                  <th>状态</th>
                  <th>分类</th>
                  <th>操作</th>
                </tr>
                <tr>
                  <td><input type="checkbox"></td>
                  <td>123</td>
                  <td>你敢测试下你的身高和体重么？</td>
                  <td>12</td>
                  <td>2223</td>
                  <td><span class="label label-success">已发布</span></td>
                  <td>爱情</td>
                  <td>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash"></i></button></td>
                </tr>

                <tr>
                  <td><input type="checkbox"></td>
                  <td>123</td>
                  <td>你敢测试下你的身高和体重么？</td>
                  <td>12</td>
                  <td>2223</td>
                  <td><span class="label label-info">待审核</span></td>
                  <td>智商</td>
                  <td>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash"></i></button></td>
                </tr>
                
              </tbody></table>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><input type="checkbox">
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                 
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                <div class="pull-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
            </div>
          </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      做点有意思的事情。
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016
  </footer>


</div>
<!-- ./wrapper -->


<!-- Bootstrap 3.3.5 -->
<script type="text/javascript">

var um = UM.getEditor('myEditor');
var um1 = UM.getEditor('myEditor1');
var um2 = UM.getEditor('myEditor2');
var um3 = UM.getEditor('myEditor3');
</script>
</body>
</html>
