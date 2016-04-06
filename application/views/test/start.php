<!doctype html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php echo $question['title']; ?>-小角落</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="keywords" content="<?php echo $meta['seo_keywords']; ?>">
        <meta property="og:title" content="<?php echo $question['title']; ?>" />
        <meta property="og:image" content="<?php echo base_url('upload').'/'.($question['img']!=''?$question['img']:'question_default.png');?>" />
        <?php if(isset($description) && $description!=''):?>
        <meta property="og:description" content="<?php echo $description;  ?>"/> 
        <?php endif;?>
        <link rel="stylesheet" href="<?php echo base_url($front_dir);?>/css/ceshi.css" type="text/css">
        <link href="http://cdn.bootcss.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
        <script type="text/javascript" charset="utf-8" src="<?php echo base_url($front_dir);?>/js/zepto.min.js"></script>
        <script>
        var _hmt = _hmt || [];
        (function() {
          var hm = document.createElement("script");
          hm.src = "//hm.baidu.com/hm.js?b15398beb95544617ef34fcf662db27b";
          var s = document.getElementsByTagName("script")[0]; 
          s.parentNode.insertBefore(hm, s);
        })();
        </script>
    </head>

    <body>
        <header class="headcity">
        <div class="current-title text-c"><div class="cut-title"><a href="/"><i class="fa fa-home" style="color:white;position: absolute;top:8px;left:10px;font-size:30px;"></i></a><?php echo $main_question['title']; ?></div></div>
        </header>
        <section class="main-suc">
        <div class="test-two">
            <div class="number" <?php if($main_question['question_type']==1):?>style="height:25px"<?php endif;?>>
        <?php if($main_question['question_type']!=1):?>
        <div class="num-bj"><?php echo $index+1; ?>/<?php echo $total; ?></div>
        <?php endif;?>
    </div>
            <div class="questions"><?php echo $question['title']; ?></div>
        </div>
        <div class="invitation">
            <?php if($answers != false):?>
            <?php foreach($answers as $answer):?>
                <a class="answer" href="#" jump_label="<?php echo $answer['jump_label']; ?>" jump_type="<?php echo isset($answer['jump_type'])?$answer['jump_type']:-1; ?>" answer_id="<?php echo $answer['id']; ?>"><?php echo $answer['answer_text'];?></a>
            <?php endforeach;?>
            <?php endif;?>
        </div>
        
        <div class="native_gg">
            <script type="text/javascript">
            var cpro_id="u2553377";
            (window["cproStyleApi"] = window["cproStyleApi"] || {})[cpro_id]={at:"3",pat:"15",tn:"template_inlay_all_mobile_lu_native",rss1:"#FFFFFF",titFF:"%E5%BE%AE%E8%BD%AF%E9%9B%85%E9%BB%91",titFS:"14",rss2:"#000000",ptFS:"16",ptFC:"#000000",ptFF:"%E5%BE%AE%E8%BD%AF%E9%9B%85%E9%BB%91",ptFW:"1",conpl:"0",conpr:"1",conpt:"0",conpb:"0",cpro_h:"360",ptn:"6",ptp:"0",itecpl:"10",piw:"0",pih:"0",ptDesc:"0",ptLogo:"0"}
            </script>
            <script src="http://cpro.baidustatic.com/cpro/ui/cm.js" type="text/javascript"></script>
        </div>
       <!--  <div class="gg">
            <script type="text/javascript">
            /*测试子问题v1-选项下方-非原生*/
            var cpro_id = "u2516179";
            </script>
            <script src="http://cpro.baidustatic.com/cpro/ui/cm.js" type="text/javascript"></script>
        </div> -->
        </section>
<script>
var questionId =  <?php echo $main_question['id'];?>;
$(function(){
    $(".answer").click(function(){
        if($(this).attr('jump_label') != '' )
        {
            if($(this).attr("jump_type")=="1")
            {
                window.location.href = "<?php echo site_url('test/jump/');?>"+"/"+questionId+"/"+$(this).attr('jump_label');
            }
            else
            {
                window.location.href = "<?php echo site_url('test/result/');?>"+"/"+questionId+"/"+$(this).attr('jump_label');
            }
        }
        else
        {
            window.location.href = "<?php echo site_url('test/score/');?>"+"/"+questionId+"/"+"<?php echo $index+1; ?>"+"/"+$(this).attr("answer_id");
        }
        return false;
    });
});
</script>
    </body>
</html>
