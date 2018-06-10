<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  function __construct(){
    parent::__construct();

		if($this->session->userdata('status') == "login"){
			redirect(base_url("admin/dashboard"));
		}

    $this->load->model('Login_model');
  }

	public function index()
	{
    $data = array('title' => 'Login page',
                  'isi' => 'login/index'
                 );
    $this->load->view('layout/wrapper',$data);
	}

  public function aksi_login(){
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $where = array('username' => $username,
                   'password' => md5($password)
                  );
    $cek = $this->Login_model->aksi_login("user", $where)->num_rows();
    if($cek > 0){
      $data_session = array('nama' => $username,
                            'status' => "login"
                           );
      $this->session->set_userdata($data_session);
      redirect('admin/dashboard');
    }
    else{
      echo "username atau password salah!";
    }
  }

}
