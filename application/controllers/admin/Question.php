<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Load :: Common */
        $this->load->helper('number');
        $this->load->model('admin/dashboard_model');
        $this->load->model('question_model');
        $this->load->model('meta_model');
        $this->load->model('answer_model');
        $this->load->model('result_model');
        $this->load->model('question_category_model');
        $this->data['question_type'] = array(array("id"=>1,"description"=>"单选题"),
                                    array("id"=>"2","description"=>"多选评分"),
                                     array("id"=>"3","description"=>"多选跳转"));
        $this->data['publish_status'] = array(array("id"=>-1,"description"=>"未发布"),
                                    array("id"=>0,"description"=>"发布"),
                                     array("id"=>1,"description"=>"删除"));

    }

    /*
     * 添加问题
     */
    public function main($question_id = -1)
    {
        if($question_id>0)
        {
            $this->data['question'] = $this->question_model->get_question(array('id'=>$question_id));
            $this->data['meta'] = $this->meta_model->get_meta($this->data['question']['id']);
            $this->data['results'] = $this->result_model->get_result(array('question_id'=>$question_id));
            $this->data['sub_questions'] = $this->question_model->get_question(array('pid'=>$question_id));
            if($this->data['sub_questions']!=false)
            {
                foreach($this->data['sub_questions'] as $key => $sub_question)
                {
                    $this->data["sub_questions"][$key]['answers'] = $this->answer_model->get_answer(array('sub_question_id'=>$sub_question['id']));
                }
            }

        }

        $this->data['category'] = $this->question_category_model->get_all();
        /* Load Template */
        $this->template->admin_render('admin/question/main', $this->data);

    }

    /*
     * 添加子问题
     */
    public function sub($question_id, $sub_question_id = -1)
    {
        if(!is_numeric($question_id))
        {
            echo "bad segment";
            return;
        }
        $this->data['main_question'] = $this->question_model->get_question(array("id"=>$question_id));
        if($sub_question_id != -1 && is_numeric($sub_question_id))
        {
            $this->data['question'] = $this->question_model->get_question(array('id'=>$sub_question_id));
            $this->data['answers'] = $this->answer_model->get_answer(array('sub_question_id'=>$sub_question_id));
            if($this->data['main_question']['question_type'] == '3')
            {
                $this->data['sub_questions'] = $this->question_model->get_question(array('pid'=>$question_id));
            }
        }
        $this->data['results'] = $this->result_model->get_result(array('question_id'=>$question_id));

        /* Load Template */
        $this->template->admin_render('admin/question/sub', $this->data);

    }

    public function single($question_id=-1)
    {
        if($question_id>0)
        {
            $this->data['question'] = $this->question_model->get_question(array('id'=>$question_id));
            $this->data['meta'] = $this->meta_model->get_meta($this->data['question']['id']);
            $this->data['answer'] = $this->answer_model->get_answer(array('question_id'=>$question_id));
            $this->data['results'] = $this->result_model->get_result(array('question_id'=>$question_id));
        }

        $this->data['category'] = $this->question_category_model->get_all();
        /* Load Template */
        $this->template->admin_render('admin/question/single', $this->data);
    }

    public function jump($question_id=-1)
    {
        if($question_id>0)
        {
            $this->data['question'] = $this->question_model->get_question(array('id'=>$question_id));
            $this->data['meta'] = $this->meta_model->get_meta($this->data['question']->id);
        }
        $this->data['category'] = $this->question_category_model->get_all();
        $this->template->admin_render('admin/question/jump', $this->data);
    }

    public function score($question_id=-1)
    {
        if($question_id>0)
        {
            $this->data['question'] = $this->question_model->get_question(array('id'=>$question_id));
            $this->data['meta'] = $this->meta_model->get_meta($this->data['question']->id);
        }

        $this->data['category'] = $this->question_category_model->get_all();
        $this->template->admin_render('admin/question/score', $this->data);
    }

    public function do_upload($dir='',$filename='userfile')
    {
        /* Conf */
        $config['upload_path']      = './upload/'.$dir;
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']         = 2048;
        $config['max_width']        = 1024;
        $config['max_height']       = 1024;
        $config['file_ext_tolower'] = TRUE;

        $this->load->library('upload', $config);

        /* Breadcrumbs */
        $this->breadcrumbs->unshift(2, lang('menu_files'), 'admin/files');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        if ( ! $this->upload->do_upload($filename))
        {
            Response::build(-1,'error',$this->upload->display_errors())->show();

        }
        else
        {
            /* Data */
            Response::build(0,'ok',$this->upload->data())->show();
        }
    }


    /***interface*/
    /*
     * 创建一个问题
     */
    public function create()
    {
        if (strlen($this->input->post('title'))==0)
        {
            Response::build(2,"标题不能为空")->show();
            return;
        }
        if (strlen($this->input->post('description'))==0)
        {
            Response::build(2,"描述不能为空")->show();
            return;
        }
        $seo_title = $this->input->post('seo_title');
        if(strlen($seo_title) == 0)
        {
            $seo_title = $this->input->post('title');
        }
        $seo_description = $this->input->post('seo_description');
        if(strlen($seo_description) == 0)
        {
            $seo_description = $this->input->post('text_description');
        }

        //编辑功能
        if($this->input->post('id')!='-1')
        {
            $question = $this->question_model->get_question(array('id'=>$this->input->post('id')));
            $this->meta_model->update_meta($seo_title,$seo_description,$question['id']);
            $this->question_model->update_question(array(
                'title'=>$this->input->post('title'),
                'description'=>$this->input->post('description'),
                'img'=>$this->input->post('img'),
                'question_category_id'=>$this->input->post('question_category_id'),
                'question_type'=>$this->input->post('question_type'),
                'id'=>$question['id'],
                'publish_status'=>$this->input->post('publish_status'),
            ));

            Response::build(0,"ok",$this->input->post('id'))->show();
        }
        else//新建
        {
            $meta_id =  $this->meta_model->insert_meta(
                $seo_title,
                $seo_description,
                $this->input->post('seo_keywords') 
            );

            $question_id = $this->question_model->insert_question(array(
                'title'=>$this->input->post('title'),
                'description'=>$this->input->post('description'),
                'img'=>$this->input->post('img'),
                'question_category_id'=>$this->input->post('question_category_id'),
                'question_type'=>$this->input->post('question_type'),
                'publish_status'=>$this->input->post('publish_status'),
                'meta_id'=>$meta_id
            ));
            if ($question_id > 0)
            {
                Response::build(0,"ok",$question_id)->show();
            }
            else
            {
                Response::build(1,"error","问题创建失败")->show();
            }
        }


    }

 /*
     * 创建一个问题
     */
    public function create_sub()
    {
        if (strlen($this->input->post('title'))==0)
        {
            Response::build(2,"标题不能为空")->show();
            return;
        }

        //编辑功能
        if($this->input->post('id')!='-1')
        {
            $ret = true;
            $question = $this->question_model->get_question(array('id'=>$this->input->post('id')));
            if ($question['title'] != $this->input->post['title'] || $question['description'] != $this->input->post['description'])
            {
                $ret = $this->question_model->update_question(array(
                    'title'=>$this->input->post('title'),
                    'description'=>$this->input->post('description'),
                    'id'=>$this->input->post('id'),
                    'pid'=>$this->input->post('pid')
                ));
            }
            if($ret)
            {
                Response::build(0,"ok",$this->input->post('id'))->show();
            }
            else
            {
                Response::build(-1,"更新错误",$this->input->post('id'))->show();
            }
        }
        else//新建
        {
            
            $last_question = $this->question_model->get_question(array("pid"=>$this->input->post('pid'),"sort_direction"=>"desc","sort_by"=>"label","limit"=>1));
            $label = 1;
            if($last_question && $last_question[0]['label']>0)
            {
                $label = $last_question[0]['label']+1;
            }
            $question_id = $this->question_model->insert_question(array(
                'title'=>$this->input->post('title'),
                'description'=>$this->input->post('description'),
                'label'=>$label,
                'pid'=>$this->input->post('pid')
            ));
            if ($question_id > 0)
            {
                Response::build(0,"ok",$question_id)->show();
            }
            else
            {
                Response::build(1,"error","问题创建失败")->show();
            }
        }


    }


    public function del()
    {
        $ret = $this->question_model->delete_question(array("id"=>$this->input->post('id')));
        if( $ret>0)
        {
            $this->answer_model->delete_answer(array("sub_question_id"=>$this->input->post('id')));
            Response::build(0,"ok","删除成功")->show();
        }
        else
        {
            Response::build(-1,"删除失败")->show();
        }
    }
}
