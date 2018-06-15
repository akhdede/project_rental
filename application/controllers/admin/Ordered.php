<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ordered extends CI_Controller{

    function __construct(){
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        parent::__construct();

        if($_SESSION['level'] != 1)
        redirect(base_url('user/login'));

        $data = array( 'title' => 'Administrator page',
        'header' => 'ADMINISTRATOR PAGE'
        );
        $this->load->model('admin/ordered_model');
    }

    // start of fungsi list
    public function index(){
        $data = array( 
            'isi' => 'admin/ordered/index.php',
            'ordered' => $this->ordered_model->tampilOrdered(),
            'user' => $this->ordered_model->user(),
            'urai' => $this->ordered_model->uraiGroup(),
            'content_header' => 'CV. NEW GARUDA JAYA TOTABUAN'
        );
        $this->load->view('layouts/admin/wrapper', $data);
    }

    public function count_ordered()
    {
        $count_ordered = $this->db->query("SELECT * FROM order_detail WHERE confirm_by_admin IS NULL and tanggal_pesan IS NOT NULL GROUP BY tanggal_pesan")->num_rows();

        echo $count_ordered;
    }
    public function konfirmasi()
    {
        $kode = $this->uri->segment(4);
        $confirm_value = $this->uri->segment(5);


        if($confirm_value == 'true'){
            $confirm_value = 1;
            $this->db->query("UPDATE kursi_tersedia SET status=1 WHERE kode_pesanan='$kode'");
        }
        if($confirm_value == 'false'){
            $confirm_value = 5;
            $this->db->query("UPDATE kursi_tersedia SET status=0, costumer=NULL, kode_pesanan=NULL WHERE kode_pesanan='$kode'");
        }

        $this->db->where('kode', $kode);
        $sql = $this->db->update('order_detail', array('confirm_by_admin' => $confirm_value));

        if($sql){
            $kode = $this->uri->segment(4);
            $order_pesan = $this->db->query("SELECT * FROM order_detail WHERE kode='$kode'")->result();

            foreach($order_pesan as $op){
                if($op->confirm_by_admin == 5){
                    $kode_pesan = $op->kode;
                    $isi_pesan = 'Pesanan dengan kode <b>'.$op->kode.'.</b> telah kadaluarsa!';
                    $confirm_kode = 5;
                    $tanggal = date('d-m-Y h:i:s');
                    $costumers = $op->costumers;
                }
                elseif($op->confirm_by_admin == 1){
                    $kode_pesan = $op->kode;
                    $isi_pesan = 'Pesanan dengan kode <b>'.$op->kode.'.</b> telah dikonfirmasi! Terimakasih.';
                    $confirm_kode = 1;
                    $tanggal = date('d-m-Y h:i:s');
                    $costumers = $op->costumers;
                    
                }
            }

            $cek_message = $this->db->query("SELECT * FROM order_message WHERE kode='$kode_pesan'")->result_array();

            $array_kode = array();
            $array_confirm = array();

            foreach($cek_message as $cm){
                $array_kode[] = $cm['kode'];
                $array_confirm[] = $cm['confirm_kode'];
            }

            $insert = array(
                'kode' => $kode_pesan,
                'isi_pesan' => $isi_pesan,
                'confirm_kode' => $confirm_kode,
                'tanggal_message' => $tanggal,
                'costumers' => $costumers
            );
        
            if(!in_array($confirm_kode, $array_confirm)){
                $this->db->insert('order_message', $insert);
            }

            $this->db->query("DELETE FROM order_detail WHERE kode='$kode'");
        }


        redirect(base_url('admin/ordered'));
        return true;
    }

    private function add_pesan()
    {
    }
}
