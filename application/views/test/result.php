<!doctype html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>我的<?php echo $result['show_text_result']."-".$question['title']; ?></title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta property="og:title" content="<?php echo $question['title']; ?>" />
        <meta property="og:image" content="<?php echo base_url('upload').'/'.($question['img']!=''?$question['img']:'question_default.png');?>" />
        <?php if(isset($description) && $description!=''):?>
        <meta property="og:description" content="<?php echo $meta['seo_description']; ?>"/> 
        <?php endif;?>
        <link rel="stylesheet" href="<?php echo base_url($front_dir);?>/css/ceshi.css" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url($front_dir);?>/css/animate.css" type="text/css">
        <link href="http://cdn.bootcss.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
        <script type="text/javascript" charset="utf-8" src="<?php echo base_url($front_dir);?>/js/zepto.js"></script>
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
        document.body.addEventListener('touchstart', function (){});  
        </script>
    </head>

    <body>
        <header class="headcity">
        <div class="current-title text-c"><a href="/"><i class="fa fa-home" style="color:white;position: absolute;top:8px;left:10px;font-size:30px;"></i></a><?php echo $question['title']; ?></div>
        </header>
        <section class="main-suc">
        <div class="succes-pic">
        <img class="animated zoomIn" src="<?php echo site_url();?>/upload/<?php echo $result['show_img_result']!=''?$result['show_img_result']:'result_default.png'; ?>">
        </div>
        <div class="cont-text">
            <div class="title-s"><?php echo $result['show_text_result']; ?></div>
            <div class="test">
                <?php echo $result["show_html_result"];?>
            </div>

            <div class="invitation">

            <a class="share" onClick="_system._guide(true)">邀请好友测试</a>
            <a class="default" href="<?php echo base_url('test/start/'.$question['id']);?>">我也要测</a>
            </div>    
        </div>

        <div class="gg"><script type="text/javascript">
        /*小角落-测试结果v1-我也要测与推荐之间-原生*/
        var cpro_id = "u2553347";
        </script>
        <script src="http://cpro.baidustatic.com/cpro/ui/cm.js" type="text/javascript"></script>
        </div> 
        
        <div class="everybody"><span class="left"><strong>大家都在测试</strong></span><span class="right"><a class="rig-i" href="void(0);" id="refresh">换一批<i class="icon change"></i></a></span></div>  
        <ul class="news" style="display:block;">
        </ul>



        <div class="gg">
          <script type="text/javascript">
          var cpro_id="u2553431";
          (window["cproStyleApi"] = window["cproStyleApi"] || {})[cpro_id]={at:"3",pat:"15",tn:"template_inlay_all_mobile_lu_native",rss1:"#FFFFFF",titFF:"%E5%BE%AE%E8%BD%AF%E9%9B%85%E9%BB%91",titFS:"14",rss2:"#000000",ptFS:"16",ptFC:"#000000",ptFF:"%E5%BE%AE%E8%BD%AF%E9%9B%85%E9%BB%91",ptFW:"1",conpl:"0",conpr:"1",conpt:"0",conpb:"0",cpro_h:"480",ptn:"8",ptp:"0",itecpl:"10",piw:"0",pih:"0",ptDesc:"0",ptLogo:"0"}
          </script>
          <script src="http://cpro.baidustatic.com/cpro/ui/cm.js" type="text/javascript"></script>
        </div>

        <div class="gg">
              <script type="text/javascript">
              /*测试结果v1-再测一次按钮下方-非原生*/
              var cpro_id = "u2516181";
              </script>
              <script src="http://cpro.baidustatic.com/cpro/ui/cm.js" type="text/javascript"></script>
        </div>


        </section>
<div id="cover"></div>
<div id="guide"><img src="<?php echo base_url($front_dir);?>/images/shareto.png" width="278" height="198"></div> 
<script type="text/javascript">

    var _system={

        $:function(id){return document.getElementById(id);},

   _client:function(){

      return {w:document.documentElement.scrollWidth,h:document.documentElement.scrollHeight,bw:document.documentElement.clientWidth,bh:document.documentElement.clientHeight};

   },

   _scroll:function(){

      return {x:document.documentElement.scrollLeft?document.documentElement.scrollLeft:document.body.scrollLeft,y:document.documentElement.scrollTop?document.documentElement.scrollTop:document.body.scrollTop};

   },

   _cover:function(show){

      if(show){

     this.$("cover").style.display="block";

     this.$("cover").style.width=(this._client().bw>this._client().w?this._client().bw:this._client().w)+"px";

     this.$("cover").style.height=(this._client().bh>this._client().h?this._client().bh:this._client().h)+"px";

  }else{

     this.$("cover").style.display="none";

  }

   },

   _guide:function(click){

      this._cover(true);

      this.$("guide").style.display="block";

      this.$("guide").style.top=(_system._scroll().y+5)+"px";

      window.onresize=function(){_system._cover(true);_system.$("guide").style.top=(_system._scroll().y+5)+"px";};

  if(click){_system.$("cover").onclick=function(){

         _system._cover();

         _system.$("guide").style.display="none";

 _system.$("cover").onclick=null;

 window.onresize=null;

  };}

   },

   _zero:function(n){

      return n<0?0:n;

   }

}

</script>
<script type="text/javascript">
var categoryId = <?php echo $question['question_category_id']; ?>;

function loadList()
{
    $.get("<?php echo site_url('question/interest');?>"+"/"+categoryId,function(data,status){
        var result  = eval('('+data+')');
        $.each(result.data,function(index,item){
            $(".news").append('<li><a href="'+"<?php echo site_url('test/index/');?>"+"/"+item.id+'"><div class="nerong">'+item.title+'<i class="icon enter"></i></div></a></li>');
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
