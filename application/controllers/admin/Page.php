<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Load :: Common */
        $this->load->helper('number');
        $this->load->model('admin/dashboard_model');
        $this->load->model('question_model');
        $this->load->model('question_category_model');
        $this->data['question_type'] = array(array("id"=>1,"description"=>"单选题"),
                                    array("id"=>"2","description"=>"多选评分"),
                                     array("id"=>"3","description"=>"多选跳转"));
        $this->data['publish_status'] = array(array("id"=>-1,"description"=>"未发布"),
                                    array("id"=>0,"description"=>"发布"),
                                     array("id"=>1,"description"=>"删除"));

    }



    public function page($page=1, $num=20,$category_id=0)
    {
        $this->data['page_total'] = $this->question_model->get_page_total($num,$category_id);
        if($page>$this->data['page_total'])
        {
            $page = $this->data['page_total'];
        }
        if($page<1)
        {
            $page = 1;
        }

        $this->data['page'] = $page;
        $this->data['questions'] = $this->question_model->get_page($page,$num,$category_id);
        $this->data['category'] = $this->question_category_model->get_all();
        $this->template->admin_render('admin/question/page', $this->data);
    }



}
