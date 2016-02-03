  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        数据自动导入
      </h1>
     <!--  <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 后台首页</a></li>
        <li class="active">添加多选评分题</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box box-default" id="basicQuestion">
        
          <div class="box-body">
    <?php if(!isset($error) || $error=''):?>
      <div class="callout callout-success">
        <h4>导入成功</h4>
      </div>
    <?php else:?> 
      <div class="callout callout-warning">
      <h4><?=$error?></h4>
      </div>
    <?php endif;?>
           <form class="form-horizontal" method="post" action="load">
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">网站</label>

                  <div class="col-sm-10">
                    <select name="site_type">
                    <?php foreach($sites as $site):?>
                    <option value="<?=$site['type']?>"><?=$site['site']?></option>
                    <?php endforeach;?>
                    </select>
                  </div>
                </div>

                 <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">json数据</label>

                  <div class="col-sm-10">
                        <textarea rows="10" cols="80" name="data" placeholder="第三方网站的json数据,请确保合法">
                        </textarea>
                  </div>
                </div>

 

              <button type="submit" class="btn btn-lg btn-block btn-success"  style="margin:20px 0;"><i class="fa fa-rocket"></i>  提交</button>
              <!-- /.box-body -->
            </form>
          </div>
          <!-- /.box-body -->
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
