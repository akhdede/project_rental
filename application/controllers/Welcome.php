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
        $mobil_tersedia = $this->db->get('mobil_tersedia')->result();
        $kursi_harga = $this->db->get('kursi_harga')->result();

        foreach($mobil_tersedia as $mt) {

            echo'
            <div class="col-md-4 col-sm-12 album-show">';
                $cek_full = $this->db->get_where('kursi_tersedia', array('plat_nomor' => $mt->plat_nomor, 'status_order' => 1))->num_rows();

                if($cek_full < 7){
                    echo '<a href="'.base_url('order/mobil/').strtolower($mt->plat_nomor).'" class="btn btn-danger btn-lg"><span class="fa fa-shopping-cart"></span> Pesan</a>';
                }
                echo'
                <span class="album-light">
                    <div class="card mb-4 mb-12 box-shadow">
                        <img class="card-img-top" src="'.base_url('assets/img/avanza.jpg').'" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap">';

                        if($cek_full > 6){
                            echo '<img class="album-background" src="'.base_url('assets/img/album-background-sold.png').'" alt="" style="z-index: 20000;">';
                        }

                        echo'
                        <div class="card-body">
                            <span class="card-text font-weight-bold text-dark">
                                <h4 class="text-center">'.$mt->merek.' ('.$mt->plat_nomor.')</h4>
                            </span><br />
                            <h5>
                                <div class="album-background">';
                                    $kursi_tersedia = $this->db->get_where('kursi_tersedia', array('plat_nomor' => $mt->plat_nomor))->result();
                                    foreach($kursi_tersedia as $kt){
                                        if($kt->nomor_kursi == 1){
                                            if($kt->status_order == 0)
                                                echo '<button class="btn btn-primary btn-lg" disabled style="margin: 3px;">'.$kt->nomor_kursi.'</button>'; 
                                            else
                                                echo '<button class="btn btn-secondary btn-lg" disabled style="margin: 3px;">'.$kt->nomor_kursi.'</button>'; 

                                        }
                                    }
                                    echo '<br>';
                                    foreach($kursi_tersedia as $kt){
                                        if(($kt->nomor_kursi > 1)  and ($kt->nomor_kursi < 5)){
                                            if($kt->status_order == 0)
                                                echo '<button class="btn btn-primary btn-lg" disabled style="margin: 3px;">'.$kt->nomor_kursi.'</button>'; 
                                            else
                                                echo '<button class="btn btn-secondary btn-lg" disabled style="margin: 3px;">'.$kt->nomor_kursi.'</button>'; 
                                        }
                                    }
                                    echo '<br>';
                                    foreach($kursi_tersedia as $kt){
                                        if(($kt->nomor_kursi > 4)  and ($kt->nomor_kursi < 8)){
                                            if($kt->status_order == 0)
                                                echo '<button class="btn btn-primary btn-lg" disabled style="margin: 3px;">'.$kt->nomor_kursi.'</button>'; 
                                            else
                                                echo '<button class="btn btn-secondary btn-lg" disabled style="margin: 3px;">'.$kt->nomor_kursi.'</button>'; 
                                        }
                                    }
                                echo'
                                </div>';
                                    

                                foreach($kursi_tersedia as $kt){
                                    echo '&nbsp;&nbsp;<span class="text-secondary"> Kursi '.$kt->nomor_kursi.' : </span>';
                                    if($kt->status_order == 0) 
                                        echo '<span class="fa fa-check text-success"></span><br>'; 
                                    else  
                                        echo '<span class="fa fa-times text-danger"></span><br>' ;
                                }

                            echo'
                            </h5>
                            <br><hr>
                            <small class="text-muted">
                                <span class="text-secondary">Harga sewa : </span><br />';
                                    foreach($kursi_harga as $kh){
                                        echo '<span class="text-secondary">- Kursi '.$kh->posisi.'<i> ( '.$kh->keterangan.' )</i> - Rp.'.number_format("$kh->harga","0",",",".").' </span><br />';
                                    }
                                echo'
                                <hr>
                                <span class="text-secondary">Ket :</span><br />
                                <span class="fa fa-check text-success"></span> Belum dipesan<br />
                                <span class="fa fa-times text-danger"></span> Sudah dipesan
                            </small>
                        </div>
                    </div>
                </span>
            </div>';
        }
    }
}
