<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setharga extends CI_Controller {

  function __construct(){
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    parent::__construct();


    $data = array( 'title' => 'Administrator page',
                   'header' => 'ADMINISTRATOR PAGE',
                   'content_header' => 'CV. NEW GARUDA JAYA TOTABUAN'
                 );
    $this->load->view('layout/admin/header', $data);
    $this->load->model('admin/setharga_model');
  }

  // start of fungsi tersedia
	public function index()
	{
    $data = array('isi' => 'admin/setHarga/harga.php',
                  'vHarga' => $this->setharga_model->vHarga()
                 );
    $this->load->view('layout/admin/wrapper', $data);
  }

	public function editharga()
	{
    $id = $this->uri->segment(4);
    $data = array('isi' => 'admin/setHarga/edit_harga.php',
                  'eHarga' => $this->setharga_model->eHarga($id)
                 );
    $this->load->view('layout/admin/wrapper', $data);
  }

  public function update(){
    $id = $this->input->post('id');
    $harga = $this->input->post('harga');
    $this->setharga_model->update($id, $harga);
    redirect('admin/setharga');
  }
}
