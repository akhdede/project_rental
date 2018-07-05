<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tersedia extends CI_Controller {

  function __construct(){
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    parent::__construct();

    if($_SESSION['level'] != 1)
        redirect(base_url('user/login'));
    $data = array( 'title' => 'Administrator page',
                   'header' => 'ADMINISTRATOR PAGE',
                   'content_header' => 'CV. NEW GARUDA JAYA TOTABUAN'
                 );
    $this->load->view('layouts/admin/header', $data);
    $this->load->model('admin/tersedia_model');
    date_default_timezone_set('Asia/Makassar');
  }

  // start of fungsi tersedia
	public function index()
	{
    $data = array('isi' => 'admin/tersedia/mobil_tersedia.php',
                  'mblDetails' => $this->tersedia_model->mblDetails(),
                  'mblTersedia' => $this->tersedia_model->mblTersedia(),
                  'getDriver' => $this->tersedia_model->getDriver()->result(),
                  'krsStatus' => $this->tersedia_model->krsStatus()
                 );
    $this->load->view('layouts/admin/wrapper', $data);
  }

	public function kursi_dipesan()
	{
    $data = array('isi' => 'admin/tersedia/kursi_dipesan.php',
                  'mblDetails' => $this->tersedia_model->mblDetails(),
                  'mblTersedia' => $this->tersedia_model->mblTersedia(),
                  'krsStatus' => $this->tersedia_model->krsStatus()
                 );
    $this->load->view('layouts/admin/wrapper', $data);
  }

  public function get($id){
    $where = array('id' => $id);
    $data = array('isi' => 'admin/tersedia/get_tersedia.php',
                  'get' => $this->tersedia_model->get('mobil_details', $where)->result()
                 );
    $sukses = $this->session->set_flashdata('message', '<div class="alert alert-success" id="danger-alert"> <button type="button" class="close" data-dismiss="alert">x</button><strong>Data berhasil ditambah!</strong></div>');
    echo $sukses;
    redirect('admin/tersedia');
  }

  public function addMobil(){
    $idDrv = $this->input->post('driver_id');
    $plat_no = $this->input->post('plat_nomor');
    $merek = $this->input->post('merek');
    $img = $this->input->post('img');
    $tanggal_tersedia = $this->input->post('tanggal_tersedia');

    if($idDrv == NULL){
      $sukses = $this->session->set_flashdata('message', '<div class="alert alert-danger" id="success-alert"> <button type="button" class="close" data-dismiss="alert">x</button><strong>Driver harus dipilih!</strong></div>');
      echo $sukses;
    }else{
      $this->tersedia_model->insert($plat_no, $merek, $img, $tanggal_tersedia, $idDrv);

      $i = 1;
      for ($no_kursi = $i; $no_kursi < 8; $no_kursi++) {
         // code...
        $this->tersedia_model->addKursi($plat_no, $no_kursi, $tanggal_tersedia);
      }

      $sukses = $this->session->set_flashdata('message', '<div class="alert alert-success" id="success-alert"> <button type="button" class="close" data-dismiss="alert">x</button><strong>Mobil telah tersedia!</strong></div>');
      echo $sukses;
    }
    redirect('admin/tersedia');
  }

  public function delete(){
    $tanggal_sekarang = date('d-m-Y');
    $plat_nomor = $this->uri->segment(4);
    $this->tersedia_model->mblBatal($plat_nomor, $tanggal_sekarang);
    $this->tersedia_model->krsBatal($plat_nomor, $tanggal_sekarang);
    redirect('admin/tersedia');
  }

  // kursi tersedia
  public function kursi(){
    $this->_set_rules();

    $plat_nomor = $this->input->post('plat_nomor');
    $nomor_kursi = $this->input->post('nomor_kursi');
    $costumer = $this->input->post('costumer');
    $keterangan = $this->input->post('keterangan');
    $status_bayar = $this->input->post('status_bayar');
    $status = 1;

    if($this->form_validation->run() == TRUE){
      $this->tersedia_model->krsUpdate($status, $plat_nomor, $nomor_kursi, $costumer, $keterangan, $status_bayar);
      echo $this->session->set_flashdata('message', '<div class="alert alert-success" id="success-alert"> <button type="button" class="close" data-dismiss="alert">x</button><strong>Pesan berhasil ditambahkan!</strong></div>');
    }else{
      echo $this->session->set_flashdata('message', '<div class="alert alert-danger" id="danger-alert"> <button type="button" class="close" data-dismiss="alert">x</button><strong>'.validation_errors().'</strong></div>');
    }

    redirect('admin/tersedia/kursi_tersedia');
  }

  //status batal
  public function batalPesan(){
    $plat_no = $this->uri->segment(4);
    $no_kursi = $this->uri->segment(5);
    $status = null;
    $costumer = null;
    $ket = null;

    $this->tersedia_model->batalPesan($plat_no, $no_kursi);

    redirect('admin/tersedia/kursi_dipesan');
  }

  // mobil jalan
  public function mblJalan(){
    $plat_no = $this->uri->segment(4);
    $sdh_jln= $this->uri->segment(5);

    $this->tersedia_model->mblJalan($plat_no, $sdh_jln);

    redirect('admin/tersedia');
  }

  private function _set_rules(){
    $this->form_validation->set_rules('no_kursi', 'No. Kursi', 'required');
    $this->form_validation->set_rules('costumer', 'Nama Costumer', 'required');
    $this->form_validation->set_rules('ket', 'Keterangan', 'required');
    $this->form_validation->set_rules('stts_bayar', 'Status Bayar', 'required');
  }

}
