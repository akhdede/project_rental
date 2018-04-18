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
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $where = array(
            'email' => $email
        );

        $cek_login = $this->user_model->cek_login('users', $where)->num_rows();

        if($cek_login > 0){
            $data_user = $this->db->get_where('users', $where)->result();
            echo $data_user[0]->email;
            echo $data_user[0]->password;
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
        $password = password_hash($this->input->post('nama_lengkap'), PASSWORD_DEFAULT);
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
