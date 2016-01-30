<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('question_model');
        $this->load->model('question_category_model');
    }
    public function index($type=0,$page=1)
    {
        $page_num = 10;
        $page = max($page,1);
        $this->data['page'] = $page;
        $this->data['type'] = $type;
        switch ($type)
        {
        case 0:
            $this->data['questions'] = $this->question_model->get_question(array(
                "sort_by"=>'create_time',
                "pid"=>0,
                'sort_direction'=>'desc',
                'limit'=>$page_num,
                'offset'=>($page-1)*$page_num
            ));
            break;
        case 1:
            $this->data['questions'] = $this->question_model->get_question(array(
                "sort_by"=>'visit_count',
                'sort_direction'=>'desc',
                "pid"=>0,
                'limit'=>$page_num,
                'offset'=>($page-1)*$page_num
            ));

            break;
        case 2:
             $this->data['questions'] = $this->question_model->get_question(array(
                "is_recommend"=>1,
                "pid"=>0,
                "sort_by"=>'create_time',
                'sort_direction'=>'desc',
                'limit'=>$page_num,
                'offset'=>($page-1)*$page_num
            ));
           break;
            
        }
        $this->set_page_title('index');
        $this->set_page_description('index');
        $this->set_page_keywords('index');
        $this->load->view('index',$this->data);
    }

    /**
     *@param $type 0 new;1 top;2 best
     */
    public function top($category_id=1,$type=0,$page=1)
    {
        $page_num = 10;
        $page = max($page,1);
        $this->data['category'] = $this->question_category_model->get_category($category_id);
        $this->data['page'] = $page;
        $this->data['type']=$type;
        $this->data['total_page'] = 1;
        $total_count = 0;
        switch ($type)
        {
        case 0:
            $this->data['questions'] = $this->question_model->get_question(array(
                "question_category_id"=>$category_id,
                "sort_by"=>'create_time',
                'sort_direction'=>'desc',
                "pid"=>0,
                'limit'=>$page_num,
                'offset'=>($page-1)*$page_num
            ));
            $total_count = $this->question_model->get_total(array(
                "question_category_id"=>$category_id,
                "pid"=>0
            ));
            break;
        case 1:
            $this->data['questions'] = $this->question_model->get_question(array(
                "question_category_id"=>$category_id,
                "sort_by"=>'visit_count',
                'sort_direction'=>'desc',
                "pid"=>0,
                'limit'=>$page_num,
                'offset'=>($page-1)*$page_num
            ));
             $total_count = $this->question_model->get_total(array(
                "question_category_id"=>$category_id,
                "pid"=>0
            ));

            break;
        case 2:
             $this->data['questions'] = $this->question_model->get_question(array(
                "question_category_id"=>$category_id,
                "is_recommend"=>1,
                "sort_by"=>'create_time',
                'sort_direction'=>'desc',
                "pid"=>0,
                'limit'=>$page_num,
                'offset'=>($page-1)*$page_num
            ));
            $total_count = $this->question_model->get_total(array(
                "question_category_id"=>$category_id,
                "is_recommend"=>1,
                "pid"=>0
            ));

           break;
            
        }
        $this->data['page_total'] = round(0.5+$total_count/$page_num);
        $this->set_page_title('subtop','',$this->data['category']['description']);
        $this->set_page_description('subtop','',$this->data['category']['description']);
        $this->set_page_keywords('subtop','',$this->data['category']['description']);
        $this->load->view('top',$this->data);
    }
}
