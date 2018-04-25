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
        // menangkap plat nomor pada url
        $where = array('plat_nomor' => $url);
        $where2 = array(
            'plat_nomor' => $url,
            'status_order' => 1
        );

        // fungsi database untuk menampilkan mobil yang tersedia berdasarkan url yang ditangkap
        $mobil_tersedia = $this->db->get_where('mobil_tersedia', $where)->result();

        // fungsi database untuk menampilkan harga sewa
        $kursi_harga = $this->db->get('kursi_harga')->result();

        foreach($mobil_tersedia as $mt) {

            echo'
            <div class="col-md-12">
                <div class="col-md-8 col-sm-12 album-show">
                    <span class="album-light">
                        <div class="card mb-4 mb-12 box-shadow">
                            <img class="card-img-top" src="'.base_url('assets/img/avanza.jpg').'" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap">';
                            // fungsi database untuk menghitung jumlah kursi yang dipesan berdasarkan url yang ditangkap
                            $cek_full = $this->db->get_where('kursi_tersedia', $where2)->num_rows();
                            // jika total kursi yang dipesan lebih dari 6 maka akan menampilkan gambar sold out
                            if($cek_full > 6){
                                echo '<img class="album-background2" src="'.base_url('assets/img/album-background-sold.png').'" alt="" style="z-index: 2000000;">';
                            }
                            echo'
                            <div class="card-body">
                                <span class="card-text font-weight-bold text-dark">
                                    <h2 class="text-center">'.$mt->merek.' ('.$mt->plat_nomor.')</h2>
                                </span><br />
                                <h6>
                                    <div class="album-background2">';
                                        // fungsi database untuk menampilkan kursi yang tersedia berdasarkan url yang ditangkap
                                        $kursi_tersedia = $this->db->get_where('kursi_tersedia', array('plat_nomor' => $mt->plat_nomor))->result();
                                        // menampilkan button posisi kursi pertama
                                        foreach($kursi_tersedia as $kt){
                                            if($kt->nomor_kursi == 1){
                                                if($kt->status_order == 0)
                                                    // jika kursi belum dipesan akan menampilkan button primary
                                                    echo '<button class="btn btn-primary btn-lg" disabled style="margin: 3px;">'.$kt->nomor_kursi.'</button>'; 
                                                else
                                                    // jika kursi sudah dipesan akan menampilkan button secondary
                                                    echo '<button class="btn btn-secondary btn-lg" disabled style="margin: 3px;">'.$kt->nomor_kursi.'</button>'; 

                                            }
                                        }
                                        echo '<br>';
                                        // menampilkan button posisi kursi kedua sampai keempat
                                        foreach($kursi_tersedia as $kt){
                                            if(($kt->nomor_kursi > 1)  and ($kt->nomor_kursi < 5)){
                                                if($kt->status_order == 0)
                                                    // jika kursi belum dipesan akan menampilkan button primary
                                                    echo '<button class="btn btn-primary btn-lg" disabled style="margin: 3px;">'.$kt->nomor_kursi.'</button>'; 
                                                else
                                                    // jika kursi sudah dipesan akan menampilkan button secondary
                                                    echo '<button class="btn btn-secondary btn-lg" disabled style="margin: 3px;">'.$kt->nomor_kursi.'</button>'; 
                                            }
                                        }
                                        echo '<br>';
                                        // menampilkan button posisi kursi kelima sampai ketujuh
                                        foreach($kursi_tersedia as $kt){
                                            if(($kt->nomor_kursi > 4)  and ($kt->nomor_kursi < 8)){
                                                if($kt->status_order == 0)
                                                    // jika kursi belum dipesan akan menampilkan button primary
                                                    echo '<button class="btn btn-primary btn-lg" disabled style="margin: 3px;">'.$kt->nomor_kursi.'</button>'; 
                                                else
                                                    // jika kursi sudah dipesan akan menampilkan button secondary
                                                    echo '<button class="btn btn-secondary btn-lg" disabled style="margin: 3px;">'.$kt->nomor_kursi.'</button>'; 
                                            }
                                        }
                                    echo'
                                    </div>';

                                    // menampilkan status nomor kursi
                                    foreach($kursi_tersedia as $kt){
                                        echo '&nbsp;&nbsp;<span class="text-secondary"> Kursi '.$kt->nomor_kursi.' : </span>';
                                        if($kt->status_order == 0) 
                                            // jika kursi belum dipesan akan menampilkan checklist berwarna hijau dan button primary pesan
                                            echo '<span class="fa fa-check text-success"></span> <button class="btn btn-primary btn-sm" style="margin-bottom: 3px;">pesan</button><br>'; 
                                        else  
                                            // jika kursi sudah dipesan akan menampilkan cross berwarna merah dan button secondary dipesan
                                            echo '<span class="fa fa-times text-danger"></span> <button class="btn btn-secondary btn-sm" disabled style="margin-bottom: 3px;">dipesan</button><br>' ;
                                    }

                                echo'
                                </h6>
                                <hr>
                                <small class="text-muted">
                                    <span class="text-secondary">Harga sewa : </span><br />';
                                        // menampilkan keterangan harga sewa
                                        foreach($kursi_harga as $kh){
                                            echo '<span class="text-secondary">- Kursi '.$kh->posisi.'<i> ( '.$kh->keterangan.' )</i> - Rp.'.number_format("$kh->harga","0",",",".").' </span><br />';
                                        }
                                echo'
                                </small>
                            </div>
                        </div>
                    </span>
                </div>
            </div>';
        }

        echo'
        <div class="col-md-12">
            <div class="col-md-4 col-sm-12 album-show">
                hahaha
            </div>
        </div>';
    }

}

