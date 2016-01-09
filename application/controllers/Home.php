<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {


    public function index()
    {
        $this->load->view('index',$this->data);
    }

    public function top()
    {
        $this->load->view('top',$this->data);
    }
}
