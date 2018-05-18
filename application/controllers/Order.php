<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        error_reporting(0);
        if(!isset($_SESSION['nama_lengkap']))
            redirect('user/login');

        $list = $this->db->get('mobil_tersedia')->result();

        $plat_nomor = $this->uri->segment(3);

        $cek_full = $this->db->get_where('kursi_tersedia', array('plat_nomor' => $plat_nomor, 'status_order' => 1))->num_rows();

        $cek_full2 = $this->db->get_where('kursi_tersedia', array('plat_nomor' => $plat_nomor, 'status_order' => 2))->num_rows();

        if($cek_full > 6 or $cek_full2 > 6 or $cek_full + $cek_full2 > 6)
            redirect('welcome');

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
        if(empty($url))
            echo 'Mohon maaf, kursi terakhir dalam proses pemesanan. <a href="'.base_url('welcome').'"> Click untuk mereload</a>';
        else{

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
                    <div class="col-md-5 col-sm-12 album-show">
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
                                        <h4 class="text-center">'.$mt->merek.' ('.$mt->plat_nomor.')</h4>
                                    </span>
                                    <h6>
                                        <div class="album-background2">';
                                            // fungsi database untuk menampilkan kursi yang tersedia berdasarkan url yang ditangkap
                                            $kursi_tersedia = $this->db->get_where('kursi_tersedia', array('plat_nomor' => $mt->plat_nomor))->result();
                                            // menampilkan button posisi kursi pertama
                                            foreach($kursi_tersedia as $kt){
                                                if($kt->nomor_kursi == 1){
                                                    if($kt->status_order == 0)
                                                        // jika kursi belum dipesan akan menampilkan button primary
                                                        echo '<button class="btn btn-info btn-md" disabled style="margin: 3px;">'.$kt->nomor_kursi.'</button>'; 
                                                    elseif($kt->status_order == 1)
                                                        // jika kursi sudah dipesan akan menampilkan button secondary
                                                        echo '<button class="btn btn-secondary btn-md" disabled style="margin: 3px;">'.$kt->nomor_kursi.'</button>'; 
                                                    elseif($kt->status_order == 2)
                                                        // jika kursi dalam proses pemesanan akan menampilkan button warning
                                                        echo '<button class="btn btn-secondary btn-md" disabled style="margin: 3px;">'.$kt->nomor_kursi.'</button>'; 

                                                }
                                            }
                                            echo '<br>';
                                            // menampilkan button posisi kursi kedua sampai keempat
                                            foreach($kursi_tersedia as $kt){
                                                if(($kt->nomor_kursi > 1)  and ($kt->nomor_kursi < 5)){
                                                    if($kt->status_order == 0)
                                                        // jika kursi belum dipesan akan menampilkan button primary
                                                        echo '<button class="btn btn-info btn-md" disabled style="margin: 3px;">'.$kt->nomor_kursi.'</button>'; 
                                                    elseif($kt->status_order == 1)
                                                        // jika kursi sudah dipesan akan menampilkan button secondary
                                                        echo '<button class="btn btn-secondary btn-md" disabled style="margin: 3px;">'.$kt->nomor_kursi.'</button>'; 
                                                    elseif($kt->status_order == 2)
                                                        // jika kursi dalam proses pemesanan akan menampilkan button warning
                                                        echo '<button class="btn btn-secondary btn-md" disabled style="margin: 3px;">'.$kt->nomor_kursi.'</button>'; 
                                                }
                                            }
                                            echo '<br>';
                                            // menampilkan button posisi kursi kelima sampai ketujuh
                                            foreach($kursi_tersedia as $kt){
                                                if(($kt->nomor_kursi > 4)  and ($kt->nomor_kursi < 8)){
                                                    if($kt->status_order == 0)
                                                        // jika kursi belum dipesan akan menampilkan button primary
                                                        echo '<button class="btn btn-info btn-md" disabled style="margin: 3px;">'.$kt->nomor_kursi.'</button>'; 
                                                    elseif($kt->status_order == 1)
                                                        // jika kursi sudah dipesan akan menampilkan button secondary
                                                        echo '<button class="btn btn-secondary btn-md" disabled style="margin: 3px;">'.$kt->nomor_kursi.'</button>'; 
                                                    elseif($kt->status_order == 2)
                                                        // jika kursi dalam proses pemesanan akan menampilkan button warning
                                                        echo '<button class="btn btn-secondary btn-md" disabled style="margin: 3px;">'.$kt->nomor_kursi.'</button>'; 
                                                }
                                            }
                                        echo'
                                        </div>';

                                        // menampilkan status nomor kursi
                                        foreach($kursi_tersedia as $kt){
                                            if($kt->status_order == 0) 
                                                // jika kursi belum dipesan akan menampilkan checklist berwarna hijau dan button primary pesan
                                                echo '<span  class="text-secondary">Kursi '.$kt->nomor_kursi.' <a class="btn btn-info btn-sm" href="'.base_url('order/mobil/').strtolower($mt->plat_nomor).'/'.$kt->nomor_kursi.'" onclick="pesan_kursi()" style="margin-bottom: 3px;">pesan sekarang</a></span> <i class="fa fa-check text-success"></i><br />'; 
                                            elseif($kt->status_order == 1)
                                                // jika kursi sudah dipesan akan menampilkan cross berwarna merah dan button secondary dipesan
                                                echo '<span  class="text-secondary">Kursi '.$kt->nomor_kursi.' <b><span class="btn btn-secondary btn-sm disabled" style="margin-bottom: 3px;">sudah dipesan</span></b></span> <i class="fa fa-times text-danger"></i><br />'; 
                                            elseif($kt->status_order == 2)
                                                // jika kursi dalam proses pemesanan akan menampilkan exclamation berwarna kuning dan button secondary dipesan
                                                echo '<span  class="text-secondary">Kursi '.$kt->nomor_kursi.' <b><span class="btn btn-secondary btn-sm disabled" style="margin-bottom: 3px;">dalam proses</span></b></span> <i class="fa fa-exclamation text-warning"></i><br />'; 
                                        }
                                    echo'
                                    </h6>
                                </div>
                            </div>
                        </span>
                    </div>
                </div>';
            }

            // tambah pesanan
            $mobil = $this->uri->segment(3);
            $kursi = $this->uri->segment(4);

            $kursi_array[] = array(1, 2, 3, 4, 5, 6, 7);
            
            echo $kursi_array;


            // view pesanan
            $email = $_SESSION['email'];
            $order = $this->db->get_where('order_detail', array('costumers' => $email))->result();
            $total = $this->db->query("SELECT SUM(harga) as harga FROM order_detail WHERE costumers = '$email'")->result();

            echo'
            <div class="col-md-12">
                <div class="col-md-7 col-sm-12 album-show">
                    <hr>
                    <h5 class="font-weight-bold">DAFTAR PESANAN</h5>
                    <hr>
                    <table class="table table-bordered">
                      <thead>
                        <tr class="font-weight-bold">
                          <td width=300>Plat Nomor</td>
                          <td width=300>Nomor Kursi</td>
                          <td width=300>Harga</td>
                        </tr>
                      </thead>';
                      foreach($order as $o){
                        echo'
                        <tbody>
                          <tr>
                            <td>'.$o->plat_nomor.'</td>
                            <td>'.$o->nomor_kursi.'</td>
                            <td>Rp. '.number_format("$o->harga","0",",",".").'</td>
                          </tr>
                        </tbody>';
                      }
                        echo'
                        <tr>
                          <td class="text-center" colspan=2><b>Total Bayar</b></td>
                          <td><b>Rp. '.number_format($total[0]->harga,"0",",",".").'</b></td>
                        </tr>
                    </table>';
            echo'
                <a href="#" class="btn btn-success text-right">Bayar</a>
                </div>
            </div>';
        }
    }

}
