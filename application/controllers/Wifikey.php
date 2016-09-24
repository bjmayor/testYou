<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wifikey extends MY_Controller {


    public function __construct()
    {
        parent::__construct();
    }

    public function getPwds()
    {
	$this->ajaxReturn(array());
    }

 /*
     * @desc 收集用户扫描到热点。同时里面会包含用户尝试的密码状态。
     * 别名，saveUserSsid, 
     *
     */
public function s()
{
$this->ajaxReturn(array());
}
}
