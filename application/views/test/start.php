<!doctype html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php echo $meta['seo_title']; ?></title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description"
        content="<?php echo $meta['seo_description']; ?>">
        <meta name="keywords" content="<?php echo $meta['seo_keywords']; ?>">
        <link rel="stylesheet" href="<?php echo base_url($front_dir);?>/css/ceshi.css" type="text/css">
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
        <div class="current-title text-c"><div class="cut-title"><?php echo $main_question['title']; ?></div></div>
        </header>
        <section class="main-suc">
        <div class="test-two">
            <div class="number"><div class="num-bj"><?php echo $index+1; ?>/<?php echo $total; ?></div></div>
            <div class="questions"><?php echo $index+1; ?>、<?php echo $question['title']; ?></div>
        </div>
        <div class="invitation">
            <?php if($answers != false):?>
            <?php foreach($answers as $answer):?>
                <a class="answer" href="#" result="<?php echo $answer['result_label']; ?>" next_id="<?php echo isset($answer['next_question_label'])?$answer['next_question_label']:-1; ?>" answer_id="<?php echo $answer['id']; ?>"><?php echo $answer['answer_text'];?></a>
            <?php endforeach;?>
            <?php endif;?>
        </div> 
        </section>
<script>
var questionId =  <?php echo $main_question['id'];?>;
$(function(){
    $(".answer").click(function(){
        if($(this).attr('result')!=='')
        {
            window.location.href = "<?php echo site_url('test/result/');?>"+"/"+questionId+"/"+$(this).attr('result');
        }
        else if($(this).attr('next_id') != -1)
        {
            window.location.href = "<?php echo site_url('test/start/');?>"+"/"+questionId+"/"+$(this).attr('next_id');
        }
        else
        {
            window.location.href = "<?php echo site_url('test/start/');?>"+"/"+questionId+"/"+"<?php echo $index+1; ?>"+"/"+$(this).attr("answer_id");
        }
        return false;
    });
});
</script>
    </body>
</html>
