<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Driver extends CI_Controller {

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
    $this->load->model('admin/driver_model');
  }

  // start of fungsi list
  public function index(){
    $data = array( 'isi' => 'admin/driver/index.php',
                   'driver' => $this->driver_model->tmplDriver()
                 );
    $this->load->view('layouts/admin/wrapper', $data);
  }

  public function add(){
    $data = array( 'isi' => 'admin/driver/add.php');
    $this->load->view('layouts/admin/wrapper', $data);
  }

  public function edit($id){
    $where = array('id' => $id);
    $data = array( 'isi' => 'admin/driver/edit.php',
                   'editdriver' => $this->driver_model->edit('sopir', $where)->result()
                 );
    $this->load->view('layouts/admin/wrapper', $data);
  }

  public function save(){
    $this->_set_rules();

    $url = $this->do_upload();
    $nama = $this->input->post('nama_lgkp');
    $tempat = $this->input->post('tempat_lhr');
    $tanggal = $this->input->post('tanggal_lhr');
    $alamat = $this->input->post('alamat');
    $bknGbr = $this->bkn_gmbr();

    if($this->form_validation->run() == TRUE){
      if(in_array($bknGbr, array("jpg", "jpeg", "png"))){
        $this->driver_model->save($nama, $tempat, $tanggal, $alamat, $url);
        $sukses = '<div class="alert alert-success" id="success-alert"> <button type="button" class="close" data-dismiss="alert">x</button><strong>Data berhasil ditambahkan!</strong></div>';
        echo $this->session->set_flashdata('message', $sukses);
        redirect('admin/driver');
      }else{
        echo $this->session->set_flashdata('message', '<div class="alert alert-danger" id="danger-alert"> <button type="button" class="close" data-dismiss="alert">x</button><strong>Data gagal ditambahkan! type file bukan salah satu dari jpg, jpeg atau png.</strong></div>');
      }
    }else{
      echo $this->session->set_flashdata('message', '<div class="alert alert-danger" id="danger-alert"> <button type="button" class="close" data-dismiss="alert">x</button><strong>'.validation_errors().'</strong></div>');
    }
    $data = array( 'isi' => 'admin/driver/add.php');
    $this->load->view('layouts/admin/wrapper', $data);
  }

  public function update(){
    $this->form_validation->set_rules('nama_lgkp', 'Nama Lengkap', 'required');
    $this->form_validation->set_rules('tempat_lhr', 'Tempat Lahir', 'required');
    $this->form_validation->set_rules('tanggal_lhr', 'Tanggal Lahir', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');

    $id = $this->input->post('id');
    $where = $id;
    $nama = $this->input->post('nama_lgkp');
    $tempat = $this->input->post('tempat_lhr');
    $tanggal = $this->input->post('tanggal_lhr');
    $alamat = $this->input->post('alamat');

    $type = explode('.', $_FILES["pas_foto"]["name"]);
    $type = $type[count($type)-1];
    $url = "./img_upload/".uniqid(rand()).'.'.$type;

    if($this->form_validation->run() == TRUE){
      if(is_uploaded_file($_FILES["pas_foto"]["tmp_name"])){
        if(in_array($type, array("jpg", "jpeg", "png"))){
          move_uploaded_file($_FILES["pas_foto"]["tmp_name"], $url);
          $this->driver_model->update($nama, $tempat, $tanggal, $alamat, $url, $where);
          $sukses = $this->session->set_flashdata('message', '<div class="alert alert-success" id="danger-alert"> <button type="button" class="close" data-dismiss="alert">x</button><strong>Data berhasil diubah!</strong></div>');
        }else{
          $sukses = $this->session->set_flashdata('message', '<div class="alert alert-danger" id="danger-alert"> <button type="button" class="close" data-dismiss="alert">x</button><strong>Data gagal diubah! type file gambar bukan salah satu dari jpg, jpeg atau png.</strong></div>');
        }
      }else{
        $url = $this->input->post('gambar');
        $this->driver_model->update($nama, $tempat, $tanggal, $alamat, $url, $where);
        $sukses = $this->session->set_flashdata('message', '<div class="alert alert-success" id="danger-alert"> <button type="button" class="close" data-dismiss="alert">x</button><strong>Data berhasil diubah!</strong></div>');
        
      }
    }else{
      $sukses = $this->session->set_flashdata('message', '<div class="alert alert-danger" id="danger-aler"> <button type="button" class="close" data-dismiss="alert">x</button><strong>'.validation_errors().'</strong></div>');
    }
    redirect('admin/driver');
  }

  public function delete($id){
    $this->driver_model->delete($id);
    echo $this->session->set_flashdata('message', '<div class="alert alert-success" id="danger-alert"> <button type="button" class="close" data-dismiss="alert">x</button><strong>Data berhasil dihapus!</strong></div>');
    redirect('admin/driver');
  }

  private function do_upload(){
    $type = explode('.', $_FILES["pas_foto"]["name"]);
    $type = $type[count($type)-1];
    $url = "./img_upload/".uniqid(rand()).'.'.$type;

    if(in_array($type, array("jpg", "jpeg", "png")))
      if(is_uploaded_file($_FILES["pas_foto"]["tmp_name"]))
        if(move_uploaded_file($_FILES["pas_foto"]["tmp_name"], $url))
          return $url;
    return "";
  }

  private function bkn_gmbr(){
    $type = explode('.', $_FILES["pas_foto"]["name"]);
    $ext= $type[count($type)-1];
    return $ext;
  }

  private function _set_rules(){
    $this->form_validation->set_rules('nama_lgkp', 'Nama Lengkap', 'required');
    $this->form_validation->set_rules('tempat_lhr', 'Tempat Lahir', 'required');
    $this->form_validation->set_rules('tanggal_lhr', 'Tanggal Lahir', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    if (empty($_FILES['pas_foto']['name'])) {
      $this->form_validation->set_rules('pas_foto', 'Pas Foto', 'required');
    }
  }

}
