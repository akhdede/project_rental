<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('welcome_model');
    }

	public function index()
	{
        $data = array(
            'content' => 'welcome_message',
            'mobil_tersedia' => $this->welcome_model->mobil_tersedia(),
            'kursi_tersedia' => $this->welcome_model->kursi_tersedia(),
            'kursi_harga' => $this->welcome_model->kursi_harga()
        );
		$this->load->view('layouts/wrapper', $data);
	}
}
