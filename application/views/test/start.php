<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php echo $meta['seo_title']; ?></title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description"
        content="<?php echo $meta['seo_description']; ?>">
        <meta name="keywords" content="<?php echo $meta['seo_keywords']; ?>">
        <link rel="stylesheet" href="<?php echo base_url($front_dir);?>/css/ceshi.css" type="text/css">
    </head>

    <body>
        <header class="headcity">
        <div class="current-title text-c"><?php echo $question['title']; ?></div>
        </header>
        <section class="main-suc">
        <?php if ($main_question['question_type']==2):?>
        <div class="test-two">
            <div class="number"><div class="num-bj"><?php echo $index; ?>/<?php echo $total; ?></div></div>
            <div class="questions"><?php echo $index; ?>、<?php echo $question['title']; ?></div>
        </div>
        <?php endif;?>
        <div class="invitation">
            <?php if($answer != false):?>
            <?php foreach($answer as $item):?>
                <a class="answer" href="#" result="<?php echo $item['result_label']; ?>" next_id="<?php echo isset($item['next_question_id'])?$item['next_question_id']:-1; ?>" score="<?php echo $item['score']; ?>"><?php echo $item['answer_text'];?></a>
            <?php endforeach;?>
            <?php endif;?>
        </div> 
        </section>
<script>
var question_id =  <?php echo $main_question['id'];?>;
$(function(){
    $(".answer").click(function(){
        if($(this).attr('result')!=='')
        {
            window.location.href = "test/result/"+question_id+"/".$(this).attr('result');
        }
        return false;
    });
});
</script>
    </body>
</html>
