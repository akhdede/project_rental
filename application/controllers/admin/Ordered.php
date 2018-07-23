<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ordered extends CI_Controller{

    function __construct(){
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        parent::__construct();

        if($_SESSION['level'] != 1)
        redirect(base_url('user/login'));

        $this->load->model('admin/ordered_model');
        date_default_timezone_set('Asia/Makassar');
    }

    // start of fungsi list
    public function index(){
        $kode = $this->input->post('filter');
        $session_kode = $_SESSION[$kode];
        $data = array( 
            'isi' => 'admin/ordered/index.php',
            'ordered' => $this->ordered_model->tampilOrdered(),
            'filter' => $this->ordered_model->filterOrdered($kode),
            'user' => $this->ordered_model->user(),
            'urai' => $this->ordered_model->uraiGroup(),
            'title' => 'Administrator page',
            'header' => 'ADMINISTRATOR PAGE',
            'content_header' => 'CV. NEW GARUDA TOTABUAN'
        );
        $this->load->view('layouts/admin/wrapper', $data);
    }

    public function count_ordered()
    {
        $count_ordered = $this->db->query("SELECT * FROM order_detail WHERE confirm_by_admin=2 and tanggal_pesan IS NOT NULL GROUP BY tanggal_pesan")->num_rows();

        echo $count_ordered;
    }

    public function konfirmasi()
    {
        $kode = $this->uri->segment(4);
        $confirm_value = $this->uri->segment(5);
        $tanggal_confirm = date('d-m-Y h:i:s');

        if($confirm_value == 'true'){
            $confirm_value = 1;

            $cek = $this->db->query("SELECT * FROM order_detail WHERE kode='$kode' and confirm_by_admin=2")->num_rows();
            if($cek > 0){
                $this->db->query("UPDATE order_detail SET confirm_by_admin=1, tanggal_confirm='$tanggal_confirm' WHERE kode='$kode'");

                // update kursi tersedia status
                $this->db->query("UPDATE kursi_tersedia SET status=1 WHERE kode_pesanan='$kode'");

                // insert data di message
                $order_detail_cek = $this->db->query("SELECT * FROM order_detail WHERE kode='$kode' and confirm_by_admin=1");
                $costumers = $order_detail_cek->result();

                if($order_detail_cek->num_rows() > 0){
                    $insert = array(
                        'kode' => $kode,
                        'isi_pesan' => 'Pesanan dengan kode <b>'.$kode.'</b> telah dikonfirmasi! Terimakasih.',
                        'costumers' => $costumers[0]->costumers,
                        'tanggal_message' => date('d-m-Y h:i:s'),
                        'confirm_kode' => 1,
                        'message_status' => 0
                    );
                    $this->db->insert('order_message', $insert);
                }
            }
        }
        if($confirm_value == 'false'){
            $confirm_value = 0;

            $cek = $this->db->query("SELECT * FROM order_detail WHERE kode='$kode' and confirm_by_admin=2")->num_rows();
            if($cek > 0){
                $this->db->query("UPDATE kursi_tersedia SET status=0 WHERE kode_pesanan='$kode'");

                // insert data di message
                $order_detail_cek = $this->db->query("SELECT * FROM order_detail WHERE kode='$kode' and confirm_by_admin=2");
                $costumers = $order_detail_cek->result();

                if($order_detail_cek->num_rows() > 0){
                    $insert = array(
                        'kode' => $kode,
                        'isi_pesan' => 'Pesanan dengan kode <b>'.$kode.'</b> telah kadaluarsa!',
                        'costumers' => $costumers[0]->costumers,
                        'tanggal_message' => date('d-m-Y h:i:s'),
                        'confirm_kode' => 0,
                        'message_status' => 0
                    );
                    $this->db->insert('order_message', $insert);

                    // delete order detail
                    $this->db->query("DELETE FROM order_detail WHERE kode='$kode' and confirm_by_admin=2");
                }
            }
        }
        redirect('admin/ordered');
        return true;
    }
}
