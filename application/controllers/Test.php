<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends MY_Controller {

    public function index()
    {
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
