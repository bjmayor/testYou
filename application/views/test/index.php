<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>test</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url($front_dir);?>/css/ceshi.css" type="text/css">
</head>

<body>
<header class="headcity">
<span class="retn"><i class="icon return"></i></span><div class="current-title text-l"><?php echo $question->title; ?></div>
</header>
<section class="main-suc">
	<div class="test-pic">
    <img src="<?php echo base_url($front_dir);?>/images/img.jpg">
    </div>
    <div class="pad"><?php echo $question->description;  ?></div>
    <div class="invitation"><a class="friend" href="<?php echo base_url('test/start/'.$question->id);?>">开始测试</a></div>	
</section>
</body>
</html>
