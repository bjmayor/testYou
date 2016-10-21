<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('relation2_model','relation_model');
        $this->load->model('district2_model','district_model');
    }

    public function index()
    {
        $this->data['provinces'] =  $this->relation_model->get_district_by_level(Relation2_model::PROVINCE);
        $this->load->view('index',$this->data);
    }

    public function allcity($provinceId)
    {
        $this->data['citys'] =  $this->relation_model->get_district(array("pid"=>$provinceId));
        $this->load->view('allcity',$this->data);
    }

    public function allctown($cityId)
    {
        $this->data['ctowns'] =  $this->relation_model->get_district(array("pid"=>$cityId));
        $this->load->view('allctown',$this->data);
    }

    public function alltown($ctownId)
    {
        $this->data['ctowns'] =  $this->relation_model->get_district(array("pid"=>$ctownId));
        $this->load->view('alltown',$this->data);
    }

    public function allstreet($townId)
    {
        $this->data['streets'] =  $this->relation_model->get_district(array("pid"=>$townId));
        $this->load->view('allstreet',$this->data);
    }

    public function allvillage($ctownId)
    {
        $this->data['villages'] =  $this->relation_model->get_district(array("pid"=>$ctownId));
        $this->load->view('allvillage',$this->data);
    }

    public function info($id)
    {
        $this->data['info'] =  $this->relation_model->get_district(array("id"=>$id));
        $this->load->view('info',$this->data);
    }

}
