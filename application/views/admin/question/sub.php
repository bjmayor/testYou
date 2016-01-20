<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>
        添加/编辑子问题
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
                                            <input type="title" class="form-control" id="seo_title">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="title" class="col-sm-2 control-label">Keywords</label>

                                        <div class="col-sm-10">
                                            <input type="title" class="form-control" id="seo_keywords">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="title" class="col-sm-2 control-label">Description</label>

                                        <div class="col-sm-10">
                                            <input type="title" class="form-control" id="seo_description">
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
        </div>
        <!-- /.box-body -->
    </div>

    <div class="box box-default" id="options">
        <div class="box-header with-border" data-widget="collapse"><i class="fa fa-minus"></i>
            <h3 class="box-title" >问题选项</h3>
        </div>
        <form class="form-horizontal" name="answer">
            <div class="box-body">
                <?php if(isset($answer) && $answer!=false):?>

                <?php foreach($answer as $item): ?>
                <div class="form-group" name="answer_group">
                <label for="title" class="col-sm-2 control-label"><i class="text-red">*</i> 选项<span><?php echo $item['label']; ?></span></label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-xs-9 col-sm-9">
                                <input type="text" class="form-control" name="answer" label="<?php echo $item['label']; ?>" answer_id="<?php echo $item['id']; ?>" value="<?php echo $item['answer_text']; ?>">
                            </div>
                            <div class="col-xs-3 col-sm-3">
                                <input type="text" class="form-control" placeholder="对应结果" name="result_label" value="<?php echo $item['result_label']; ?>">
                            </div>

                        </div>
                    </div>
                </div>
                <?php endforeach;?>

                <?php else: ?>
                <div class="form-group" name="answer_group">
                    <label for="title" class="col-sm-2 control-label"><i class="text-red">*</i> 选项<span>a</span></label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-xs-9 col-sm-9">
                                <input type="text" class="form-control" name="answer" label="a" answer_id="-1">
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">结论</label>
                        <div class="col-sm-10">
                            <select class="form-control" style="width: 100%;" id = "question_category_id">
                                <?php foreach($results as $item): ?>
                                <option value='<?php echo $item['id'];?>'
                                ><?php echo $item['show_text_result'];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>

                </div>
                <?php endif;?>

                <div class="form-group">
                    <label for="seo" class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">

                        <button type="submit" class="btn btn-success" ><i class="fa fa-save"></i>  保存</button>
                        <button type="button" class="btn btn-default" style="margin-left:20px" name="add_answer"> 增加选项</button>

                    </div>
                </div>

            </div>
        </form>
        <!-- /.box-body -->
    </div>

    <div class="box box-default" >
        <div class="box-header with-border" data-widget="collapse"><i class="fa fa-minus"></i>
            <h3 class="box-title" >测试结果</h3>
        </div>
        <?php if(isset($results) && $results!=false): ?>
        <?php foreach($results as $result):?>
        <div class="box-body" name="result_group" label="<?php echo $result['label']; ?>">
            <div class="box box-default box-solid">
                <div class="box-header with-border" data-widget="collapse"><i class="fa fa-minus"></i>
                    <h3 class="box-title"><span>结果<?php echo $result['result']; ?></span></h3>

                </div>
                <!-- /.box-header -->
                <form class="form-horizontal" name="result">
                    <div class="box-body">

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

                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label"><i class="text-red">*</i> 简单结论</label>

                            <div class="col-sm-10">
                                <input type="title" class="form-control" id="inputTitle" name="show_text_result" value="<?php echo $result['show_text_result']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="详细解释" class="col-sm-2 control-label">详细解释</label>

                            <div class="col-sm-10">
                                <script type="text/plain" id="<?php echo 'result_'.$result['label']; ?>" name="editor" style="width:100%;height:100px;"></script>
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
        <?php endforeach;?>
        <?php else: ?>
        <div class="box-body" name="result_group" label="a">
            <div class="box box-default box-solid">
                <div class="box-header with-border" data-widget="collapse"><i class="fa fa-minus"></i>
                    <h3 class="box-title">结果<span>a</span></h3>

                </div>
                <!-- /.box-header -->
                <form class="form-horizontal" name="result">
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
                                <script type="text/plain" id="result_a" style="width:100%;height:100px;" name="editor"></script>
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
            <?php endif; ?>



        </div>
            <button type="button" class="btn btn-lg btn-block btn-info"  style="margin:20px 0;" name="add_result"><i class="fa fa-plus"></i>  增加下一个结果</button>
        <!-- /.box-body -->
    </div>

    <button type="button" class="btn btn-lg btn-block btn-success"  style="margin:20px 0;"><i class="fa fa-rocket"></i>  增加另一个问题</button>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script type="text/javascript">
    var questionId =  <?php echo isset($question)?$question['id']:-1; ?>;
    $(function(){
            var um = UM.getEditor('description');
            <?php if(isset($question)):?>
            um.setContent('<?php echo $question['description']; ?>',false,false);
            <?php endif;?>
            //创建问题
            $("form[name=create_question]").submit(function(){
                $.post("<?php echo site_url('admin/question/create'); ?>",
                    {
                        title:$("#title").val(),
                        description:um.getContent(),
                        question_category_id:$("#question_category_id").val(),
                        img:$("input[name=img]").val(),
                        seo_title : $("#seo_title").val(),
                        seo_keywords:$("#seo_keywords").val(),
                        seo_description:$("#seo_description").val(),
                        question_type:1,
                        question_tag:$("#question_tag").val(),
                        id:questionId
                    },
                    function(data,status){
                        if(status==="success")
                        {
                            var res = eval("("+data+")");
                            questionId = res.data;
                            window.location.href =  "<?php echo site_url('admin/question/single');?>" + "/"+res.data;
                        }
                        else
                        {
                            alert("error");
                        }
                    });
                    return false;
            });

            $("button[name=add_answer]").click(function(){
                var lastGroup =  $("div[name=answer_group]").last();
                var copyGroup = lastGroup.clone();
                var label = String.fromCharCode(copyGroup.find("input[name=answer]").attr("label").charCodeAt(0)+1);
                copyGroup.find("input[name=answer]").attr("label",label);
                copyGroup.find("span").html(label);
                copyGroup.insertAfter(lastGroup);
            });

            //保存答案
            $("form[name=answer]").submit(function(){
                var answerData = [];
                answerData.push({question_id:questionId,label:'a',answer_text:'answer1',result_label:'a'});
                $("div[name=answer_group]").each(function(index,obj){
                    var label = $(obj).find("input[name=answer]").attr("label");
                    var answer_id  = $(obj).find("input[name=answer]").attr("answer_id");
                    var answer_text = $(obj).find("input[name=answer]").val();
                    var result_label = $(obj).find("input[name=result_label]").val();
                    answerData.push({question_id:questionId,label:label,answer_text:answer_text,result_label:result_label,id:answer_id});
                });
                $.post("<?php echo site_url('admin/answer/create');?>",
                        {answers:answerData},
                    function(data,status){
                        if(status === "success")
                        {
                            alert('操作成功'+data);
                        }
                        else
                        {
                            alert('操作失败');
                        }

                });
                return false;
            });
            //动态增加结点
            $("button[name=add_result]").click(function(){
                var lastGroup =  $("div[name=result_group]").last();
                var copyGroup = lastGroup.clone();
                var label = String.fromCharCode(lastGroup.attr("label").charCodeAt(0)+1);
                copyGroup.attr("label",label);
                copyGroup.find("span").html(label);
                copyGroup.find("script[name=editor]").attr("id","result_"+label);
                copyGroup.insertAfter(lastGroup);
            });


            var bar = $('.bar'); 
                var percent = $('.percent'); 
                var showimg = $('#showimg'); 
                <?php if(isset($question) && $question['img']!=''): ?>
                showimg.html("<img src='"+<?php echo $question['img']; ?>+"'>"); 
                <?php endif; ?>

                var progress = $(".progress"); 
                var files = $(".files"); 
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
        });
</script>
