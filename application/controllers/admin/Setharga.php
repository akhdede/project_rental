<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setharga extends CI_Controller {

  function __construct(){
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    parent::__construct();

    if($_SESSION['level'] != 1)
        redirect(base_url('user/login'));

    $data = array( 'title' => 'Administrator page',
                   'header' => 'ADMINISTRATOR PAGE',
                   'content_header' => 'CV. NEW GARUDA TOTABUAN'
                 );
    $this->load->view('layouts/admin/header', $data);
    $this->load->model('admin/setharga_model');
    date_default_timezone_set('Asia/Makassar');
  }

  // start of fungsi tersedia
	public function index()
	{
    $data = array('isi' => 'admin/setHarga/harga.php',
                  'vHarga' => $this->setharga_model->vHarga()
                 );
    $this->load->view('layouts/admin/wrapper', $data);
  }

	public function editharga()
	{
    $id = $this->uri->segment(4);
    $data = array('isi' => 'admin/setHarga/edit_harga.php',
                  'eHarga' => $this->setharga_model->eHarga($id)
                 );
    $this->load->view('layouts/admin/wrapper', $data);
  }

  public function update(){
    $id = $this->input->post('id');
    $harga = $this->input->post('harga');
    $this->setharga_model->update($id, $harga);
    redirect('admin/setharga');
  }
}
