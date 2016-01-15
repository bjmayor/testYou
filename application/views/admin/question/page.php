 <!-- Content Wrapper. Contains page content -->  <div class="content-wrapper">    <!-- Content Header (Page header) -->    <!-- Main content -->    <section class="content">        <div class="box box-primary">            <div class="box-header with-border">              <h3 class="box-title">测试题管理</h3>              <div class="box-tools pull-right">                <div class="has-feedback">                  <input type="text" class="form-control input-sm" placeholder="搜索测试题">                  <span class="glyphicon glyphicon-search form-control-feedback"></span>                </div>              </div>              <!-- /.box-tools -->            </div>            <!-- /.box-header -->            <div class="box-body no-padding">              <div class="mailbox-controls">                <!-- Check all button -->                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><input type="checkbox">                </button>                 <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>                <div class="btn-group">                  <a href ="<?php echo site_url('admin/question/score');?>" class="btn btn-default btn-sm"><i class="fa fa-circle-o text-red"></i> 添加评分题</a>                  <a href = "<?php echo site_url('admin/question/jump');?>" class="btn btn-default btn-sm"><i class="fa fa-circle-o text-yellow"></i> 添加跳转题</button>                  <a href = "<?php echo site_url('admin/question/single');?>" class="btn btn-default btn-sm"><i class="fa fa-circle-o text-aqua"></i> 添加单选题</a>                               </div>                <div class="btn-group ">                  <button type="button" class="btn btn-sm btn-default">分类筛选</button>                  <button type="button" class="btn btn-sm  btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">                    <span class="caret"></span>                    <span class="sr-only">Toggle Dropdown</span>                  </button>                  <ul class="dropdown-menu" role="menu">                  <?php foreach($category as $item): ?>                    <li><a href="<?php echo site_url('admin/question/page/1/20/'.$item['id']);?>"><?php echo $item['description'];?></a></li>                    <?php endforeach;?>                  </ul>                </div>                <!-- /.btn-group -->                               <div class="pull-right">                  1-50/200                  <div class="btn-group">                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>                  </div>                  <!-- /.btn-group -->                </div>                <!-- /.pull-right -->              </div>              <table class="table table-hover">                <tbody><tr>                  <th>选择</th>                  <th>ID</th>                  <th>题目</th>                  <th>总题数</th>                  <th>浏览数</th>                  <th>状态</th>                  <th>分类</th>                  <th>操作</th>                </tr>                <?php foreach  ($questions as $question):?>                <tr>                  <td><input type="checkbox"></td>                  <td><?php echo $question['id'];?></td>                  <td><?php echo $question['title'];?></td>                  <td>12</td>                  <td>2223</td>                  <td><span class="label label-success">已发布</span></td>                  <td>爱情</td>                  <td>                  <button type="button" class="btn btn-default btn-sm" name="edit_question" question_id=<?php echo $question['id']; ?>><i class="fa fa-edit"></i></button>                  <button type="button" class="btn btn-default btn-sm" name="delete_question"  question_id=<?php echo $question['id'];?>><i class="fa fa-trash"></i></button></td>                </tr>                <?php endforeach;?>                              </tbody></table>              <!-- /.mail-box-messages -->            </div>            <!-- /.box-body -->            <div class="box-footer no-padding">              <div class="mailbox-controls">                <!-- Check all button -->                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><input type="checkbox">                </button>                <div class="btn-group">                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>                                 </div>                <!-- /.btn-group -->                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>                <div class="pull-right">                  1-50/200                  <div class="btn-group">                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>                  </div>                  <!-- /.btn-group -->                </div>                <!-- /.pull-right -->              </div>            </div>          </div>    </section>    <!-- /.content -->  </div><script>$(function(){   //编辑问题     $("button[name='edit_question']").click(function()        {            window.location.href = ""            alert("click"+$(this).attr("question_id"));        });//删除问题    $("button[name='delete_question']").click(function()        {            alert("click"+$(this).attr("question_id"));            /*            $.post('del',                {question_id:$(this).attr("question_id")},                function(data,status)                {                    alert(data);                }   */        });});</script>  <!-- /.content-wrapper -->