<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('question_model');
    }
    public function index($question_id)
    {
        $this->data['question'] = $this->question_model->get_question(array('id'=>$question_id));
        $this->load->view('test/index',$this->data);
    }

    public function start()
    {
        $this->load->view('test/start',$this->data);
    }

    public function result()
    {
        $this->load->view('test/result',$this->data);
    }


}
