<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
    $this->load->model('admin/dashboard_model');
    date_default_timezone_set('Asia/Makassar');
  }

  // start of fungsi list
  public function index(){
    $data = array( 'isi' => 'admin/dashboard/dashboard.php',
                   'jmlMbl' => $this->dashboard_model->jmlMbl(),
                   'jmlMblTersedia' => $this->dashboard_model->jmlMblTersedia(),
                   'jmlMblJalan' => $this->dashboard_model->jmlMblJalan(),
                   'jmldriver' => $this->dashboard_model->jmldriver()
                 );
    $this->load->view('layouts/admin/wrapper', $data);

    $backup = $this->input->post('backup');
    $new = $this->input->post('new');

    if($backup){
      backup();
    }
  }

  public function backup()
  {
    $data = array( 'isi' => 'admin/dashboard/dashboard.php',
                   'jmlMbl' => $this->dashboard_model->jmlMbl(),
                   'jmlMblTersedia' => $this->dashboard_model->jmlMblTersedia(),
                   'jmlMblJalan' => $this->dashboard_model->jmlMblJalan(),
                   'jmldriver' => $this->dashboard_model->jmldriver()
                 );
    $this->load->view('layouts/admin/wrapper', $data);
    $this->backup_action();
  }

  private function backup_action(){
		$this->load->dbutil();

		$prefs = array( 'format'      => 'zip',             
                    'filename'    => 'db-rental-backup.sql'
                  );


		$backup =& $this->dbutil->backup($prefs); 

		$db_name = 'backup-on-'. date("d-m-Y-H-i-s") .'.zip';
    $save = '/home/dee/rental/backup/'.$db_name;

		write_file($save, $backup); 
  }

}
