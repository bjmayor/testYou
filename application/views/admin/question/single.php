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
