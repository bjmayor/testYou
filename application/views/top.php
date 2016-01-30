<!doctype html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php echo $title;?></title>
        <?php if(isset($description) && $description!=''):?>
        <meta name="description" content="<?php echo $description; ?>" />
        <?php endif;?>
        <meta name="keywords" content="<?php echo $keywords; ?>" />
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="<?php echo base_url($front_dir);?>/css/ceshi.css" type="text/css">
        <script type="text/javascript" charset="utf-8" src="<?php echo base_url($front_dir);?>/js/zepto.min.js"></script>
        <script src="http://cdn.bootcss.com/jquery/1.12.0/jquery.min.js"></script>
        <script src="<?php echo base_url($front_dir . '/js/imgLiquid-min.js'); ?>"></script>
        <script>
        var _hmt = _hmt || [];
        (function() {
          var hm = document.createElement("script");
          hm.src = "//hm.baidu.com/hm.js?b15398beb95544617ef34fcf662db27b";
          var s = document.getElementsByTagName("script")[0]; 
          s.parentNode.insertBefore(hm, s);
        })();
        </script>
        <script type="text/javascript">
        $(function() {
            $(".pic").imgLiquid({fill:true});
        });
        </script>
    </head>

    <body>
        <header class="headcity">
        <div class="current-list text-c"><?php echo $category['description']; ?>测试</div>
        </header>
        <section class="main">
        <ul class="screen" style="margin-top:10px;">
            <li class="<?php if($type==0):?>current-l<?php else: ?>none<?php endif;?>"><a href="<?php echo site_url('home/top/'.$category['id'].'/0/'.$page);?>">最新<i class="icon icon-b"></i></a></li>
            <li <?php if($type==1):?>class="current-c"<?php endif;?>><a href="<?php echo site_url('home/top/'.$category['id'].'/1/'.$page);?>">排行<i class="icon icon-b"></i></a></li>
            <li class="<?php if($type==2):?>current-r<?php else:?>none<?php endif;?>"><a href="<?php echo site_url('home/top/'.$category['id'].'/2/'.$page);?>">精品<i class="icon icon-b"></i></a></li>
        </ul>
        <ul class="cont">
            <?php if($questions!=false):?>
            <?php foreach($questions as $question):?>
            <li><a href="<?php echo site_url('test/index/'.$question['id']);?>"><div class="pros"><div class="pic"><img src="<?php echo base_url('upload/'.($question['img']!=''?$question['img']:'question_default.png'));?>"></div><div class="b_cont"><div class="texts"><?php echo $question['title'];?></div><div class="star-popu"><span class="star"><i class="icon star-s"></i><i class="icon star-s"></i><i class="icon star-s"></i><i class="icon star-s"></i><i class="icon star-s"></i></span><span class="popu">人气：<?php echo $question['visit_count']; ?></span><span class="getinto"><i class="icon into"></i></span></div></div></div></a></li>
            <?php endforeach;?>
            <?php endif;?>
        </ul>
        <?php if($page_total>1):?>
            <?php if($page==1):?>
                <div class="pages"><a class="buts" href="<?php echo site_url('home/top/'.$category['id'].'/'.$type.'/'.($page+1));?>">下一页</a></div>    
            <?php elseif($page==$page_total):?>
                    <div class="pages"><a class="buts" href="<?php echo site_url('home/top/'.$category['id'].'/'.$type.'/'.($page-1));?>">上一页</a></div>    
            <?php else:?>
                    <div class="pages"><a class="buts-last" href="<?php echo site_url('home/top/'.$category['id'].'/'.$type.'/'.($page-1));?>">上一页</a><a class="buts-next" href="<?php echo site_url('home/top/'.$category['id'].'/'.$type.'/'.($page+1));?>">下一页</a></div>
            <?php endif;?>
        <?php endif;?>
        </section>

<script type="text/javascript">
$(function(){
    $(".retn").click(function(){
        history.go(-1);
    });
});
document.body.addEventListener('touchstart', function (){});  
</script>
    </body>
</html>
