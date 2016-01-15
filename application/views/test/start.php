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
    <div class="current-title text-c"><?php echo $question->title; ?></div>
</header>
<section class="main-suc">
    <div class="test-two">
        <div class="number"><div class="num-bj">1/12</div></div>
        <div class="questions">1、你喜欢什么水果？</div>
    </div>
    <div class="invitation"><a class="answer" href="#">苹果</a><a class="answer" href="#">草莓</a><a class="answer" href="#">橘子</a></div> 
</section>
</body>
</html>
