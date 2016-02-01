<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('meta_model');
        $this->load->model('answer_model');
        $this->load->model('result_model');
        $this->load->model('question_model');
    }
    public function index($question_id)
    {
        $this->data['question'] = $this->question_model->get_question(array('id'=>$question_id));
        if($this->data['question']==false)
        {
            show_error("很遗憾，页面不存在",404,"页面找不到");
        }
        $this->question_model->update_question(array("visit_count"=>$this->data['question']['visit_count']+1, 'id'=>$question_id));
        $this->load->view('test/index',$this->data);
    }

    public function start($question_id)
    {

        $this->data['question'] = $this->question_model->get_question(array('id'=>$question_id));
        if($this->data['question'] == false)
        {
            show_error("很遗憾，页面不存在",404,"页面找不到");
            return;
        }
        $is_main_question = false;
        //当前是某个测试题 子问题
        if($this->data['question']['pid'] !=0  && $this->data['question']['pid']>0)
        {
            $this->data['main_question'] = $this->question_model->get_question(array('id'=>$this->data['question']['pid']));
        }
        else
        {
            $is_main_question = true;
            $this->data['main_question'] = $this->data['question'];
        }

        $this->data['sub_questions'] = $this->question_model->get_question(array('pid'=>$this->data['main_question']['id']));
        $this->data['total'] = count($this->data['sub_questions']);
        $this->data['index'] = 0;
        $this->data['meta'] = $this->meta_model->get_meta($this->data['question']['id']);
        $this->data['question'] = $this->data['sub_questions'][0];
        $this->data['answers'] = $this->answer_model->get_answer(array('sub_question_id'=>$this->data['question']['id']));
        $this->load->view('test/start',$this->data);
    }

    public function jump($question_id,$next_question_label)
    {
        $this->data['main_question'] = $this->question_model->get_question(array('id'=>$question_id));
        if($this->data['main_question'] == false)
        {
            show_error("很遗憾，页面不存在",404,"页面找不到");
            return;
        }

        $this->data['sub_questions'] = $this->question_model->get_question(array('pid'=>$this->data['main_question']['id']));
        $this->data['total'] = count($this->data['sub_questions']);
        $this->data['index'] = 1;

        $this->data['question'] =  $this->question_model->get_question(array("pid"=>$question_id,"label"=>$next_question_label));
        $this->data['meta'] = $this->meta_model->get_meta($this->data['question']['id']);
        $this->data['answers'] = $this->answer_model->get_answer(array('sub_question_id'=>$this->data['question']['id']));
        $this->load->view('test/start',$this->data);
    }

    public function score($question_id,$index=0,$answer_id=-1)
    {

        $this->data['main_question'] = $this->question_model->get_question(array('id'=>$question_id));
        if($this->data['main_question'] == false)
        {
            show_error("很遗憾，页面不存在",404,"页面找不到");
            return;
        }

        $this->data['sub_questions'] = $this->question_model->get_question(array('pid'=>$this->data['main_question']['id']));
        $this->data['total'] = count($this->data['sub_questions']);
        $this->data['index'] = $index;
        $this->data['meta'] = $this->meta_model->get_meta($this->data['main_question']['id']);
    
        //如果是最后一次点击，需要计算分数
        $answer = $this->answer_model->get_answer(array('id'=>$answer_id));
        $results = $this->result_model->get_result(array("question_id"=>$this->data['main_question']['id']));
        if($index ==0)
        {
            $this->session->set_userdata("score_".$this->data['main_question']['id'],array());
        }
        $userdata = $this->session->userdata('score_'.$this->data['main_question']['id']);
        if($index>0)
        {
            $last_question =  $this->data['sub_questions'][$index-1];
            $userdata[$last_question['id']] = $answer['score'];
        }

        if($index >= $this->data['total'])
        {
            $total_score = 0;
            foreach($userdata as $score)
            {
                $total_score += $score;
            }
            $result_id = 1;
            foreach($results as $result)
            {
                if($total_score>$result['score_start'] && $total_score<$result['score_end'])
                {
                    $result_id = $result['label'];
                }
            }
            $this->session->unset_userdata("score_".$this->data['main_question']['id'],array());
            redirect('test/result/'.$this->data['main_question']['id'].'/'.$result_id);
        }
        else
        {
            $this->data['question'] = $this->data['sub_questions'][$index];
            $this->data['answers'] = $this->answer_model->get_answer(array('sub_question_id'=>$this->data['question']['id']));
        }
        $this->load->view('test/start',$this->data);
    }


    public function result($question_id,$result_label)
    {
        $this->load->model('result_model');
        $this->data['question'] = $this->question_model->get_question(array('id'=>$question_id));
        if($this->data['question']==false)
        {
            show_error("很遗憾，页面不存在",404,"页面找不到");
        }
        $this->data['result'] = $this->result_model->get_result(array('question_id'=>$question_id,'label'=>$result_label));
        $this->load->view('test/result',$this->data);
    }


}
