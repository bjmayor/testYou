<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>
        添加/编辑结论
    </h1>
    <!--  <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 后台首页</a></li>
        <li class="active">添加多选评分题</li>
    </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">


    <div class="box box-default" >
        <div class="box-header with-border" data-widget="collapse"><i class="fa fa-minus"></i>
            <h3 class="box-title" >测试结果</h3>
        </div>
        <div class="box-body" name="result_group" >
            <div class="box box-default box-solid">
                <div class="box-header with-border" data-widget="collapse"><i class="fa fa-minus"></i>
                    <h3 class="box-title"><span>结果<?php echo isset($result)?$result['label']:''; ?></span></h3>

                </div>
                <!-- /.box-header -->
                <form class="form-horizontal" name="result">
                    <div class="box-body">

                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label"><i class="text-red">*</i> 分值区间</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-xs-5 col-sm-2">
                                        <input type="text" class="form-control" placeholder="最小值" value="<?php echo isset($result)?$result['score_start']:''; ?>">
                                    </div>
                                    <div class="col-xs-5 col-sm-2">
                                        <input type="text" class="form-control" placeholder="最大值" value="<?php echo isset($result)?$result['score_end']:''; ?>">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label"><i class="text-red">*</i> 简单结论</label>

                            <div class="col-sm-10">
                                <input type="title" class="form-control" id="inputTitle" name="show_text_result" value="<?php echo isset($result)?$result['show_text_result']:''; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="详细解释" class="col-sm-2 control-label">详细解释</label>

                            <div class="col-sm-10">
                                <script type="text/plain" id="show_html_result"  style="width:100%;height:100px;"></script>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">封面图</label>

                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="userfile" id = "result_img">
                                <input type="hidden"  name="show_img_result" value="<?php echo isset($result)?$result['show_img_result']:''; ?>">
                            </div>
                            <div class="progress"> 
                                <span class="bar"></span><span class="percent">0%</span > 
                            </div> 
                            <div class="files"></div> 
                            <div id="showimg"></div> 
                        </div>

                        <div class="form-group">
                            <label for="seo" class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">

                                <button type="submit" class="btn btn-success" name="save_result" ><i class="fa fa-save"></i>  保存</button>

                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->
                </form>
                <!-- /.box-body -->
            </div>



        </div>
            <a href="<?php echo site_url('admin/result/index/'.$question['id']); ?>" class="btn btn-lg btn-block btn-info"  style="margin:20px 0;" ><i class="fa fa-plus"></i>增加下一个</a>
        <!-- /.box-body -->
    </div>

    <a  href = "<?php echo site_url('admin/question/main/'.$question['id']); ?>" class="btn btn-lg btn-block btn-success"  style="margin:20px 0;" ><i class="fa fa-rocket"></i> 返回 </a>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script type="text/javascript">
    var questionId =  <?php echo isset($question)?$question['id']:-1; ?>;
    var resultId = <?php echo isset($result)?$result['id']:-1;?>;
    $(function(){
            var um = UM.getEditor('show_html_result');
            <?php if(isset($result)):?>
            um.setContent('<?php echo $result['show_html_result']; ?>',false,false);
            <?php endif;?>

            //保存结论
            $("form[name=result]").submit(function(){
                
                var result = {
                    id:resultId,
                    question_id:questionId,
                    show_text_result:$('input[name=show_text_result]').val(),
                    show_html_result:um.getContent(),
                    show_img_result:$("input[name=show_img_result]").val()
                };
                $.post("<?php echo site_url('admin/result/create');?>",
                        {result:result},
                    function(data,status){
                        if(status === "success")
                        {
                            var res = eval("("+data+")");
                            if(res.code==0)
                            {
                                alert(data);
//                                window.location.href = "<?php echo site_url('admin/result/index') ?>"+'/'+questionId+'/'+res.data;
                            }
                            else
                            {
                                alert('failed'+data);
                            }
                        }
                        else
                        {
                            alert('操作失败');
                        }
                });
                return false;
            });


            var bar = $('.bar'); 
                var percent = $('.percent'); 
                var showimg = $('#showimg'); 
                var progress = $(".progress"); 
                var files = $(".files"); 
                <?php if(isset($result) && $result['show_img_result']!=''): ?>
                showimg.html("<img src='"+"<?php echo site_url('upload').'/'.$result['show_img_result']; ?>"+"'>"); 
                <?php endif; ?>
                //var btn = $(".btn span"); 
                $("#result_img").change(function(){ //选择文件 
                    $("#result_img").wrap("<form id='myupload' action='"+"<?php echo site_url('admin/question/do_upload/result');?>"+"'  method='post' enctype='multipart/form-data'></form>"); 
                    $("#myupload").ajaxSubmit({ 
                        dataType:  'json', //数据格式为json 
                        beforeSend: function() { //开始上传 
                            showimg.empty(); //清空显示的图片 
                            progress.show(); //显示进度条 
                            var percentVal = '0%'; //开始进度为0% 
                            bar.width(percentVal); //进度条的宽度 
                            percent.html(percentVal); //显示进度为0% 
                 //           btn.html("上传中..."); //上传按钮显示上传中 
                        }, 
                        uploadProgress: function(event, position, total, percentComplete) { 
                            var percentVal = percentComplete + '%'; //获得进度 
                            bar.width(percentVal); //上传进度条宽度变宽 
                            percent.html(percentVal); //显示上传进度百分比 
                        }, 
                        success: function(data) { //成功 
                            //显示上传后的图片 
                            var img = "http://www.xiaojiaoluo.com/upload/question/"+data.data.file_name; 
                            showimg.html("<img src='"+img+"'>"); 
                            $("input[name=img]").val('question/'+data.data.file_name);
                            $("#result_img").unwrap();
                  //          btn.html("添加附件"); //上传按钮还原 
                        }, 
                        error:function(xhr){ //上传失败 
                   //         btn.html("上传失败"); 
                            bar.width('0'); 
                            files.html(xhr.responseText); //返回失败信息 
                        } 
                    }); 
                }); 
        });
</script>
