<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Response{
    public $code;
    public $msg;
    public $data;

    public function __construct()
    {
    }

    public function result($code, $msg, $data="")
    {
        $this->code = $code;
        $this->msg = $msg;
        $this->data = $data;
        echo json_encode(array("msg"=>$this->msg,"code"=>$this->code, "data"=>$this->data));
    }
}
