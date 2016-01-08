<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Load :: Common */
        $this->load->helper('number');
        $this->load->model('admin/dashboard_model');
    }

    public function single()
    {
           if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            /* Load Template */
            $this->template->admin_render('admin/question/single', $this->data);
        }
 }

    public function jump()
    {
          if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            /* Load Template */
            $this->template->admin_render('admin/question/jump', $this->data);
        }
  }

    public function score()
    {
         if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            /* Load Template */
            $this->template->admin_render('admin/question/score', $this->data);
        }
   }

}
