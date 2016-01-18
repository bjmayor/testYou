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
    public function page($page=1, $num=50,$category_id=1)
    {
        $this->data['questions'] = $this->question_model->getPage($page,$num,$category_id);
        $this->data['category'] = $this->question_category_model->get_all();
        $this->template->admin_render('admin/question/page', $this->data);
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
            $seo_description = $this->input->post('description');
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
                'meta_id'=>$question['meta_id'],
                'id'=>$question['id']
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



    public function del()
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
