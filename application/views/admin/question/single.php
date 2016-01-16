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
            <form class="form-horizontal" name="create_question">
                <div class="box-body">
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label"><i class="text-red">*</i> 题目</label>

                        <div class="col-sm-10">
                            <input type="title" class="form-control" id="title" value=<?php echo isset($question)?$question['title']:""; ?>>
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
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label"><i class="text-red">*</i> 选项A</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-xs-9 col-sm-9">
                                <input type="text" class="form-control" name="answer" label="a">
                            </div>
                            <div class="col-xs-3 col-sm-3">
                                <input type="text" class="form-control" placeholder="对应结果" name="result_label">
                            </div>

                        </div>
                    </div>
                </div>
                <?php endforeach;?>

                <?php else: ?>
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label"><i class="text-red">*</i> 选项a</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-xs-9 col-sm-9">
                                <input type="text" class="form-control" name="answer" label="a">
                            </div>
                            <div class="col-xs-3 col-sm-3">
                                <input type="text" class="form-control" placeholder="对应结果" name="result_label">
                            </div>

                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label"><i class="text-red">*</i> 选项b</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-xs-9 col-sm-9">
                                <input type="text" class="form-control" name="answer" label="b">
                            </div>
                            <div class="col-xs-3 col-sm-3">
                                <input type="text" class="form-control" placeholder="对应结果" name="result_label">
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif;?>

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
                <form class="form-horizontal" name="result" label="a">
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

            <button type="button" class="btn btn-lg btn-block btn-info"  style="margin:20px 0;"><i class="fa fa-plus"></i>  增加下一个结果</button>


        </div>
        <!-- /.box-body -->
    </div>

    <button type="button" class="btn btn-lg btn-block btn-success"  style="margin:20px 0;"><i class="fa fa-rocket"></i>  提交</button>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script type="text/javascript">
    var questionId =  <?php echo isset($question)?$question['id']:-1; ?>;
    $(function(){
            var um = UM.getEditor('description');
            var um1 = UM.getEditor('myEditor1');
            var um2 = UM.getEditor('myEditor2');
            var um3 = UM.getEditor('myEditor3');
            <?php if(isset($question)):?>
            um.setContent('<?php echo $question['description']; ?>',false,false);
            <?php endif;?>
            //创建问题
            $("form[name=create_question]").submit(function(){
                $.post("create",
                    {
                        title:$("#title").val(),
                        description:um.getContent(),
                        question_category_id:$("#question_category_id").val(),
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
                            window.location.href = "single/"+res.data;
                        }
                        else
                        {
                            alert("error");
                        }
                    });
                    return false;
            });
            //保存答案
            $("form[name=answer]").submit(function(){
                var answerData = [];
                answerData.push({question_id:questionId,label:'a',answer_text:'answer1',result_label:'a'});
                $("input[name=answer]").each(function(){});
                $.post("<?php echo site_url('admin/answer/create');?>",
                        {answer:answerData},
                    function(data,status){
                        if(status === "success")
                        {
                            alert('操作成功');
                        }
                        else
                        {
                            alert('操作失败');
                        }

                });
                return false;
            });

            //保存结论
            $("form[name=result]").submit(function(){
                var label = $(this).attr('label');
                var result = {question_id:questionId,label:label,result_label:'a',show_text_result:''};
                $("input[name=answer]").each(function(){});
                $.post("<?php echo site_url('admin/result/create');?>",
                        {result:result},
                    function(data,status){
                        if(status === "success")
                        {
                            alert('操作成功');
                        }
                        else
                        {
                            alert('操作失败');
                        }
                });
                return false;
            });


        });
</script>
