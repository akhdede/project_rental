<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $data = array(
            'title' => 'CV. New Garuda Totabuan'
        );
		$this->load->view('layouts/header', $data);
        $this->load->model('user_model');
        date_default_timezone_set('Asia/Makassar');
    }

	public function index()
	{
        redirect('user/login', 'refresh');
	}

	public function login()
	{
        $data = array( 'content' => 'user/view_login.php');

        $this->load->view('layouts/wrapper', $data);
	}

    public function login_action()
    {
        if($this->user_model->login($_POST['email'], $_POST['password']) == NULL){
            $pesan = '<span class="text-danger">Username atau password salah!</span>';
            $this->session->set_flashdata('message', $pesan);
        }else{
            $user = $this->db->get_where('users', array('email' => $_POST['email']))->result();

            if($user[0]->active == 'n') {
                $pesan = '<span class="text-danger">User belum diaktivasi! silahkan buka email anda untuk mengaktivasi.</span>';
                $this->session->set_flashdata('message', $pesan); 
            } else {
                $_SESSION = array(
                    'nama_lengkap' => $user[0]->nama_lengkap,
                    'email' => $user[0]->email,
                    'level' => $user[0]->level
                );
                
                if($_SESSION['level'] == 0)
                    redirect(base_url());
                elseif($_SESSION['level'] == 1)
                    redirect(base_url('admin/dashboard'));
            }
        }

        $data = array( 'content' => 'user/view_login.php');

        $this->load->view('layouts/wrapper', $data);
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
        $hash = sha1($email);

        $cek_email = $this->db->query("SELECT * FROM users WHERE email='$email'")->num_rows();

        if($cek_email > 0){
            $data = array(
                'content' => 'user/terdaftar'
            );

            $this->load->view('layouts/wrapper', $data);
        }
        else{
            $data = array(
                'email' => $email,
                'password' => $password,
                'nama_lengkap' => $nama_lengkap,
                'nomor_handphone' => $nomor_handphone,
                'provinsi' => $provinsi,
                'kabupaten' => $kabupaten,
                'kecamatan' => $kecamatan,
                'desa' => $desa,
                'alamat' => $alamat,
                'hash' => $hash
            );

            $this->user_model->signup_action($data, 'users');


            $costumers = $email;
            $title = 'Aktivasi akun New Garuda Totabuan';
            $link = '<a href="' . base_url('user/activate/' . $email . '/' . $hash) . '"> ' . base_url('user/activate/' . $email . '/' . $hash) . '</a>';
            $isi_pesan = 'Silahkan klik link berikut untuk mealakukan aktivasi.' . $link;  

            $this->send_mail($costumers, $title, $isi_pesan);

            $this->session->set_flashdata('message', '<span class="text-success">Pendaftaran berhasil! silahkan cek email anda untuk proses aktivasi.</span>');

        }

        $data = array( 'content' => 'user/view_login.php');

        $this->load->view('layouts/wrapper', $data);
    }

    public function logout()
    {
        unset($_SESSION['email']);
        unset($_SESSION['nama_lengkap']);
        unset($_SESSION['level']);
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function activate() {
        $email = $this->uri->segment(3);
        $hash = $this->uri->segment(4);

        $this->user_model->activate($email, $hash);
        $this->session->set_flashdata('message', '<span class="text-success">Akun anda sudah aktif! silahkan login</span>');
        redirect(base_url('user/login'));

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

    private function send_mail($costumers, $title, $isi_pesan) {
		$from_email = "garudatotabuannew@gmail.com"; 
		$to_email = $costumers; 

		$config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => $from_email,
            'smtp_pass' => 'kotamobagu',
            'mailtype'  => 'html', 
            'charset'   => 'iso-8859-1'
		);
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");   

        $this->email->from($from_email, 'New Garuda Totabuan'); 
        $this->email->to($to_email);
        $this->email->subject($title); 
        $this->email->message($isi_pesan); 

        return $this->email->send();
    }
}
