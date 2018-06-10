<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Passwd extends CI_Controller {

  function __construct(){
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    parent::__construct();


    $data = array( 'title' => 'Administrator page',
                   'header' => 'ADMINISTRATOR PAGE',
                   'content_header' => 'CV. NEW GARUDA JAYA TOTABUAN'
                 );
    $this->load->view('layout/admin/header', $data);
    $this->load->model('admin/pass_model');
  }

  // start of fungsi change password
  public function index()
  {
    $data = array('isi' => 'admin/passwd/index');
    $this->load->view('layout/admin/wrapper', $data);
  }

  public function update()
  {
    $pass_lama = md5($this->input->post('pass_lama'));
    $pass_baru = md5($this->input->post('pass_baru'));
    $pass_baru_konfirm = md5($this->input->post('pass_baru_konfirm'));

    $u = $this->pass_model->get();
    if($pass_lama == NULL){
      $sukses = '<div class="alert alert-danger" id="success-alert"> <button type="button" class="close" data-dismiss="alert">x</button><strong>Password lama tidak boleh kosong</strong></div>';
      echo $this->session->set_flashdata('message', $sukses);
    }elseif($pass_baru == NULL){
      $sukses = '<div class="alert alert-danger" id="success-alert"> <button type="button" class="close" data-dismiss="alert">x</button><strong>Password baru tidak boleh kosong</strong></div>';
      echo $this->session->set_flashdata('message', $sukses);
    }else{
      foreach($u as $p){
        if($p->password == $pass_lama){
          if($pass_baru == $pass_baru_konfirm){
            $sukses = '<div class="alert alert-success" id="success-alert"> <button type="button" class="close" data-dismiss="alert">x</button><strong>Password berhasil diubah!</strong></div>';
            echo $this->session->set_flashdata('message', $sukses);
            $this->pass_model->update($pass_baru);
          }else{
            $sukses = '<div class="alert alert-danger" id="success-alert"> <button type="button" class="close" data-dismiss="alert">x</button><strong>Password baru tidak sesuai!</strong></div>';
            echo $this->session->set_flashdata('message', $sukses);
          } 
        }
        else{
          $sukses = '<div class="alert alert-danger" id="success-alert"> <button type="button" class="close" data-dismiss="alert">x</button><strong>Password lama tidak sesuai!</strong></div>';
          echo $this->session->set_flashdata('message', $sukses);
        }
      }
    }
    redirect('admin/passwd');
  }

  public function reset()
  {
    $pass_baru = md5('admin');
    $sukses = '<div class="alert alert-success" id="danger-alert"> <button type="button" class="close" data-dismiss="alert">x</button><strong>Password berhasil direset! password baru anda adalah: <b><i>admin</i></b></strong></div>';
    echo $this->session->set_flashdata('message', $sukses);
    $this->pass_model->update($pass_baru);
    redirect('admin/passwd');
  }
}
