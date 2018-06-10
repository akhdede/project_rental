<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lists extends CI_Controller {

  function __construct(){
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    parent::__construct();

    $data = array( 'title' => 'Administrator page',
                   'header' => 'ADMINISTRATOR PAGE',
                   'content_header' => 'CV. NEW GARUDA JAYA TOTABUAN'
                 );
    $this->load->view('layout/admin/header', $data);
    $this->load->model('admin/list_model');
  }

  // start of fungsi list
	public function index()
	{
    $jumlah_data = $this->list_model->jumlah_data();
    $config['base_url'] = base_url().'admin/lists/index/';
    $config['first_url'] = '0';
    $config['total_rows'] = $jumlah_data;
    $config['per_page'] = 5;
    $config['full_tag_open'] = '<div><ul class="pagination pagination-small pagination-centered">';
    $config['full_tag_close'] = '</ul></div>';

    $config['first_link'] = '&laquo; First';
    $config['first_tag_open'] = '<li class="prev page">';
    $config['first_tag_close'] = '</li>';

    $config['last_link'] = 'Last &raquo;';
    $config['last_tag_open'] = '<li class="next page">';
    $config['last_tag_close'] = '</li>';

    $config['next_link'] = 'Next &rarr;';
    $config['next_tag_open'] = '<li class="next page">';
    $config['next_tag_close'] = '</li>';

    $config['prev_link'] = '&larr; Previous';
    $config['prev_tag_open'] = '<li class="prev page">';
    $config['prev_tag_close'] = '</li>';

    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';

    $config['num_tag_open'] = '<li class="page">';
    $config['num_tag_close'] = '</li>';
    if($this->input->post('by') == NULL){
      $by = FALSE;
    }else{
      $by = $this->input->post('by');
    }
    $this->pagination->initialize($config);
    $from = $this->uri->segment(4);
    $data = array( 'isi' => 'admin/list/list.php',
                   'listMbl' => $this->list_model->data($config['per_page'],$from),
                   'filterMbl' => $this->list_model->filter($by),
                   'cData' => $this->list_model->cData(),
                   'found' => $this->list_model->found($by),
                   'error' => ' '
                 );
    $this->load->view('layout/admin/wrapper', $data);
	}

  public function edit($id){
    $where = array('id' => $id);
    $data = array( 'isi' => 'admin/list/edit_list.php',
                   'editList' => $this->list_model->edit('mobil_details', $where)->result()
                 );
    $this->load->view('layout/admin/wrapper', $data);
  }

  public function update(){
    $this->form_validation->set_rules('plat', 'Plat no.', 'required');
    $this->form_validation->set_rules('merek', 'Merek', 'required');

    $id = $this->input->post('id');
    $where = $id;
    $plat = $this->input->post('plat');
    $plat_no = str_replace(' ','',$plat);
    $merek = $this->input->post('merek');

    $type = explode('.', $_FILES["img"]["name"]);
    $type = $type[count($type)-1];
    $url = "./img_upload/".uniqid(rand()).'.'.$type;

    if($this->form_validation->run() == TRUE){
      if(is_uploaded_file($_FILES["img"]["tmp_name"])){
        if(in_array($type, array("jpg", "jpeg", "png"))){
          move_uploaded_file($_FILES["img"]["tmp_name"], $url);
          $this->list_model->update($plat_no, $merek, $url, $where);
          $sukses = $this->session->set_flashdata('message', '<div class="alert alert-success" id="danger-alert"> <button type="button" class="close" data-dismiss="alert">x</button><strong>Data berhasil diubah!</strong></div>');
        }else{
          $sukses = $this->session->set_flashdata('message', '<div class="alert alert-danger" id="danger-alert"> <button type="button" class="close" data-dismiss="alert">x</button><strong>Data gagal diubah! type file gambar bukan salah satu dari jpg, jpeg atau png.</strong></div>');
        }
      }else{
        $url = $this->input->post('gambar');
        $this->list_model->update($plat_no, $merek, $url, $where);
        $sukses = $this->session->set_flashdata('message', '<div class="alert alert-success" id="danger-alert"> <button type="button" class="close" data-dismiss="alert">x</button><strong>Data berhasil diubah!</strong></div>');
        
      }
    }else{
      $sukses = $this->session->set_flashdata('message', '<div class="alert alert-danger" id="danger-aler"> <button type="button" class="close" data-dismiss="alert">x</button><strong>'.validation_errors().'</strong></div>');
    }
    redirect('admin/lists');
  }

  public function delete($id){
    $this->list_model->delete($id);
    echo $this->session->set_flashdata('message', '<div class="alert alert-success" id="danger-alert"> <button type="button" class="close" data-dismiss="alert">x</button><strong>Data berhasil dihapus!</strong></div>');
    redirect('admin/lists/index/0');
  }

  public function save(){
    $this->_set_rules();

    $url = $this->do_upload();
    $plat = $this->input->post('plat');
    $plat_nomor = str_replace(' ','',$plat);
    $merek = $this->input->post('merek');
    $bknGbr = $this->bkn_gmbr();

    $cekData = $this->list_model->cekData($plat_nomor);
    if($cekData > 0){
      $sukses = '<div class="alert alert-danger" id="success-alert"> <button type="button" class="close" data-dismiss="alert">x</button><strong>Mobil sudah ada di database!</strong></div>';
      echo $this->session->set_flashdata('message', $sukses);
    }else{
      if($this->form_validation->run() == TRUE){
        if(in_array($bknGbr, array("jpg", "jpeg", "png"))){
          $this->list_model->save($plat_nomor, $merek, $url);
          $sukses = '<div class="alert alert-success" id="success-alert"> <button type="button" class="close" data-dismiss="alert">x</button><strong>Data berhasil ditambahkan!</strong></div>';
          echo $this->session->set_flashdata('message', $sukses);
        }else{
          echo $this->session->set_flashdata('message', '<div class="alert alert-danger" id="danger-alert"> <button type="button" class="close" data-dismiss="alert">x</button><strong>Data gagal ditambahkan! type file bukan salah satu dari jpg, jpeg atau png.</strong></div>');
        }
      }else{
        echo $this->session->set_flashdata('message', '<div class="alert alert-danger" id="danger-alert"> <button type="button" class="close" data-dismiss="alert">x</button><strong>'.validation_errors().'</strong></div>');
      }
    }
    redirect('admin/lists');
  }

  private function do_upload(){
    $type = explode('.', $_FILES["img"]["name"]);
    $type = $type[count($type)-1];
    $url = "./img_upload/".uniqid(rand()).'.'.$type;


    if(in_array($type, array("jpg", "jpeg", "png"))){
        if(is_uploaded_file($_FILES["img"]["tmp_name"])){
            if(move_uploaded_file($_FILES["img"]["tmp_name"], $url)){
                return $url;
            }
        }
    }
    return "";
  }

  private function bkn_gmbr(){
    $type = explode('.', $_FILES["img"]["name"]);
    $ext= $type[count($type)-1];
    return $ext;
  }

  private function _set_rules(){
    $this->form_validation->set_rules('plat', 'Plat no.', 'required');
    $this->form_validation->set_rules('merek', 'Merek', 'required');
    if (empty($_FILES['img']['name'])) {
      $this->form_validation->set_rules('img', 'Gambar', 'required');
    }
  }

  // end of fungsi list
}
