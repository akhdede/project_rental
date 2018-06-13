<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ordered extends CI_Controller {

  function __construct(){
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    parent::__construct();

    if($_SESSION['level'] != 1)
        redirect(base_url('user/login'));

    $data = array( 'title' => 'Administrator page',
                   'header' => 'ADMINISTRATOR PAGE'
                 );
    $this->load->model('admin/driver_model');
  }

      // start of fungsi list
  public function index(){
    $data = array( 'isi' => 'admin/driver/index.php',
                   'driver' => $this->driver_model->tmplDriver(),
                   'content_header' => 'CV. NEW GARUDA JAYA TOTABUAN'
                 );
    $this->load->view('layouts/admin/wrapper', $data);
  }

    public function count_ordered()
    {
        $count_ordered = $this->db->query("SELECT * FROM order_detail WHERE confirm_by_admin=0 and tanggal_pesan IS NOT NULL GROUP BY tanggal_pesan")->num_rows();

        echo $count_ordered;
    }



}
