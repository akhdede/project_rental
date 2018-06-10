<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller {

  function __construct(){
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    parent::__construct();

    $this->load->model('admin/download_model');
  }

  // start of fungsi list
  public function index(){
    $data = array( 'isi' => 'admin/download/index.php',
                   'download' => $this->download_model->download(),
                   'total' => $this->download_model->total()
                 );
    $this->load->view('layout/admin/wrapper_download', $data);

  }

}

