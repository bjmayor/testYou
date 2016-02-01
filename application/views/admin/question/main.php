<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>
        添加问题
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

            <?php echo form_open('admin/question/create', array("class"=>"form-horizontal","name"=>"create_question"));?>
                <div class="box-body">
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label"><i class="text-red">*</i> 题目</label>

                        <div class="col-sm-10">
                            <input type="title" class="form-control"  name = "title" id="title" value=<?php echo isset($question)?$question['title']:""; ?>>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="简介" class="col-sm-2 control-label"><i class="text-red">*</i> 简介</label>

                        <div class="col-sm-10">
                            <script type="text/plain" id="description" style="width:100%;height:100px;"></script>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label"><i class="text-red">*</i> 分类</label>
                        <div class="col-sm-10">
                            <select class="form-control" style="width: 100%;" id = "question_category_id">
                                <?php foreach($category as $item): ?>
                                <option value='<?php echo $item['id'];?>'
                                <?php if(isset($question) && $item['id'] == $question['question_category_id']): ?>
                                selected
                                <?php endif; ?>
                                ><?php echo $item['description'];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">题目类型</label>
                        <div class="col-sm-10">
                            <select class="form-control" style="width: 100%;" id = "question_type">
                                <?php foreach($question_type as $item): ?>
                                <option value='<?php echo $item['id'];?>'
                                <?php if(isset($question) && $item['id'] == $question['question_type']): ?>
                                selected
                                <?php endif; ?>
                                ><?php echo $item['description'];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">发布状态</label>
                        <div class="col-sm-10">
                            <select class="form-control" style="width: 100%;" id = "publish_status">
                                <?php foreach($publish_status as $item): ?>
                                <option value='<?php echo $item['id'];?>'
                                <?php if(isset($question) && $item['id'] == $question['publish_status']): ?>
                                selected
                                <?php endif; ?>
                                ><?php echo $item['description'];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">标签</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-xs-4 col-sm-2">
                                    <input type="text" class="form-control" id="question_tag">
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
                            <input type="file" class="form-control" name="userfile" id = "question_img">
                            <input type="hidden"  name="img" value="<?php echo isset($question)?$question['img']:''; ?>">
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
                                        <input type="title" class="form-control" id="seo_title" value="<?php echo isset($meta)?$meta['seo_title']:'' ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="title" class="col-sm-2 control-label">Keywords</label>

                                        <div class="col-sm-10">
                                            <input type="title" class="form-control" id="seo_keywords" value="<?php echo isset($meta)?$meta['seo_keywords']:'' ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="title" class="col-sm-2 control-label">Description</label>

                                        <div class="col-sm-10">
                                            <input type="title" class="form-control" id="seo_description" value="<?php echo isset($meta)?$meta['seo_description']:'' ?>">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>


                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-success" id="create_question"><i class="fa fa-save"></i>  保存</button>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.box-body -->
            </form>
        <!-- /.box-body -->


    <div class="box box-default" >
        <div class="box-header with-border" data-widget="collapse"><i class="fa fa-minus"></i>
            <h3 class="box-title" >测试结果</h3>
        </div>
        <?php if(isset($results) && $results!=false): ?>
        <?php foreach($results as $result):?>
        <div class="box-body" name="result_group" label="<?php echo $result['label']; ?>" id="result_group_<?php echo $result['id'];?>">
            <div class="box box-default box-solid">
                <div class="box-header with-border" data-widget="collapse"><i class="fa fa-minus"></i>
                    <h3 class="box-title"><span>结果<?php echo $result['label']; ?></span></h3>

                </div>
                <!-- /.box-header -->
                <form class="form-horizontal" name="result">
                    <div class="box-body">
                        <?php if($question['question_type']==2): ?>
                        <div class="form-group">
                            
                            <label for="title" class="col-sm-2 control-label"><i class="text-red">*</i> 分值区间</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-xs-5 col-sm-2">
                                        <input type="text" class="form-control" placeholder="最小值" value="<?php echo $result['score_start']; ?>">
                                    </div>
                                    <div class="col-xs-5 col-sm-2">
                                        <input type="text" class="form-control" placeholder="最大值" value="<?php echo $result['score_end']; ?>">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <?php endif;?>

                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label"><i class="text-red">*</i> 简单结论</label>

                            <div class="col-sm-10">
                            <pre>
                                <?php echo $result['show_text_result']; ?>
                            </pre>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="详细解释" class="col-sm-2 control-label">详细解释</label>

                            <div class="col-sm-10">
                                <pre> <?php echo $result['show_html_result']; ?></pre>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">封面图</label>

                            <div class="col-sm-10">
                                <img src="<?php echo site_url('upload/'.$result['show_img_result']); ?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="seo" class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">

                                <a  href ="<?php echo site_url('admin/result/index/'.$question['id'].'/'.$result['id']); ?>" type="submit" class="btn btn-default" ><i class="fa fa-edit"></i>  编辑</a>
                                <button type="button" class="btn btn-default" name="del_result" result_id="<?php echo $result['id']; ?>" ><i class="fa fa-trash"></i>  删除</button>

                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->
                </form>
                <!-- /.box-body -->
            </div>
        </div>
        <?php endforeach;?>
        <?php endif; ?>
        </div>
            <button type="button" class="btn btn-lg btn-block btn-info"  style="margin:20px 0;" name="add_result"><i class="fa fa-plus"></i>增加结果</button>
        <!-- /.box-body -->
    </div>

 <div class="box box-default" id="options">
          <div class="box-header with-border" data-widget="collapse"><i class="fa fa-minus"></i>
            <h3 class="box-title" >问题选项</h3>
          </div>

          <div class="box-body">
        <?php if (isset($sub_questions) && $sub_questions!=false): ?>
        <?php foreach($sub_questions as $sub_question):?>
          <div class="box box-default box-solid" id="question_group_<?php echo $sub_question['id']; ?>">
            <div class="box-header with-border" data-widget="collapse"><i class="fa fa-minus"></i>
            <h3 class="box-title">问题Q<?php echo $sub_question['label']; ?> </h3>

            </div>
            <!-- /.box-header -->
              <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label"><i class="text-red">*</i> 题目</label>

                  <div class="col-sm-10">
                    <pre>
                    <?php echo $sub_question['title']; ?>
                    </pre>
                  </div>
                </div>
                <div class="form-group">
                  <label for="简介" class="col-sm-2 control-label">简介</label>

                  <div class="col-sm-10">
                    <pre>
                    <?php echo $sub_question['description']; ?>
                    </pre>
                  </div>

                </div>
                <div class="form-group">
                            <label for="seo" class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">

                                <a href="<?php echo site_url('admin/question/sub/'.$question['id'].'/'.$sub_question['id']);?>" class="btn btn-default" ><i class="fa fa-edit"></i>  编辑</a>
                                <button type="button" class="btn btn-default" name="del_question" question_id="<?php echo $sub_question['id']; ?>" ><i class="fa fa-trash"></i>  删除</button>

                            </div>
                </div>

                <?php if($sub_question['answers']):?>
                <?php foreach($sub_question['answers'] as $answer): ?>
                <div class="form-group">
                <label for="title" class="col-sm-2 control-label"><i class="text-red">*</i> 选项<?php echo $answer['label']; ?></label>
                  <div class="col-sm-10">
                    <div class="row">
                      <div class="col-xs-9 col-sm-9">
                      <input type="text" class="form-control" value="<?php echo $answer['answer_text']; ?>">
                      </div>
                      <div class="col-xs-3 col-sm-3">
                        <label>
                        <?php if($question['question_type']==1):?>
                        结论<?php echo $answer['result_label']?>
                        <?php elseif($question['question_type']==2):?>
                        分数:<?php echo $answer['score'];?>
                        <?php else:?>
                            <?php if($answer['next_question_label']>0):?>
                            子问题<?php echo $answer['next_question_label'];?>
                            <?php else: ?>
                            结论<?php echo $answer['result_label'];?>
                            <?php endif;?>
                        <?php endif;?>
                        </label>
                      </div>
                      
                    </div>
                  </div>
                </div>
                <?php endforeach;?>
                <?php endif;?>
              </div>
              <!-- /.box-body -->
            </form>
            <!-- /.box-body -->
          </div>
        <?php endforeach;?>
        <?php endif; ?>
           <button type="button" id = "add_question" class="btn btn-lg btn-block btn-info"  style="margin:20px 0;"><i class="fa fa-plus"></i>  增加问题</button>

        
          </div>
          <!-- /.box-body -->
      </div>


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script type="text/javascript">
    var questionId =  <?php echo isset($question)?$question['id']:-1; ?>;
    $(function(){
            var um = UM.getEditor('description');
            var resultUM;
            <?php if(isset($question)):?>
            um.setContent('<?php echo $question['description']; ?>',false,false);
            <?php endif;?>

            <?php if(isset($results) && $results!=false):?>
            resultUM  = UM.getEditor('show_html_result');
            <?php endif;?>

            $("#add_question").click(function(){
                window.location.href = "<?php echo site_url('admin/question/sub'); ?>"+"/"+questionId;
            });

            //创建问题
            $("form[name=create_question]").submit(function(){
                $.post("<?php echo site_url('admin/question/create'); ?>",
                    {
                        title:$("#title").val(),
                        description:um.getContent(),
                        text_description:um.getContentTxt(),
                        question_category_id:$("#question_category_id").val(),
                        img:$("input[name=img]").val(),
                        seo_title : $("#seo_title").val(),
                        seo_keywords:$("#seo_keywords").val(),
                        seo_description:$("#seo_description").val(),
                        question_type:$("#question_type").val(),
                        question_tag:$("#question_tag").val(),
                        publish_status:$("#publish_status").val(),
                        id:questionId
                    },
                    function(data,status){
                        if(status==="success")
                        {
                            var res = eval("("+data+")");
                            questionId = res.data;
                            window.location.href =  "<?php echo site_url('admin/question/main');?>" + "/"+res.data;
                        }
                        else
                        {
                            alert("error");
                        }
                    });
                    return false;
            });

            //动态增加结点
            $("button[name=add_result]").click(function(){
                window.location.href = "<?php echo site_url('admin/result/index').'/'; ?>"+questionId;
            });
            $("button[name=del_question]").click(function(){
                var id = $(this).attr("question_id");
                $.post("<?php echo site_url('admin/question/del'); ?>",
                    {
                        id:id
                    },
                    function(data,status){
                        if(status==="success")
                        {
                            var res = eval("("+data+")");
                            if(res.code == 0)
                            {
                                $("#question_group_"+id).remove();
                            }
                            else
                            {
                                alert("fail"+data);
                            }
                        }
                        else
                        {
                            alert("error");
                        }
                    });

                return false;
            });

            $("button[name=del_result]").click(function(){
                var id = $(this).attr("result_id");
                $.post("<?php echo site_url('admin/result/del'); ?>",
                    {
                        id:id
                    },
                    function(data,status){
                        if(status==="success")
                        {
                            var res = eval("("+data+")");
                            if(res.code == 0)
                            {
                                $("#result_group_"+id).remove();
                            }
                            else
                            {
                                alert("fail"+data);
                            }
                        }
                        else
                        {
                            alert("error");
                        }
                    });

                return false;
            });


            var bar = $('.bar'); 
                var percent = $('.percent'); 
                var showimg = $('#showimg'); 
                var progress = $(".progress"); 
                var files = $(".files"); 
                <?php if(isset($question) && $question['img']!=''): ?>
                showimg.html("<img src='"+"<?php echo base_url().'/upload/'.$question['img']; ?>"+"'>"); 
                <?php endif; ?>

                //var btn = $(".btn span"); 
                $("#question_img").change(function(){ //选择文件 
                    $("#question_img").wrap("<form id='myupload' action='"+"<?php echo site_url('admin/question/do_upload/question');?>"+"'  method='post' enctype='multipart/form-data'></form>"); 
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
                            $("#question_img").unwrap();
                  //          btn.html("添加附件"); //上传按钮还原 
                        }, 
                        error:function(xhr){ //上传失败 
                   //         btn.html("上传失败"); 
                            bar.width('0'); 
                            files.html(xhr.responseText); //返回失败信息 
                        } 
                    }); 
                }); 

            
                //结果图片
                var showimgResult = $('#show_result_img'); 
                var filesResult = $(".result_files"); 

                $("#result_img").change(function(){ //选择文件 
                    $("#result_img").wrap("<form id='upload_result_img' action='"+"<?php echo site_url('admin/question/do_upload/result');?>"+"'  method='post' enctype='multipart/form-data'></form>"); 
                    $("#upload_result_img").ajaxSubmit({ 
                        dataType:  'json', //数据格式为json 
                        beforeSend: function() { //开始上传 
                            showimgResult.empty(); //清空显示的图片 
                        }, 
                        uploadProgress: function(event, position, total, percentComplete) { 
                        }, 
                        success: function(data) { //成功 
                            //显示上传后的图片 
                            var img = "http://www.xiaojiaoluo.com/upload/result/"+data.data.file_name; 
                            showimgResult.html("<img src='"+img+"'>"); 
                            $("#result_img").unwrap();
                        }, 
                        error:function(xhr){ //上传失败 
                            filesResult.html(xhr.responseText); //返回失败信息 
                        } 
                    }); 
                }); 

        });
</script>
