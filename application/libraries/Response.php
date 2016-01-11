<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Response{
    public $code;
    public $msg;

    public function __construct()
    {
    }

    public function result($response)
    {
        if($response)
        {
            echo json_encode($response);
        }
        else
        {
            echo json_encode(array("msg"=>$this->msg,"code"=>$this->code));
        }
    }

    public function result($code, $msg)
    {
        $this->code = $code;
        $this->msg = $msg;
        $this->result();
    }
}
