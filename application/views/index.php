<!doctype html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="renderer" content="webkit">
        <title><?php echo $title;?></title>
        <?php if(isset($description) && $description!=''):?>
        <meta name="description" content="<?php echo $description; ?>" />
        <?php endif;?>
        <meta name="keywords" content="<?php echo $keywords; ?>" />
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="<?php echo base_url($front_dir . '/css/ceshi.css'); ?>">
        <script src="http://cdn.bootcss.com/jquery/1.12.0/jquery.min.js"></script>
        <script src="<?php echo base_url($front_dir . '/js/imgLiquid-min.js'); ?>"></script>

        <link rel="shortcut icon" href="favicon.ico">
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
        <section class="main">
        <nav class="navmeun">
        <div class="navevery" category_id="1"><i class="icon navicon chara"></i><a href="#">性格</a></div>
        <div class="navevery" category_id="2"><i class="icon navicon lover"></i><a href="#">爱情</a></div>
        <div class="navevery" category_id="3"><i class="icon navicon social"></i><a href="#">社交</a></div>
        <div class="navevery" category_id="4"><i class="icon navicon wealth"></i><a href="#">财富</a></div>
        <div class="navevery" category_id="5"><i class="icon navicon job"></i><a href="#">职场</a></div>
        <div class="navevery" category_id="6"><i class="icon navicon interest"></i><a href="#">趣味</a></div>
        <div class="navevery" category_id="7"><i class="icon navicon ability"></i><a href="#">能力</a></div>
        <div class="navevery" category_id="8"><i class="icon navicon iq"></i><a href="#">智商</a></div>
        <div class="navevery" category_id="9"><i class="icon navicon colligate"></i><a href="#">综合</a></div>
        </nav>
        <div class="gg" style="margin-left:-10px">
            <script type="text/javascript">
            var cpro_id="u2516184";
            (window["cproStyleApi"] = window["cproStyleApi"] || {})[cpro_id]={at:"3",hn:"0",wn:"0",imgRatio:"1.7",scale:"20.8",pat:"6",tn:"template_inlay_all_mobile_lu_native",rss1:"#f5f5f5",adp:"1",ptt:"0",titFF:"%E5%BE%AE%E8%BD%AF%E9%9B%85%E9%BB%91",titFS:"14",rss2:"#000000",titSU:"0",ptbg:"70",ptp:"0"}
            </script>
            <script src="http://cpro.baidustatic.com/cpro/ui/cm.js" type="text/javascript"></script>
        </div>
        <ul class="screen">
            <li class="<?php if($type==0):?>current-l<?php else:?>none<?php endif;?>"><a href="<?php echo site_url('home/index/0');?>">最新<i class="icon icon-b"></i></a></li>
            <li <?php if($type==1):?>class="current-c"<?php endif;?>><a href="<?php echo site_url('home/index/1');?>">排行<i class="icon icon-b"></i></a></li>
            <li class="<?php if($type==2):?>current-r<?php else:?>none<?php endif;?>"><a href="<?php echo site_url('home/index/2');?>">精品<i class="icon icon-b"></i></a></li>
        </ul>
        <ul class="cont">
            <?php if($questions!=false):?>
            <?php foreach($questions as $question):?>
            <li><a href="<?php echo site_url('test/index/'.$question['id']);?>"><div class="pros"><div class="pic"><img src="<?php echo $question['img']!=''?site_url('upload/'.$question['img']):site_url('upload/question_default.png');?>"></div><div class="b_cont"><div class="texts"><?php echo $question['title'];?></div><div class="star-popu"><span class="star"><i class="icon star-s"></i><i class="icon star-s"></i><i class="icon star-s"></i><i class="icon star-s"></i><i class="icon star-s"></i></span><span class="popu">人气：<?php echo $question['visit_count']; ?></span><span class="getinto"><i class="icon into"></i></span></div></div></div></a></li>
            <?php endforeach;?>
            <?php endif;?>

        </ul>
        <?php if($page_total>1):?>
            <?php if($page==1):?>
                <div class="pages"><a class="buts" href="<?php echo site_url('home/index/'.$type.'/'.($page+1));?>">下一页</a></div>    
            <?php elseif($page==$page_total):?>
                    <div class="pages"><a class="buts" href="<?php echo site_url('home/index/'.$type.'/'.($page-1));?>">上一页</a></div>    
            <?php else:?>
                    <div class="pages"><a class="buts-last" href="<?php echo site_url('home/index/'.$type.'/'.($page-1));?>">上一页</a><a class="buts-next" href="<?php echo site_url('home/index/'.$type.'/'.($page+1));?>">下一页</a></div>
            <?php endif;?>
        <?php endif;?>
        <div class="gg" style="margin-left:-10px;">
        <script type="text/javascript">
        /*测试v1-首页翻页下方-非原生*/
        var cpro_id = "u2516186";
        </script>
        <script src="http://cpro.baidustatic.com/cpro/ui/cm.js" type="text/javascript"></script>

        </div>

        </section>
    </body>
    <script type="text/javascript">
        document.body.addEventListener('touchstart',function(){});  
        $(function()
            {
                $("div.navevery").click(function(){
                    window.location.href="<?php echo site_url('home/top').'/'; ?>"+$(this).attr("category_id");
                });
            }
        );
    </script>
</html>
