  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        数据自动导入
      </h1>
     <!--  <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 后台首页</a></li>
        <li class="active">添加多选评分题</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box box-default" id="basicQuestion">
        
          <div class="box-body">
    <?php if(!isset($error_msg) || $error_msg==''):?>
      <div class="callout callout-success">
        <h4>导入成功</h4>
      </div>
    <?php else:?> 
      <div class="callout callout-warning">
      <h4><?=$error_msg?></h4>
      </div>
    <?php endif;?>
           <form class="form-horizontal" method="post" action="load">
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">网站</label>

                  <div class="col-sm-10">
                    <select name="site_type">
                    <?php foreach($sites as $site):?>
                    <option value="<?=$site['type']?>"><?=$site['site']?></option>
                    <?php endforeach;?>
                    </select>
                  </div>
                </div>

                 <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">json数据</label>

                  <div class="col-sm-10">
                        <textarea rows="10" cols="80" name="data" >
{"question":{
   
   "title":"自动导入标题",
   "description":"自动导入描述",
   "seo_keyword":"",
   "img":"",
   "sub_questions":
   [
   {
   "img": "",
   "title": "很久以前，有一位公主看似生活的幸福，可她并不快乐。你觉得是为什么？",
   "answer": [
   {
   "title": "每天重复同样的事没有新鲜感",
   "next": "2"
   },
   {
   "title": "白马王子还未出现",
   "next": "3"
   }
   ]
   },
   {
   "img": "",
   "title": "某天公主悄悄地溜出皇宫，遇上了心仪的男生你猜他属于哪个类型？",
   "answer": [
   {
   "title": "像古天乐一样又帅又野性",
   "next": "4"
   },
   {
   "title": "像李易峰一样很标致很乖",
   "next": "3"
   }
   ]
   },
   {
   "img": "",
   "title": "其实那男生是邻国的王子，公主得知后心情会怎样？",
   "answer": [
   {
   "title": "太好了，我们真是天生一对！",
   "next": "a"
   },
   {
   "title": "无聊，我嫁给他之后又要过着昔日的沉闷生活",
   "next": "b"
   }
   ]
   },
   {
   "img": "",
   "title": "公主和王子终于可以步入教堂，你猜他们在婚礼后，第一件事是去做什么？",
   "answer": [
   {
   "title": "在城堡中的庭园悠闲地品茶",
   "next": "b"
   },
   {
   "title": "两人细谈将来的梦想",
   "next": "c"
   }
   ]
   }
   ],
   "results":[
   {"label":"A","title":"结论a","description":"结论a描述","img":""},
   {"label":"B","title":"结论b","description":"结论b描述","img":""},
   {"label":"C","title":"结论c","description":"结论c描述","img":""}
   ]
   }} 
                        </textarea>
                  </div>
                </div>

 

              <button type="submit" class="btn btn-lg btn-block btn-success"  style="margin:20px 0;"><i class="fa fa-rocket"></i>  提交</button>
              <!-- /.box-body -->
            </form>
          </div>
          <!-- /.box-body -->
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
