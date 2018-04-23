<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if(!isset($_SESSION['nama_lengkap']))
            redirect('user/login');

        $list = $this->db->get('mobil_tersedia')->result();

        $this->load->model('order_model');
    }

    public function mobil($plat_nomor)
    {

        $data = array(
            'title' => 'CV. New Garuda Jaya Totabuan',
            'content' => 'order/view_order'
        );
		$this->load->view('layouts/wrapper', $data);
    }

    public function kursi_order($url)
    {
        $where = array('plat_nomor' => $url);
        $where2 = array(
            'plat_nomor' => $url,
            'status_order' => 1
        );
        $mobil_tersedia = $this->db->get_where('mobil_tersedia', $where)->result();
        $kursi_harga = $this->db->get('kursi_harga')->result();

        foreach($mobil_tersedia as $mt) {

            echo'
            <div class="col-md-8 col-sm-12 album-show">';
                echo'
                <span class="album-light">
                    <div class="card mb-4 mb-12 box-shadow">
                        <img class="card-img-top" src="'.base_url('assets/img/avanza.jpg').'" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap">';
                        $cek_full = $this->db->get_where('kursi_tersedia', $where2)->num_rows();
                        if($cek_full < 7){
                            echo '<img class="album-background2" src="'.base_url('assets/img/album-background.png').'" alt="">';
                        }else{
                            echo '<img class="album-background2" src="'.base_url('assets/img/album-background-sold.png').'" alt="">';
                        }
                        echo'
                        <div class="card-body">
                            <span class="card-text font-weight-bold text-dark">
                                <h2 class="text-center">'.$mt->merek.' ('.$mt->plat_nomor.')</h2>
                            </span><br />
                            <h5>';
                                $kursi_tersedia = $this->db->get_where('kursi_tersedia', array('plat_nomor' => $mt->plat_nomor))->result();
                                foreach($kursi_tersedia as $kt){
                                    echo '&nbsp;&nbsp;<span class="text-secondary"> Kursi '.$kt->nomor_kursi.' : </span>';
                                    if($kt->status_order == 0) 
                                        echo '<span class="fa fa-check text-success"></span> <button class="btn btn-primary btn-sm" style="margin-bottom: 5px;">pesan</button><br>'; 
                                    else  
                                        echo '<span class="fa fa-times text-danger"></span> <button class="btn btn-secondary btn-sm" disabled style="margin-bottom: 5px;">dipesan</button><br>' ;
                                }

                            echo'
                            </h5>
                            <hr>
                            <small class="text-muted">
                                <span class="text-secondary">Harga sewa : </span><br />';
                                    foreach($kursi_harga as $kh){
                                        echo '<span class="text-secondary">- Kursi '.$kh->posisi.'<i> ( '.$kh->keterangan.' )</i> - Rp.'.number_format("$kh->harga","0",",",".").' </span><br />';
                                    }
                            echo'
                            </small>
                        </div>
                    </div>
                </span>
            </div>';
        }
    }

}

