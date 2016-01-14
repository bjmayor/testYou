<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('question_model');
        $this->load->model('question_category_model');
    }
    public function index()
    {
        $this->load->view('index',$this->data);
    }

    /**
     *@param $type 0 new;1 top;2 best
     */
    public function top($category_id=1,$type=0,$page=1)
    {
        $page_num = 10;
        $this->data['category'] = $this->question_category_model->get_category($category_id);
        $this->data['page'] = $page;
        switch ($type)
        {
        case 0:
            $this->data['questions'] = $this->question_model->get_question(array(
                "question_category_id"=>$category_id,
                "sort_by"=>'create_time',
                'sort_direction'=>'desc',
                'limit'=>$page_num,
                'offset'=>($page-1)*$page_num
            ));
            break;
        case 1:
            $this->data['questions'] = $this->question_model->get_question(array(
                "question_category_id"=>$category_id,
                "sort_by"=>'visit_count',
                'sort_direction'=>'desc',
                'limit'=>$page_num,
                'offset'=>($page-1)*$page_num
            ));

            break;
        case 2:
             $this->data['questions'] = $this->question_model->get_question(array(
                "question_category_id"=>$category_id,
                "is_recommend"=>1,
                "sort_by"=>'create_time',
                'sort_direction'=>'desc',
                'limit'=>$page_num,
                'offset'=>($page-1)*$page_num
            ));
           break;
            
        }
        $this->load->view('top',$this->data);
    }
}
