<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends MY_Controller {


    public function __construct()
    {
        parent::__construct();
    }
    public function saveAll()
    {
	$this->ajaxReturn("");
    }

	
 public function saveRecent()
    {
        $this->ajaxReturn("");
    }



}
