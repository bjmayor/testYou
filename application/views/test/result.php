<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>test</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="<?php echo base_url($front_dir);?>/css/ceshi.css" type="text/css">
        <script type="text/javascript" charset="utf-8" src="<?php echo base_url($front_dir);?>/js/zepto.js"></script>
    </head>

    <body>
        <header class="headcity">
        <span class="retn"><i class="icon return"></i></span><div class="current-title text-l"><?php echo $question['title']; ?></div>
        </header>
        <section class="main-suc">
        <div class="succes-pic">
        <img src="<?php echo site_url();?>/result/"<?php echo $result['show_img_result']; ?>>
        </div>
        <div class="cont-text">
            <div class="title-s"><?php echo $result['show_text_result']; ?></div>
            <div class="test">
                <?php echo $result["show_html_result"];?>
            </div>
            <div class="invitation"><a class="friend" href="#">邀请好友测试</a></div>   
        </div>
        <div class="everybody"><span class="left"><strong>大家都在测试</strong></span><span class="right"><a class="rig-i" href="#" id="refresh">换一批<i class="icon change"></i></a></span></div>  
        <ul class="news" style="display:block;">
        </ul>

        </section>
<script type="text/javascript">
var categoryId = <?php echo $question['question_category_id']; ?>;

function loadList()
{
    $.get("<?php echo site_url('question/interest');?>"+"/"+categoryId,function(data,status){
        var result  = eval('('+data+')');
        $.each(result.data,function(index,item){
            $(".news").append('<li><a href="'+"<?php echo site_url('test/start/');?>"+"/"+item.id+'"><div class="nerong">'+item.title+'<i class="icon enter"></i></div></a></li>');
        });
    });

}
$(function(){
    loadList();
    $("#refresh").click(function(){
        $(".news").html("");
        loadList();
        return false;
    });
    $(".retn").click(function(){
        history.go(-1);
    });
});
</script>
    </body>
</html>
