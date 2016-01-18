<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('meta_model');
        $this->load->model('answer_model');
        $this->load->model('question_model');
    }
    public function index($question_id)
    {
        $this->data['question'] = $this->question_model->get_question(array('id'=>$question_id));
        $this->load->view('test/index',$this->data);
    }

    /*
     * @param $question_id 可能是父问题，可能是子问题。
     * 判断类型，分别展示。
     * 如果是单选题，直接跳到答案页|need question_id & label
     * 如果是跳转题，要么直接跳到答案页，要么有下一题的id| need question_id
     * 如果是计分题,必须给出下一题的id, 如果没有给，直接跳到答案页| need question_id or label
     */
    public function start($question_id,$index=0)
    {

        $this->data['question'] = $this->question_model->get_question(array('id'=>$question_id));
        //当前是某个测试题 子问题
        if($this->data['question']['pid'] !=0  &&is_int($this->data['question']['pid']))
        {
           $this->data['main_question'] = $this->question_model->get_question(array('id'=>$this->data['question']['pid']));
        }
        else
        {
            $this->data['main_question'] = $this->data['question'];
        }
        switch($this->data['main_question']['question_type'])
        {
        case 1:
            $this->data['answer'] = $this->answer_model->get_answer(array('question_id'=>$question_id));
            break;
        case 2:
            break;
        case 3:
            break;
        }
        //$this->output->enable_profiler();
        $this->data['sub_questions'] = $this->question_model->get_question(array('pid'=>$this->data['main_question']['id']));
        $this->data['total'] = count($this->data['sub_questions']);
        $this->data['index'] = $index;
        $this->data['meta'] = $this->meta_model->get_meta($this->data['question']['id']);
        $this->load->view('test/start',$this->data);
    }

    public function result($question_id,$result_label)
    {
        $this->load->model('result_model');
        $this->data['question'] = $this->question_model->get_question(array('id'=>$question_id));
        $this->data['result'] = $this->result_model->get_result(array('question_id'=>$question_id,'label'=>$result_label));
        $this->load->view('test/result',$this->data);
    }


}
