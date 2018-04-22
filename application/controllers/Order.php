<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if(!isset($_SESSION['nama_lengkap'])){
            redirect('user/login');
        }
        $data = array(
            'title' => 'CV. New Garuda Jaya Totabuan'
        );
		$this->load->view('layouts/header', $data);
        $this->load->model('order_model');
    }

    public function mobil($plat_nomor)
    {
        $where = array(
            'plat_nomor' => $plat_nomor
        );

        $data = array(
            'content' => 'order/view_order',
            'mobil_order' => $this->order_model->mobil_order($where)->result(),
            'kursi_order' => $this->order_model->kursi_order($where)->result(),
            'kursi_harga' => $this->order_model->kursi_harga()
        );
		$this->load->view('layouts/wrapper', $data);
    }

}

