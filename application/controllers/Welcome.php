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
            'title' => 'CV. New Garuda Jaya Totabuan',
            'content' => 'welcome_message'
        );
		$this->load->view('layouts/wrapper', $data);
	}

    public function kursi_tersedia()
    {
        // fungsi database untuk menampilkan mobil yang tersedia
        $mobil_tersedia = $this->db->get('mobil_tersedia')->result();
        // fungsi database untuk menampilkan harga sewa 
        $kursi_harga = $this->db->get('kursi_harga')->result();

        foreach($mobil_tersedia as $mt) {

            echo'
            <div class="col-md-4 col-sm-12 album-show">';
                // fungsi database untuk menghitung jumlah kursi yang di pesan
                $cek_full = $this->db->get_where('kursi_tersedia', array('plat_nomor' => $mt->plat_nomor, 'status_order' => 1))->num_rows();
                $cek_full2 = $this->db->get_where('kursi_tersedia', array('plat_nomor' => $mt->plat_nomor, 'status_order' => 2))->num_rows();

                // jika jumlah kursi yang dipesan kurang dari 7 maka button pesan akan ditampilkan
                if($cek_full + $cek_full2 < 7){
                    echo '<a href="'.base_url('order/mobil/').strtolower($mt->plat_nomor).'" class="btn btn-primary btn-lg"><span class="fa fa-shopping-cart"></span> Pesan</a>';
                }
                echo'
                <span class="album-light">
                    <div class="card mb-4 mb-12 box-shadow">
                        <img class="card-img-top" src="'.base_url('assets/img/avanza.jpg').'" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap">'; #gambar mobil tersedia

                        // jika total kursi yang dipesan sudah lebih dari 6 maka akan menampilkan gambar sold out
                        if($cek_full > 6){
                            echo '<img class="album-background" src="'.base_url('assets/img/album-background-sold.png').'" alt="" style="width: 180px; z-index: 2000000;">';
                        }

                        echo'
                        <div class="card-body">
                            <span class="card-text font-weight-bold text-dark">
                                <h4 class="text-center">'.$mt->merek.' ('.$mt->plat_nomor.')</h4>
                            </span><br />
                            <h6>
                                <div class="album-background">';
                                    // fungsi database untuk menampilkan kursi yang tersedia
                                    $kursi_tersedia = $this->db->get_where('kursi_tersedia', array('plat_nomor' => $mt->plat_nomor))->result();
                                    // menampilkan button posisi kursi pertama
                                    foreach($kursi_tersedia as $kt){
                                        if($kt->nomor_kursi == 1){
                                            if($kt->status_order == 0)
                                                // jika kursi belum dipesan akan menampilkan button primary
                                                echo '<button class="btn btn-info btn-lg" disabled style="margin: 3px;">'.$kt->nomor_kursi.'</button>'; 
                                            elseif($kt->status_order == 1)
                                                // jika kursi sudah dipesan akan menampilkan button secondary
                                                echo '<button class="btn btn-secondary btn-lg" disabled style="margin: 3px;">'.$kt->nomor_kursi.'</button>'; 
                                            elseif($kt->status_order == 2)
                                                // jika kursi dalam proses pemesanan akan menampilkan button warning
                                                echo '<button class="btn btn-secondary btn-lg" disabled style="margin: 3px;">'.$kt->nomor_kursi.'</button>'; 

                                        }
                                    }
                                    echo '<br>';
                                    // menampilkan button posisi kursi kedua sampai keempat
                                    foreach($kursi_tersedia as $kt){
                                        if(($kt->nomor_kursi > 1)  and ($kt->nomor_kursi < 5)){
                                            if($kt->status_order == 0)
                                                // jika kursi belum dipesan akan menampilkan button primary
                                                echo '<button class="btn btn-info btn-lg" disabled style="margin: 3px;">'.$kt->nomor_kursi.'</button>'; 
                                            elseif($kt->status_order == 1)
                                                // jika kursi sudah dipesan akan menampilkan button secondary
                                                echo '<button class="btn btn-secondary btn-lg" disabled style="margin: 3px;">'.$kt->nomor_kursi.'</button>'; 
                                            elseif($kt->status_order == 2)
                                                // jika kursi dalam proses pemesanan akan menampilkan button warning
                                                echo '<button class="btn btn-secondary btn-lg" disabled style="margin: 3px;">'.$kt->nomor_kursi.'</button>'; 
                                        }
                                    }
                                    echo '<br>';
                                    // menampilkan button posisi kursi kelima sampai ketujuh
                                    foreach($kursi_tersedia as $kt){
                                        if(($kt->nomor_kursi > 4)  and ($kt->nomor_kursi < 8)){
                                            if($kt->status_order == 0)
                                                // jika kursi belum dipesan akan menampilkan button primary
                                                echo '<button class="btn btn-info btn-lg" disabled style="margin: 3px;">'.$kt->nomor_kursi.'</button>'; 
                                            elseif($kt->status_order == 1)
                                                // jika kursi sudah dipesan akan menampilkan button secondary
                                                echo '<button class="btn btn-secondary btn-lg" disabled style="margin: 3px;">'.$kt->nomor_kursi.'</button>'; 
                                            elseif($kt->status_order == 2)
                                                // jika kursi dalam proses pemesanan akan menampilkan button warning
                                                echo '<button class="btn btn-secondary btn-lg" disabled style="margin: 3px;">'.$kt->nomor_kursi.'</button>'; 
                                        }
                                    }
                                echo'
                                </div>';
                                    

                                // menampilkan status nomor kursi
                                foreach($kursi_tersedia as $kt){
                                    echo '&nbsp;&nbsp;<span class="text-secondary"> Kursi '.$kt->nomor_kursi.' : </span>';
                                    if($kt->status_order == 0) 
                                        // jika kursi belum dipesan akan menampilkan checklist berwarna hijau
                                        echo '<span class="fa fa-check text-success" style="margin-bottom: 7px;"></span><br>'; 
                                    elseif($kt->status_order == 1)
                                        // jika kursi sudah dipesan akan menampilkan cross berwarna merah
                                        echo '<span class="fa fa-times text-danger" style="margin-bottom: 7px;"></span><br>' ;
                                    elseif($kt->status_order == 2)
                                        // jika kursi dalam proses pemesanan akan menampilkan cross berwarna merah
                                        echo '<span class="fa fa-exclamation text-warning" style="margin-bottom: 7px;"></span><br>' ;
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
                                <hr>
                                <span class="text-secondary">Ket :</span><br />
                                <span class="fa fa-check text-success"></span> Belum dipesan<br />
                                <span class="fa fa-times text-danger"></span> Sudah dipesan<br />
                                <span class="fa fa-exclamation text-warning"></span> Dalam proses pemesanan
                            </small>
                        </div>
                    </div>
                </span>
            </div>';
        }
    }
}
