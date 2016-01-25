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
        <img src="<?php echo site_url();?>/upload/<?php echo $result['show_img_result']; ?>">
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
/*
//微信分享
var imgUrl = 'http://static.huangjinqianbao.com/static/img/weixin/giftThumb.png';
var lineLink = location.href;
var descContent = "我抢到了黄金钱包派送的金子，快跟上我的脚步！";
var shareTitle = '有金同享，有壕同当！有金不抢吗，更待何时？';
var appid = '${appid}';

wx.config({
    debug: ${isDebug}, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
    appId: appid, // 必填，公众号的唯一标识
    timestamp: '${timestamp}', // 必填，生成签名的时间戳
    nonceStr: '${noncestr}', // 必填，生成签名的随机串
    signature: '${signature}',// 必填，签名，见附录1
    jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
});

wx.ready(function() {
    // config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready函数中。
    wx.onMenuShareTimeline({
        title: shareTitle, // 分享标题
        desc: descContent, // 分享描述(不确定)
        link: lineLink, // 分享链接
        imgUrl: imgUrl, // 分享图标
        success: function (res) {
            // 用户确认分享后执行的回调函数
        },
        cancel: function () {
            // 用户取消分享后执行的回调函数
        }
    });
    wx.onMenuShareAppMessage({
        title: shareTitle, // 分享标题
        desc: descContent, // 分享描述
        link: lineLink, // 分享链接
        imgUrl: imgUrl, // 分享图标
        type: 'link', // 分享类型,music、video或link，不填默认为link
        dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
        success: function () { 
            // 用户确认分享后执行的回调函数
        },
        cancel: function () { 
            // 用户取消分享后执行的回调函数
        }
    });
});
*/
</script>
    </body>
</html>
