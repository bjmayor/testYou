<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>test</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url($front_dir);?>/css/ceshi.css" type="text/css">
<script type="text/javascript" charset="utf-8" src="<?php echo base_url($front_dir);?>/js/zepto.min.js"></script>
</head>

<body>
<header class="headcity">
<span class="retn"><i class="icon return"></i></span><div class="current-title text-l"><?php echo $question['title']; ?></div>
</header>
<section class="main-suc">
	<div class="test-pic">
    <img src="<?php echo base_url('upload').'/'.($question['img']!=''?$question['img']:'question_default.png');?>">
    </div>
    <div class="pad"><?php echo $question['description'];  ?></div>
    <div class="invitation"><a class="friend" href="<?php echo base_url('test/start/'.$question['id']);?>">开始测试</a></div>	
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
