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
        $this->load->model('question_category_model');
    }

    public function single()
    {
           if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            $this->data['category'] = $this->question_category_model->get_all();
            /* Load Template */
            $this->template->admin_render('admin/question/single', $this->data);
        }
 }

    public function jump()
    {
          if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            /* Load Template */
            $this->template->admin_render('admin/question/jump', $this->data);
        }
  }

    public function score()
    {
         if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            /* Load Template */
            $this->template->admin_render('admin/question/score', $this->data);
        }
   }
    public function page($category_id=1, $page=1, $num=50)
    {
         if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            $this->data['questions'] = $this->question_model->getPage($page,$num,$category_id);
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
            $question_id = $this->question_model->insert_question(array(
                'title'=>$this->input->post('title'),
                'description'=>$this->input->post('description'),
                'question_category_id'=>$this->input->post('question_category_id')
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
}
