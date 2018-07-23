<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller {

  function __construct(){
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    parent::__construct();

    if($_SESSION['level'] != 1)
        redirect(base_url('user/login'));

    $this->load->model('admin/download_model');
    date_default_timezone_set('Asia/Makassar');
  }

  // start of fungsi list
  public function index(){
    $laporan = $this->input->post('laporan');
    $tanggal = $this->input->post('tanggal');
    $bulan = $this->input->post('bulan');
    $tahun = $this->input->post('tahun');

    $tanggal_sekarang = $tanggal.'-'.$bulan.'-'.$tahun;

    if(isset($laporan)){
        if(empty($tanggal)){
            echo 'Field tanggal tidak boleh kosong!';
        }
        elseif(empty($bulan)){
            echo 'Field bulan tidak boleh kosong!';
        }
        elseif(empty($tahun)){
            echo 'Field tahun tidak boleh kosong!';
        }
        elseif(empty($tanggal_sekarang)){
            echo 'Harap mengisi tangal, bulan dan tahun laporan!';
        }
        else{
            $data = array( 
               'tanggal_sekarang' => $tanggal_sekarang,
               'isi' => 'admin/download/index.php',
               'download' => $this->download_model->download($tanggal_sekarang),
               'total' => $this->download_model->total($tanggal_sekarang)
             );
            $this->load->view('layouts/admin/wrapper_download', $data);
        }
    }
    else{
        echo '<h2>Page Not Found</h2>';
    }
  }

}

