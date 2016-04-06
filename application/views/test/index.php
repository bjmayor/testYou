<!doctype html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title><?php echo $question['title']; ?>-小角落</title>
<meta property="og:title" content="<?php echo $question['title']; ?>" />
<meta property="og:image" content="<?php echo base_url('upload').'/'.($question['img']!=''?$question['img']:'question_default.png');?>" />
<?php if(isset($description) && $description!=''):?>
<meta property="og:description" content="<?php echo $description;  ?>"/> 
<?php endif;?>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url($front_dir);?>/css/ceshi.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url($front_dir);?>/css/animate.css" type="text/css">
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
<!-- <header class="headcity">
<span class="retn"><i class="icon return"></i></span><div class="current-title text-c"><?php echo $question['title']; ?></div>
</header> -->
<section class="main-suc">
	<div class="test-pic">
	    <img src="<?php echo base_url('upload').'/'.($question['img']!=''?$question['img']:'question_default.png');?>">
	    <div class="vcenter animated bounce"><h1><?php echo $question['title']; ?></h1></div>
  </div>
    <div class="pad"><?php echo $question['description'];  ?></div>
    <div class="invitation"><a class="friend" href="<?php echo base_url('test/start/'.$question['id']);?>">开始测试</a></div>	
    <div class="native_gg">
      <script type="text/javascript">
      var cpro_id="u2553428";
      (window["cproStyleApi"] = window["cproStyleApi"] || {})[cpro_id]={at:"3",hn:"0",wn:"0",imgRatio:"1.7",scale:"20.20",pat:"6",tn:"template_inlay_all_mobile_lu_native",rss1:"#FFFFFF",adp:"1",ptt:"0",titFF:"%E5%BE%AE%E8%BD%AF%E9%9B%85%E9%BB%91",titFS:"14",rss2:"#FFFFFF",titSU:"0",ptbg:"70",ptp:"1"}
      </script>
      <script src="http://cpro.baidustatic.com/cpro/ui/cm.js" type="text/javascript"></script>
    </div>
    <div class="gg">
      <script type="text/javascript">
      /*测试首页v1-测试按钮下方-非原生*/
      var cpro_id = "u2516171";
      </script>
      <script src="http://cpro.baidustatic.com/cpro/ui/cm.js" type="text/javascript"></script>
    </div>
</section>
<script type="text/javascript">
$(function(){
    $(".retn").click(function(){
        history.go(-1);
    });
});
</script>

</body>
</html>
