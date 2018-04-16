<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $data = array(
            'title' => 'CV. New Garuda Jaya Totabuan'
        );
		$this->load->view('layouts/header', $data);
        $this->load->model('user_model');
    }

	public function index()
	{
        redirect('user/login', 'refresh');
	}

	public function login()
	{
        $data = array(
            'content' => 'user/view_login'
        );

        $this->load->view('layouts/wrapper', $data);
	}

	public function signup()
	{
        $data = array(
            'content' => 'user/view_signup',
            'provinces' => $this->user_model->get_provinces()
        );

        $this->load->view('layouts/wrapper', $data);
	}

    public function get_regencies(){
        $id_province = $this->input->post('id_province');
        $data = $this->user_model->get_regencies($id_province);
        echo json_encode($data);
    }


}
