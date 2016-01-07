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
  <script type="text/javascript" charset="utf-8" src="umeditor/umeditor.config.js"></script>
  <script type="text/javascript" charset="utf-8" src="umeditor/umeditor.min.js"></script>
  <script type="text/javascript" src="umeditor/lang/zh-cn/zh-cn.js"></script>

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
      
        <li class="treeview active">
          <a href="#"><i class="fa fa-plus"></i> <span>添加测试题</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="score_question.html"><i class="fa fa-circle-o text-red"></i>多选评分</a></li>
            <li><a href="jump_question.html"><i class="fa fa-circle-o text-yellow"></i>多选跳转</a></li>
            <li class="active"><a href="single.html"><i class="fa fa-circle-o text-aqua"></i>单选题</a></li>
          </ul>
        </li>
        <li><a href="index.html"><i class="fa fa-th"></i> <span>题库管理</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        添加单选题
        <small>根据用户选择直接出结果</small>
      </h1>
     <!--  <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 后台首页</a></li>
        <li class="active">添加多选评分题</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box box-default" id="basicQuestion">
          <div class="box-header with-border" data-widget="collapse"><i class="fa fa-minus"></i>
            <h3 class="box-title" >题目属性</h3>
          </div>
          <div class="box-body">
           <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label"><i class="text-red">*</i> 题目</label>

                  <div class="col-sm-10">
                    <input type="title" class="form-control" id="inputTitle">
                  </div>
                </div>
                <div class="form-group">
                  <label for="简介" class="col-sm-2 control-label"><i class="text-red">*</i> 简介</label>

                  <div class="col-sm-10">
                    <script type="text/plain" id="myEditor" style="width:100%;height:100px;"></script>
                  </div>
                </div>

                 <div class="form-group">
                  <label for="title" class="col-sm-2 control-label"><i class="text-red">*</i> 分类</label>
                  <div class="col-sm-10">
                    <select class="form-control" style="width: 100%;">
                      <option selected="selected">爱情</option>
                      <option>性格</option>
                      <option>社交</option>
                      <option>财富</option>
                      <option>职场</option>
                      <option>趣味</option>
                      <option>能力</option>
                      <option>智商</option>
                      <option>综合</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">标签</label>
                  <div class="col-sm-10">
                    <div class="row">
                      <div class="col-xs-4 col-sm-2">
                        <input type="text" class="form-control">
                      </div>
                      <div class="col-xs-4 col-sm-2">
                        <input type="text" class="form-control">
                      </div>
                      <div class="col-xs-4 col-sm-2">
                        <input type="text" class="form-control">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">封面图</label>

                  <div class="col-sm-10">
                    <input type="file" class="form-control">
                  </div>
                </div>

                

                <div class="form-group">
                  <label for="seo" class="col-sm-2 control-label"></label>
                  <div class="col-sm-10">

                      <div class="box collapsed-box col-sm-2" style="border-top:1px solid #eee;">
                        <div class="box-header" data-widget="collapse">
                        <i class="fa fa-plus" style="font-weight: normal;font-size: 16px;"></i>
                        <h3 class="box-title" style="font-weight: normal;font-size: 16px;">
                        SEO属性设置</h3>
                        </div>

                        <div class="box-body" style="display: none;">
                            <div class="form-group">
                              <label for="title" class="col-sm-2 control-label">Title</label>

                              <div class="col-sm-10">
                                <input type="title" class="form-control" id="inputTitle">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="title" class="col-sm-2 control-label">Keywords</label>

                              <div class="col-sm-10">
                                <input type="title" class="form-control" id="inputTitle">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="title" class="col-sm-2 control-label">Description</label>

                              <div class="col-sm-10">
                                <input type="title" class="form-control" id="inputTitle">
                              </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                      </div>
                   
                  </div>
                </div>

       
                
              </div>
              <!-- /.box-body -->
            </form>
          </div>
          <!-- /.box-body -->
      </div>

      <div class="box box-default" id="options">
          <div class="box-header with-border" data-widget="collapse"><i class="fa fa-minus"></i>
            <h3 class="box-title" >问题选项</h3>
          </div>
          <form class="form-horizontal">
            <div class="box-body">
                  <div class="form-group">
                    <label for="title" class="col-sm-2 control-label"><i class="text-red">*</i> 选项A</label>
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-xs-9 col-sm-9">
                          <input type="text" class="form-control">
                        </div>
                        <div class="col-xs-3 col-sm-3">
                          <input type="text" class="form-control" placeholder="对应结果">
                        </div>
                        
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="title" class="col-sm-2 control-label"><i class="text-red">*</i> 选项B</label>
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-xs-9 col-sm-9">
                          <input type="text" class="form-control">
                        </div>
                        <div class="col-xs-3 col-sm-3">
                          <input type="text" class="form-control" placeholder="对应结果">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">选项C</label>
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-xs-9 col-sm-9">
                          <input type="text" class="form-control">
                        </div>
                        <div class="col-xs-3 col-sm-3">
                          <input type="text" class="form-control" placeholder="对应结果">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">选项D</label>
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-xs-9 col-sm-9">
                          <input type="text" class="form-control">
                        </div>
                        <div class="col-xs-3 col-sm-3">
                          <input type="text" class="form-control" placeholder="对应结果">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="seo" class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">

                       <button type="submit" class="btn btn-success" ><i class="fa fa-save"></i>  保存</button>
                       <button type="button" class="btn btn-default" style="margin-left:20px"> 增加选项</button>
                     
                    </div>
                  </div>

            </div>
          </form>
          <!-- /.box-body -->
      </div>

      <div class="box box-default" id="results">
          <div class="box-header with-border" data-widget="collapse"><i class="fa fa-minus"></i>
            <h3 class="box-title" >测试结果</h3>
          </div>
          <div class="box-body">
            <div class="box box-default box-solid">
              <div class="box-header with-border" data-widget="collapse"><i class="fa fa-minus"></i>
                <h3 class="box-title">结果A</h3>

              </div>
              <!-- /.box-header -->
                <form class="form-horizontal">
                <div class="box-body">

                 <div class="form-group">
                    <label for="title" class="col-sm-2 control-label"><i class="text-red">*</i> 分值区间</label>
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-xs-5 col-sm-2">
                          <input type="text" class="form-control" placeholder="最小值">
                        </div>
                        <div class="col-xs-5 col-sm-2">
                          <input type="text" class="form-control" placeholder="最大值">
                        </div>
                        
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="title" class="col-sm-2 control-label"><i class="text-red">*</i> 简单结论</label>

                    <div class="col-sm-10">
                      <input type="title" class="form-control" id="inputTitle">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="详细解释" class="col-sm-2 control-label">详细解释</label>

                    <div class="col-sm-10">
                      <script type="text/plain" id="myEditor2" style="width:100%;height:100px;"></script>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">封面图</label>

                    <div class="col-sm-10">
                      <input type="file" class="form-control">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="seo" class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">

                       <button type="submit" class="btn btn-success" ><i class="fa fa-save"></i>  保存</button>
                      
                    </div>
                  </div>

                </div>
                <!-- /.box-body -->
              </form>
              <!-- /.box-body -->
            </div>

            <div class="box box-default box-solid">
              <div class="box-header with-border" data-widget="collapse"><i class="fa fa-minus"></i>
                <h3 class="box-title">结果B</h3>

              </div>
              <!-- /.box-header -->
                <form class="form-horizontal">
                <div class="box-body">

                 <div class="form-group">
                    <label for="title" class="col-sm-2 control-label"><i class="text-red">*</i> 分值区间</label>
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-xs-5 col-sm-2">
                          <input type="text" class="form-control" placeholder="最小值">
                        </div>
                        <div class="col-xs-5 col-sm-2">
                          <input type="text" class="form-control" placeholder="最大值">
                        </div>
                        
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="title" class="col-sm-2 control-label"><i class="text-red">*</i> 简单结论</label>

                    <div class="col-sm-10">
                      <input type="title" class="form-control" id="inputTitle">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="详细解释" class="col-sm-2 control-label">详细解释</label>

                    <div class="col-sm-10">
                      <script type="text/plain" id="myEditor3" style="width:100%;height:100px;"></script>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">封面图</label>

                    <div class="col-sm-10">
                      <input type="file" class="form-control">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="seo" class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">

                       <button type="submit" class="btn btn-success" ><i class="fa fa-save"></i>  保存</button>
                      
                    </div>
                  </div>

                </div>
                <!-- /.box-body -->
              </form>
              <!-- /.box-body -->
            </div>
           <button type="button" class="btn btn-lg btn-block btn-info"  style="margin:20px 0;"><i class="fa fa-plus"></i>  增加下一个结果</button>

        
          </div>
          <!-- /.box-body -->
      </div>

      <button type="button" class="btn btn-lg btn-block btn-success"  style="margin:20px 0;"><i class="fa fa-rocket"></i>  提交</button>
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
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="dist/js/app.min.js"></script>
<script type="text/javascript">
var um = UM.getEditor('myEditor');
var um1 = UM.getEditor('myEditor1');
var um2 = UM.getEditor('myEditor2');
var um3 = UM.getEditor('myEditor3');
</script>
</body>
</html>
