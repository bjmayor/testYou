<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Files extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Title Page :: Common */
        $this->page_title->push(lang('menu_files'));
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, lang('menu_files'), 'admin/files');
    }


	public function index()
	{
        if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            /* Data */
            $this->data['error'] = NULL;

            /* Load Template */
            $this->template->admin_render('admin/files/index', $this->data);
        }
	}


	public function do_upload($dir='',$filename='userfile',$is_ajax = false)
	{
        if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            /* Conf */
            $config['upload_path']      = './upload/'.$dir;
            $config['allowed_types']    = 'gif|jpg|png';
            $config['max_size']         = 2048;
            $config['max_width']        = 1024;
            $config['max_height']       = 1024;
            $config['file_ext_tolower'] = TRUE;

            $this->load->library('upload', $config);

            /* Breadcrumbs */
            $this->breadcrumbs->unshift(2, lang('menu_files'), 'admin/files');
            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            if ( ! $this->upload->do_upload($filename))
            {
                /* Data */
                $this->data['error'] = $this->upload->display_errors();
                if($is_ajax)
                {
                    Response::build(-1,'error',$this->data)->show();
                }
                else
                {
                    $this->template->admin_render('admin/files/index', $this->data);
                }

            }
            else
            {
                /* Data */
                $this->data['upload_data'] = $this->upload->data();
                if($is_ajax)
                {
                    Response::build(-1,'error',$this->data)->show();
                }
                else
                {
                    $this->template->admin_render('admin/files/upload', $this->data);
                }
            }
        }
	}
}
