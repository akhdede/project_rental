<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model('home_model');
    date_default_timezone_set('Asia/Makassar');
  }

	public function index()
	{
    $jumlah_data = $this->home_model->jumlah_data();
    $this->load->library('pagination');
    $config = array('base_url' => base_url().'index.php',
                    'total_rows' => $jumlah_data,
                    'per_page' => 10
                   );
    $from = $this->uri->segment(3);
    $this->pagination->initialize($config);
    $data = array('title' => 'CV. Garuda Jaya',
                  'mobil_tersedia' => $this->home_model->tmplMbl($config['per_page'], $from),
                  'kursi_tersedia' => $this->home_model->tmplKrs(),
                  'kursi_kategori' => $this->home_model->krsKtgr(),
                  'tampilDriver' => $this->home_model->tampilDriver(),
                  'isi'   => 'home/index.php'
                  );
		$this->load->view('layout/wrapper',$data);
	}

}
