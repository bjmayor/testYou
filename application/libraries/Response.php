<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Response{
    public $code;
    public $msg;
    public $data;

    public function __construct()
    {
    }

    public static function build($code, $msg, $data="")
    {
        $res = new Response();
        $res->code = $code;
        $res->msg = $msg;
        $res->data = $data;
        return $res;
    }

    public function show()
    {
        echo json_encode(array("msg"=>$this->msg,"code"=>$this->code, "data"=>$this->data));
    }
}
