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
        $this->load->model('question_category_model');
    }

    public function single($question_id=-1)
    {
        if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            if($question_id>0)
            {
                $this->data['question'] = $this->question_model->get_question(array('id'=>$question_id));
                $this->data['meta'] = $this->meta_model->get_meta($this->data['question']['id']);
                $this->data['answer'] = $this->answer_model->get_answer(array('question_id'=>$question_id));
            }

            $this->data['category'] = $this->question_category_model->get_all();
            /* Load Template */
            $this->template->admin_render('admin/question/single', $this->data);
        }
    }

    public function jump($question_id=-1)
    {
        if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            if($question_id>0)
            {
                $this->data['question'] = $this->question_model->get_question(array('id'=>$question_id));
                $this->data['meta'] = $this->meta_model->get_meta($this->data['question']->id);
            }
            $this->data['category'] = $this->question_category_model->get_all();
            $this->template->admin_render('admin/question/jump', $this->data);
        }
    }

    public function score($question_id=-1)
    {
        if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            if($question_id>0)
            {
                $this->data['question'] = $this->question_model->get_question(array('id'=>$question_id));
                $this->data['meta'] = $this->meta_model->get_meta($this->data['question']->id);
            }

            $this->data['category'] = $this->question_category_model->get_all();
            $this->template->admin_render('admin/question/score', $this->data);
        }
    }
    public function page($page=1, $num=50,$category_id=1)
    {
        if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            $this->data['questions'] = $this->question_model->getPage($page,$num,$category_id);
            $this->data['category'] = $this->question_category_model->get_all();
            $this->template->admin_render('admin/question/page', $this->data);
        }
    }

    /***interface*/
    /*
     * 创建一个问题
     */
    public function create()
    {
        if($this->ion_auth->logged_in() && $this->ion_auth->is_admin())
        {
            if (strlen($this->input->post('title'))==0)
            {
                Response::build(2,"标题不能为空")->show();
            }
            if (strlen($this->input->post('description'))==0)
            {
                Response::build(2,"描述不能为空")->show();
            }
            $seo_title = $this->input->post('seo_title');
            if(strlen($seo_title) == 0)
            {
                $seo_title = $this->input->post('title');
            }
            $seo_description = $this->input->post('seo_description');
            if(strlen($seo_description) == 0)
            {
                $seo_description = $this->input->post('description');
            }

            $meta_id =  $this->meta_model->insert_meta(
                $seo_title,
                $seo_description,
                $this->input->post('seo_keywords') 
            );

            $question_id = $this->question_model->insert_question(array(
                'title'=>$this->input->post('title'),
                'description'=>$this->input->post('description'),
                'question_category_id'=>$this->input->post('question_category_id'),
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
        else
        {
            Response::build(-1,"no auth")->show();            
        }

    }



    public function del()
    {
        if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            $ret = $this->question_model->delete_question($this->input->post('question_id'));
            if( $ret>0)
            {
                Response::build(0,"ok","删除成功")->show();
            }
            else
            {
                Response::build(0,"删除失败")->show();
            }
        }
    }
}
