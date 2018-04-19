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

    public function login_action()
    {
        if($this->user_model->login($_POST['email'], $_POST['password']) == NULL){
            $data['error'] = 'Email atau password salah!';
            $this->load->view('user/view_login', $data);
        }else{
            $user = $this->db->get_where('users', array('email' => $_POST['email']))->result();
            $_SESSION = array(
                'nama_lengkap' => $user[0]->nama_lengkap,
                'level' => $user[0]->level
            );
            redirect(base_url());
        }

    }

	public function signup()
	{
        $data = array(
            'content' => 'user/view_signup',
			'provinsi' => $this->user_model->get_all_provinsi()
        );

        $this->load->view('layouts/wrapper', $data);
	}

    public function signup_action()
    {
        $email = $this->input->post('email');
        $password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
        $nama_lengkap = $this->input->post('nama_lengkap');
        $nomor_handphone = $this->input->post('nomor_handphone');
        $provinsi = $this->input->post('provinsi');
        $kabupaten = $this->input->post('kabupaten');
        $kecamatan = $this->input->post('kecamatan');
        $desa = $this->input->post('desa');
        $alamat = $this->input->post('alamat');

        $data = array(
            'email' => $email,
            'password' => $password,
            'nama_lengkap' => $nama_lengkap,
            'nomor_handphone' => $nomor_handphone,
            'provinsi' => $provinsi,
            'kabupaten' => $kabupaten,
            'kecamatan' => $kecamatan,
            'desa' => $desa,
            'alamat' => $alamat
        );

        $this->user_model->signup_action($data, 'users');
        redirect('user/login');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }

    function add_ajax_kab($id_prov){
        $query = $this->db->get_where('wilayah_kabupaten',array('provinsi_id'=>$id_prov));
        $data = "<option value=''>- Pilih Kabupaten -</option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='".$value->id."'>".$value->nama."</option>";
        }
        echo $data;
    }
    
    function add_ajax_kec($id_kab){
        $query = $this->db->get_where('wilayah_kecamatan',array('kabupaten_id'=>$id_kab));
        $data = "<option value=''> - Pilih Kecamatan - </option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='".$value->id."'>".$value->nama."</option>";
        }
        echo $data;
    }
    
    function add_ajax_des($id_kec){
        $query = $this->db->get_where('wilayah_desa',array('kecamatan_id'=>$id_kec));
        $data = "<option value=''> - Pilih Desa - </option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='".$value->id."'>".$value->nama."</option>";
        }
        echo $data;
    }
}
