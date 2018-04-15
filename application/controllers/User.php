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
            'content' => 'user/view_signup'
        );

        $this->load->view('layouts/wrapper', $data);
	}

    public function get_provinsi()
    {
        if(isset($_GET['term'])){
            $result = $this->user_model->get_provinsi($_GET['term']);
            if(count($result) > 0){
                foreach($result as $p)
                    $provinces[] = $p->name;
                echo json_encode($provinces);
            }
        }
    }
}
