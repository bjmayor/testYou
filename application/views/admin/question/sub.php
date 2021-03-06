<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>
        添加/编辑子问题
        <?php if(isset($sub_questions) && $sub_questions!=false):?>
        <?php foreach($sub_questions as $subquestion): ?>
        <a href="<?=site_url('admin/question/sub/'.$main_question['id'].'/'.$subquestion['id'])?>" <?php if($subquestion['id']==$question['id']):?>style="color:red;"<?php endif;?>><?=$subquestion['label']?></a>
        <?php endforeach;?>
        <?php endif;?>
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
                        <label for="简介" class="col-sm-2 control-label"> 简介</label>

                        <div class="col-sm-10">
                            <script type="text/plain" id="description" style="width:100%;height:100px;"></script>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="保存" class="col-sm-2 control-label"> </label>

                        <div class="col-sm-10">
                              <button type="submit" class="btn btn-success btn-lg" id="create_question"><i class="fa fa-save" style="margin-right: 5px"></i>  保存</button>
                        </div>
                    </div>


                </div>
                <!-- /.box-body -->
            </form>
        </div>
        <!-- /.box-body -->
    </div>

   <?php if(isset($question)):?>
    <div class="box box-default" id="options">
        <div class="box-header with-border" data-widget="collapse"><i class="fa fa-minus"></i>
            <h3 class="box-title" >问题选项</h3>
        </div>
        <form class="form-horizontal" name="answer">
            <?php if(isset($answers) && $answers!=false):?>
            <?php foreach($answers as $item): ?>

            <div class="box-body" name="answer_group" id="answer_<?php echo $item['id']?>">
                <div class="form-group" >
                <label for="title" class="col-sm-2 control-label"><i class="text-red">*</i> 选项<span><?php echo $item['label']; ?></span></label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-xs-9 col-sm-9">
                                <input type="text" class="form-control" name="answer" label="<?php echo $item['label']; ?>" answer_id="<?php echo $item['id']; ?>" value="<?php echo $item['answer_text']; ?>">
                            </div>
                            <div class="col-sm-2 btn">
                             <button type="button" name="delete_answer" class="btn btn-default" answer_id="<?php echo $item['id']; ?>"  ><i class="fa fa-trash"></i>  删除</button>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if($main_question['question_type']==1): ?>
                <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">结论</label>
                        <div class="col-sm-10">
                            <select class="form-control" style="width: 100%;">
                                <?php foreach($results as $result): ?>
                                <option value='<?php echo $result['label'];?>'
                                <?php if($item['jump_label']==$result['label']):?>selected<?php endif?>
                                ><?php echo '结论'.$result['label'].':'.$result['show_text_result'];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                <?php elseif($main_question['question_type']==2):?>
                <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">分数</label>
                        <div class="col-xs-2 col-sm-2">
                            <input type="text" class="form-control sm" placeholder="分数" name="score" value="<?php echo $item['score']; ?>">
                        </div>
                </div>
                <?php elseif($main_question['question_type']==3):?>
                      <label for="title" class="col-sm-2 control-label">跳转</label>
                        <div class="col-sm-10">
                            <select class="form-control" style="width: 100%;" >
                                <?php foreach($results as $result): ?>
                                <option value='<?php echo $result['label'];?>' type="0"
                                <?php if($item['jump_label']==$result['label'] && $item['jump_type']==0):?>selected<?php endif?>
                                ><?php echo '结论'.$result['label'].':'.$result['show_text_result'];?></option>
                                <?php endforeach;?>

                                <?php if($sub_questions!=false):?>
                                <?php foreach($sub_questions as $sub_question): ?>
                                <option value='<?php echo $sub_question['label'];?>' type="1"
                                <?php if($item['jump_label']==$sub_question['label'] && $item['jump_type']==1):?>selected<?php endif?>
                                 ><?php echo '问题'.$sub_question['label'].':'.$sub_question['title'];?></option>
                                <?php endforeach;?>
                                <?php endif;?>

                            </select>
                        </div>

                <?php endif;?>

</div>
                <?php endforeach;?>

                <?php else: ?>

            <div class="box-body" name="answer_group">
                <div class="form-group" >
                    <label for="title" class="col-sm-2 control-label"><i class="text-red">*</i> 选项<span>a</span></label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-xs-9 col-sm-9">
                                <input type="text" class="form-control" name="answer" label="a" answer_id="-1">
                            </div>

                        </div>
                    </div>
                    
                </div>
            <?php if($main_question['question_type']==1): ?>
                <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">结论</label>
                        <div class="col-sm-10">
                            <select class="form-control" style="width: 100%;">
                                <?php foreach($results as $item): ?>
                                <option value='<?php echo $item['label'];?>'
                                ><?php echo '结论'.$item['label'].':'.$item['show_text_result'];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                <?php elseif($main_question['question_type']==2):?>
                <div class="form-group">
                        <div class="col-xs-2 col-sm-2">
                            <input type="text" class="form-control sm" placeholder="分数" name="score">
                        </div>
                </div>
                <?php elseif($main_question['question_type']==3):?>
                      <label for="title" class="col-sm-2 control-label">跳转</label>
                        <div class="col-sm-10">
                            <select class="form-control" style="width: 100%;" id = "result_select">
                                <?php if($results !=false):?>
                                <?php foreach($results as $item): ?>
                                <option value='<?php echo $item['label'];?>' type="0"
                                ><?php echo '结论'.$item['label'].':'.$item['show_text_result'];?></option>
                                <?php endforeach;?>
                                <?php endif;?>

                                <?php if($sub_questions!=false):?>
                                <?php foreach($sub_questions as $item): ?>
                                <option value='<?php echo $item['label'];?>' type="1" ><?php echo '问题'.$item['label'].':'.$item['title'];?></option>
                                <?php endforeach;?>
                                <?php endif;?>

                            </select>
                        </div>

                <?php endif;?>


                
            </div>

                <?php endif;?>
                    <div class="form-group">
                    <label for="seo" class="col-sm-2 control-label"></label>
                    <div class="col-sm-10" style="margin-bottom:30px;">

                        <button type="submit" class="btn btn-success" ><i class="fa fa-save"></i>  保存</button>
                        <button type="button" class="btn btn-default" style="margin-left:20px" name="add_answer"> 增加选项</button>

                    </div>
                </div>

        </form>
        <!-- /.box-body -->
    </div>

<?php endif;?>
 <a href="<?php echo site_url('admin/question/sub/'.$main_question['id']);?>" class="btn btn-lg btn-block btn-info"  style="margin:20px 0;" ><i class="fa fa-plus"></i>  增加子问题</a>

<a href="<?php echo site_url('admin/question/main/'.$main_question['id']); ?>"  class="btn btn-lg btn-block btn-success"  style="margin:20px 0;"><i class="fa fa-chevron-left"></i>  返回主问题</a>
        </div>
           
        <!-- /.box-body -->
    </div>


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script type="text/javascript">
    var questionId =  <?php echo isset($question)?$question['id']:-1; ?>;
    var pid = <?php echo $main_question['id']; ?>;
    $(function(){
            var um = UM.getEditor('description');
            <?php if(isset($question)):?>
            um.setContent('<?php echo $question['description']; ?>',false,false);
            <?php endif;?>
            //创建问题
            $("form[name=create_question]").submit(function(){
                $.post("<?php echo site_url('admin/question/create_sub'); ?>",
                    {
                        title:$("#title").val(),
                        description:um.getContent(),
                        id:questionId,
                        pid:pid
                    },
                    function(data,status){
                        if(status==="success")
                        {
                            var res = eval("("+data+")");
                            questionId = res.data;
                            window.location.href =  "<?php echo site_url('admin/question/sub');?>" + "/"+pid+"/"+res.data;
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
                copyGroup.find("input[name=answer]").attr("answer_id","-1");
                copyGroup.find("span").html(label);
                copyGroup.insertAfter(lastGroup);
            });

            $("button[name=delete_answer]").click(function(){
                var id = $(this).attr("answer_id");
                $.post("<?php echo site_url('admin/answer/del');?>",
                        {id:id},
                    function(data,status){
                        if(status === "success")
                        {
                            var res = eval("("+data+")");
                            if(res.code==0)
                            {
                                $("#answer_"+id).remove();
                            }
                            else
                            {
                                alert('操作失败'+data);
                            }
                        }
                        else
                        {
                            alert('操作失败');
                        }

                });

            });

            //保存答案
            $("form[name=answer]").submit(function(){
                var answerData = [];
                $("div[name=answer_group]").each(function(index,obj){
                    var label = $(obj).find("input[name=answer]").attr("label");
                    var answer_id  = $(obj).find("input[name=answer]").attr("answer_id");
                    var answer_text = $(obj).find("input[name=answer]").val();
<?php if ($main_question['question_type'] == 1):?>
                    var option = $(obj).find("option:selected");
                    answerData.push({sub_question_id:questionId,label:label,answer_text:answer_text,jump_label:option.val(),id:answer_id,question_id:pid,jump_type:0});
<?php elseif ($main_question['question_type'] == 2):?>
                   var score = $(obj).find("input[name=score]").val();
                    answerData.push({sub_question_id:questionId,label:label,answer_text:answer_text,score:score,id:answer_id,question_id:pid});
<?php elseif ($main_question['question_type'] == 3):?>

                    var option = $(obj).find("option:selected");
                    answerData.push({sub_question_id:questionId,label:label,answer_text:answer_text,jump_label:option.val(),jump_type:option.attr("type"),id:answer_id,question_id:pid});
<?php endif;?>
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

        });
</script>
