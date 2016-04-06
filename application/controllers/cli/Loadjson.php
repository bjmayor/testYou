<?php

/**
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
 **/

class LoadJson extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->data['sites'] = array(array("type"=>0,"site"=>"http://www.aiwenchan.com/"));
        $this->load->model('question_model');
        $this->load->model('answer_model');
        $this->load->model('result_model');
        $this->load->model('meta_model');
    }

    public function load()
    {
	if(!is_cli())
	{
		return ;
	}
	for($i=1345;$i<1409;$i++)
	{
	
        	$json = fetchPage($i);

		if($json)
		{
			$error = NULL;
			if(!$this->loadStandardJson($json,$error))
			{
				var_dump($error);
			}
		}
	}
	
    }

    //导入标准的json数据
    private function loadStandardJson($data,&$error)
    {
        if($this->checkValid($data,$error))
        {
            $ret = json_decode($data);
            $meta_id =  $this->meta_model->insert_meta(
                $ret->question->title,
                $ret->question->description,
                $ret->question->seo_keyword 
            );
            if($meta_id==false)
            {
                $error = "创建seo属性失败";
                return false;
            }
            $img="";
            if($ret->question->img!='')
            {
                //do download img
                $fname = "question".time().".jpg";
                file_put_contents("upload/question/".$fname, file_get_contents($ret->question->img));
                $img = "question/".$fname;
            }
            $question_id = $this->question_model->insert_question(array(
                'title'=>$ret->question->title,
                'description'=>$ret->question->description,
                'img'=>$img,
                'question_category_id'=>1,
                'question_type'=>3,
                'publish_status'=>0,
                'meta_id'=>$meta_id
            ));
            if($question_id==false)
            {
                $error = "创建问题失败";
                return false; 
            }
            $label = 1;
            $pid = $question_id;
            //创建子问题
            foreach( $ret->question->sub_questions as $sub_question)
            {
                $question_id = $this->question_model->insert_question(array(
                    'title'=>$sub_question->title,
                    'description'=>'',
                    'label'=>$label,
                    'pid'=>$pid
                ));
                $label++;
                if ($question_id == false)
                {
                    $error = "子问题{".$sub_question->title . "}创建失败";
                    return false;
                }
                $answer_label  = 'a';
                //创建答案选项
                foreach ( $sub_question->answer as $answer)
                {
                    $jump_type = 0;
                    if(is_numeric($answer->next))
                    {
                        $jump_type = 1;
                    }
                    $answer_id =  $this->answer_model->insert_answer(array("sub_question_id"=>$question_id,
                                                                           "label"=>$answer_label,
                                                                           "answer_text"=>$answer->title,
                                                                           "jump_type"=>$jump_type,
                                                                           "question_id"=>$pid,
                                                                           "jump_label"=>strtolower($answer->next)));
                    $answer_label = chr(ord($answer_label)+1);
                    if ($answer_id == false)
                    {
                        $error = "答案{".$answer->title."}创建错误";
                        return false;
                    }
                }
                
            }
            $result_label="a";
            //创建结论
            foreach( $ret->question->results as $resultObj){
                $img="";
                if($resultObj->img!='')
                {
                    //do download img
                    $fname = "result".time(). "." . $result_label.".jpg";
                    file_put_contents("upload/result/".$fname, file_get_contents($resultObj->img));
                    $img = "result/".$fname;
                }
                $result = array(
                    "question_id"=>$pid,
                    "label"=>$result_label,
                    "show_text_result"=>$resultObj->title,
                    "show_html_result"=>$resultObj->description,
                    "show_img_result"=>$img);
                $result_id  = $this->result_model->insert_result($result);
                if($result_id == false)
                {
                    $error = "创建结论{".$resultObj->title."}失败";
                    return false; 
                }
                $result_label = chr(ord($result_label)+1);
            }
        }
        else
        {
            return  false;
        }
    }

    private function checkValid($data,&$error)
    {
        $ret = json_decode($data);
        if(!$ret)
        {
            $error = "json格式不合法";
            return false;
        }
        if(!property_exists($ret,'question'))
        {
            $error = "数据非法,question未设置";
            return false;
        }
        if(!property_exists($ret->question,'title')
            || !property_exists($ret->question,'description')
                || !property_exists($ret->question,'seo_keyword')
                    || !property_exists($ret->question,'img'))
        {
            $error = "question对象属性设置不正确";
            return false;
        }

        if(!property_exists($ret->question,'sub_questions'))
        {
            $error = "数据非法,sub_questions未设置";
            return false;
        }
        else if(!is_array($ret->question->sub_questions))
        {
            $error = "数据非法,sub_questions不是数组";
            return false;
        }
        if( !property_exists($ret->question,'results') )
        {
            $error = "数据非法,results未设置";
            return false;
        }
        else if(!is_array($ret->question->results))
        {
            $error = "数据非法,results不是数组";
            return false;
        }
        return true;

    }

}
function fetchPage($page_number)
{
    $page_results = array();
    $page_results['seo_keyword']='';
    $page_content = file_get_contents("http://www.aiwenchan.com/testapp2016/test1/".$page_number);
    if(strpos($page_content,"如果您的浏览器")!==false)
    {
        return;
    }
    if(preg_match("/<title>([^<]*)<\/title>/i", $page_content, $matches)){
        $page_results['title'] =  $matches[1];
    } else {
        print $page_number . ":title  was not found.";
        return;
    }
    if(preg_match("/<img class=\"show animated fadeInDownBig\" src=\"([^\"]*)\"/i", $page_content, $matches)){
        #    file_put_contents("./img/".md5($matches[1]),file_get_contents($matches[1]));
        $page_results['img'] = $matches[1];
    } else {
        print $page_number . ": A match was not found.";
        return;
    }
    if(preg_match("/transform: translate\(0px, 0px\) translateZ\(0px\);\"> <li>(.*)<\/li> <\/ul>/i", $page_content, $matches)){
        $page_results['description'] =  $matches[1];
    } else {
        print $page_number . ": description  was not found.";
        return;
    }

    if(preg_match("/xlist=eval\((\[[\S\s]*\])\)/m", $page_content, $matches)){
        $origin_list = (array)json_decode($matches[1],true);
        $page_results['sub_questions'] =  array();
        $page_results['results'] = array();
        $temp_result = array();
        foreach($origin_list as $item)
        {
            $result_page_url = "";
            $sub_question = array();
            $sub_question['img'] = $item['img'];
            $sub_question['title'] = $item['question'];
            $sub_question['answer'] = array();
            foreach($item['answer'] as $option)
            {

                $sub_question['answer'][] = $option;
                if(isset($option['weight']))
                {
                    return;
                }
                if(!is_numeric($option['next']))
                {
                    if(!isset($temp_result[$option['next']]))
                    {
                        if($result_page_url == "")
                        {
                            if(preg_match("/window.location.href='(.*)'\+level/i", $page_content, $matches))
                            {
                                $result_page_url = $matches[1];
                            }
                        }

                        $temp_result[$option['next']] = parse_result($result_page_url . $option['next'],$option['next']);
                        $page_results['results'][] = $temp_result[$option['next']];
                    }
                }
            }
            $page_results['sub_questions'][] = $sub_question;
        }
    } else {
        print $page_number . ": list  was not found.";
        return;
    }
    $page_results = array("question"=>$page_results);
    return json_encode($page_results,JSON_UNESCAPED_UNICODE);
//    file_put_contents("./page/question_".$page_number,json_encode($page_results,JSON_UNESCAPED_UNICODE));

}
//var_dump(parse_result("http://www.aiwenchan.com/testapp2016/test3203/1031?sv=B",'B'));
function parse_result($page_url,$label)
{
    $page_result_content = file_get_contents($page_url);
    $result = array();
    $result['label'] = $label;
    if(preg_match("/<div class=\"title\">([^<]*)<\/div>/i",$page_result_content,$matches))
    {
        $result['title'] = $matches[1];
    }
    if(preg_match("/<div id=\"divDes\" class=\"intro\">([^<]*)<\/div>/m",$page_result_content,$matches))
    {
        $result['description'] = $matches[1];
    }
    if(preg_match("/<img id=\"DetialImg\" src=\"([^\"]*)\"\/>/i",$page_result_content,$matches))
    {
        $result['img'] = $matches[1];
    }
    else
    {
        $result['img'] = '';
    }

    return $result;
}
?>

