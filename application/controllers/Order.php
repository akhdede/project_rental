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

        // if($cek_full > 6 or $cek_full2 > 6 or $cek_full + $cek_full2 > 6)
        //     redirect('welcome');

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
                                                echo '<span  class="text-secondary">Kursi '.$kt->nomor_kursi.' <a class="btn btn-info btn-sm" href="'.base_url('order/mobil/').strtolower($mt->plat_nomor).'/'.$kt->nomor_kursi.'/add" onclick="pesan_kursi()" style="margin-bottom: 3px;">pesan sekarang</a></span> <i class="fa fa-check text-success"></i><br />'; 
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

            // tambah pesanan
            $mobil = $this->uri->segment(3);
            $kursi = $this->uri->segment(4);
            $aksi = $this->uri->segment(5);


            $email = $_SESSION['email'];

            $kursi_array = [1, 2, 3, 4, 5, 6, 7];
            
            if($kursi != null){
              if(in_array($kursi, $kursi_array)) {

                if($kursi == 1)
                  $harga = 120000;
                elseif($kursi == 2 or $kursi == 3 or $kursi == 4)
                  $harga = 110000;
                elseif($kursi == 5 or $kursi == 6 or $kursi == 7)
                  $harga = 100000;


                $insert_data = array(
                  'plat_nomor' => strtoupper($mobil),
                  'nomor_kursi' => $kursi,
                  'costumers' => $email,
                  'harga' => $harga,
                );

                $cek_kursi = $this->db->get_where('order_detail', array('plat_nomor' => $mobil, 'nomor_kursi' => $kursi))->result();

                if(count($cek_kursi) < 1)
                    if($aksi == 'add'){
                        if($this->db->insert('order_detail', $insert_data))
                            $this->db->query("UPDATE kursi_tersedia SET status_order=2 WHERE plat_nomor='$mobil' and nomor_kursi='$kursi'");
                    }
              }
              else {
                echo '<span class="text-danger">Nomor kursi tidak tersedia!</span>';
              }
            }

            //delete pesanan
            if($aksi == 'delete')
                if($this->db->delete('order_detail', array('plat_nomor' => $mobil, 'nomor_kursi' => $kursi)))
                    $this->db->query("UPDATE kursi_tersedia SET status_order=0 WHERE plat_nomor='$mobil' and nomor_kursi='$kursi'");


            // view pesanan
            $email = $_SESSION['email'];
            $order = $this->db->get_where('order_detail', array('costumers' => $email, 'is_proses' => 0))->result();
            $total = $this->db->query("SELECT SUM(harga) as harga FROM order_detail WHERE costumers = '$email' and kode is null")->result();

            if(!empty($order[0]->costumers)){
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
                              <td width>Hapus</td>
                            </tr>
                          </thead>';
                          foreach($order as $o){
                            echo'
                            <tbody>
                              <tr>
                                <td>'.$o->plat_nomor.'</td>
                                <td>'.$o->nomor_kursi.'</td>
                                <td>Rp. '.number_format("$o->harga","0",",",".").'</td>
                                <td align="center"><a  onclick="javascript: return confirm(\'Apakah anda akan menghapus pesanan ini?\')" href="'.base_url('order/mobil/').strtolower($o->plat_nomor).'/'.$o->nomor_kursi.'/delete"><span class="fa fa-trash"></span></a></td>
                              </tr>
                            </tbody>';
                          }
                            echo'
                            <tr>
                            <td class="text-center" colspan=2><b>Total Bayar</b></td>';
                            foreach($total as $t){
                                if($t->tanggal_pesan == null){
                                    echo '<td><b>Rp. '.number_format($t->harga,"0",",",".").'</b></td>';
                                }
                            }
                            echo '
                            </tr>
                        </table>';
                echo'
                    <a href="'.base_url('order/confirm_order').'" class="btn btn-success text-right">Lanjut keproses pembayaran</a>
                    </div>
                </div>';
            }
            else{
                echo'
                <div class="col-md-12">
                    <div class="col-md-7 col-sm-12 album-show">
                        <h5>Anda belum melakukan pemesanan, silahkan klik tombol \'<b>pesan sekarang</b>\' untuk memesan kursi.</h5>
                    </div>
                </div>';
            }
        }
    }

    public function confirm_order()
    {
        $where = array(
            'costumers' => $_SESSION['email'],
            'is_proses' => 1,
            'confirm_by_admin' => 0
        );

        $email = $_SESSION['email'];

        $ada = $this->db->query("SELECT kode, tanggal_pesan FROM order_detail WHERE costumers='$email' and tanggal_pesan IS NULL LIMIT 1")->result();
        
        $us = $this->db->query("SELECT id FROM users WHERE email='$email'")->result();
        $no = $us[0]->id;
        $kode = date('ymdhis').sprintf("%02s",$no);

        $tanggal = date('d-m-Y h:i:s');


        if($ada[0]->tanggal_pesan == null){
            $cek = $this->db->query("SELECT * FROM order_detail WHERE costumers='$email'")->num_rows();

            if($cek > 0){
                $query = $this->db->query("UPDATE order_detail SET kode='$kode', tanggal_pesan='$tanggal', is_proses=1 WHERE costumers='$email' and tanggal_pesan IS NULL");
                if($query)
                    $this->add_pesan();
            }
            else{
                redirect('welcome');
            }
        }


        $data = array(
            'title' => 'CV. New Garuda Jaya Totabuan',
            'content' => 'order/confirm_order',
            'bayar' => $this->order_model->confirm_order($where),
            'group_order' => $this->order_model->group_order($where),
            'get_kode' => $this->order_model->get_kode($where),
            'total' => $this->order_model->total_bayar($email)
        );
		$this->load->view('layouts/wrapper', $data);
    }

    public function cancel_order()
    {
        $kode = $this->uri->segment(3);

        $this->db->query("UPDATE order_detail SET confirm_by_admin=3 WHERE kode='$kode'");

        $this->add_pesan();
        
        $this->order_model->cancel_order($kode);

        redirect('order/confirm_order');
    }

    public function count_order()
    {
        $email = $_SESSION['email'];
        $count_order = $this->db->query("SELECT * FROM order_detail WHERE costumers='$email' and confirm_by_admin=0 and tanggal_pesan IS NOT NULL GROUP BY tanggal_pesan")->num_rows();

        echo '('.$count_order.')';
    }

    public function link_order()
    {
        $email = $_SESSION['email'];
        $link_order = $this->db->query("SELECT * FROM order_detail WHERE costumers='$email' and confirm_by_admin=0 and tanggal_pesan IS NOT NULL GROUP BY tanggal_pesan");
        $total = $this->db->query("SELECT SUM(harga) as harga, kode, tanggal_pesan FROM order_detail WHERE costumers = '$email' and tanggal_pesan IS NOT NULL GROUP BY tanggal_pesan")->result();

        if($link_order->num_rows() > 0){
            foreach($link_order->result() as $lo){
                foreach($total as $t){
                    if($lo->kode == $t->kode){
                    $tanggal_pesan = $t->tanggal_pesan;

                    $tanggal = substr($tanggal_pesan, 0, 2);
                    $tahun = substr($tanggal_pesan, 6, 4);
                    $jam = substr($tanggal_pesan, 11, 2);
                    $menit = substr($tanggal_pesan, 14, 2);

                    $bulan = substr($tanggal_pesan, 3, 2);

                    switch($bulan){
                        case '01':
                            $bulan_indo = 'Januari';
                            break;
                        case '02':
                            $bulan_indo = 'Februari';
                            break;
                        case '03':
                            $bulan_indo = 'Maret';
                            break;
                        case '04':
                            $bulan_indo = 'April';
                            break;
                        case '05':
                            $bulan_indo = 'Mei';
                            break;
                        case '06':
                            $bulan_indo = 'Juni';
                            break;
                        case '07':
                            $bulan_indo = 'Juli';
                            break;
                        case '08':
                            $bulan_indo = 'Agustus';
                            break;
                        case '09':
                            $bulan_indo = 'September';
                            break;
                        case '10':
                            $bulan_indo = 'Oktober';
                            break;
                        case '11':
                            $bulan_indo = 'November';
                            break;
                        case '12':
                            $bulan_indo = 'Desember';
                            break;
                    };

                    $tanggal_indo = $tanggal.' '.$bulan_indo.' '.$tahun.' pukul '.$jam.':'.$menit;
                        echo '<a href='.base_url("order/confirm_order").' class="dropdown-item"><b>'.$lo->kode.' - Rp.'.number_format("$t->harga","0",",",".").'</b><br><small class="text-muted">'.$tanggal_indo.'</small>';
                    }
                }
            }
        }
        else{
            echo '<span class="dropdown-item">Pesanan belum ada!</span>';
        }
    }

    public function count_message()
    {
        $email = $_SESSION['email'];
        $count_message = $this->db->query("SELECT * FROM order_message WHERE costumers='$email' and message_status=0");

        echo '('.$count_message->num_rows().')';
    }

    private function add_pesan()
    {

        $email = $_SESSION['email'];
        $order_pesan = $this->db->query("SELECT * FROM order_detail WHERE costumers='$email'")->result();

        foreach($order_pesan as $op){
            if($op->confirm_by_admin == 0){
                $kode_pesan = $op->kode;
                $isi_pesan = 'Segera lakukan pembayaran! kode pesanan anda <b>'.$op->kode.'.</b>';
                $confirm_kode = 0;
                $tanggal = date('d-m-Y h:i:s');
                $costumers = $email;
            }
            elseif($op->confirm_by_admin == 1){
                $kode_pesan = $op->kode;
                $isi_pesan = 'Pesanan dengan kode <b>'.$op->kode.'.</b> telah dikonfirmasi! Terimakasih.';
                $confirm_kode = 1;
                $tanggal = date('d-m-Y h:i:s');
                $costumers = $email;
            }
            elseif($op->confirm_by_admin == 2){
                $kode_pesan = $op->kode;
                $isi_pesan = 'Pesanan dengan kode <b>'.$op->kode.'.</b> telah kadaluarsa!';
                $confirm_kode = 2;
                $tanggal = date('d-m-Y h:i:s');
                $costumers = $email;
            }
            elseif($op->confirm_by_admin == 3){
                $kode_pesan = $op->kode;
                $isi_pesan = 'Anda telah membatalkan pesanan dengan kode <b>'.$op->kode.'</b>.';
                $confirm_kode = 3;
                $tanggal = date('d-m-Y h:i:s');
                $costumers = $email;
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
    }

    public function link_message()
    {
        $email = $_SESSION['email'];

        $link_message = $this->db->query("SELECT * FROM order_message WHERE costumers='$email' ORDER BY tanggal_message DESC");

        if($link_message->num_rows() > 0){
            foreach($link_message->result() as $lm){
                $tanggal_pesan = $lm->tanggal_message;

                $tanggal = substr($tanggal_pesan, 0, 2);
                $tahun = substr($tanggal_pesan, 6, 4);
                $jam = substr($tanggal_pesan, 11, 2);
                $menit = substr($tanggal_pesan, 14, 2);
                $bulan = substr($tanggal_pesan, 3, 2);
                switch($bulan){
                    case '01':
                        $bulan_indo = 'Januari';
                        break;
                    case '02':
                        $bulan_indo = 'Februari';
                        break;
                    case '03':
                        $bulan_indo = 'Maret';
                        break;
                    case '04':
                        $bulan_indo = 'April';
                        break;
                    case '05':
                        $bulan_indo = 'Mei';
                        break;
                    case '06':
                        $bulan_indo = 'Juni';
                        break;
                    case '07':
                        $bulan_indo = 'Juli';
                        break;
                    case '08':
                        $bulan_indo = 'Agustus';
                        break;
                    case '09':
                        $bulan_indo = 'September';
                        break;
                    case '10':
                        $bulan_indo = 'Oktober';
                        break;
                    case '11':
                        $bulan_indo = 'November';
                        break;
                    case '12':
                        $bulan_indo = 'Desember';
                        break;
                };

                $tanggal_indo = $tanggal.' '.$bulan_indo.' '.$tahun.' pukul '.$jam.':'.$menit;

                echo '<a href="'.base_url('order/message').'" class="dropdown-item">'.$lm->isi_pesan.'<br><small class="text-muted">'.$tanggal_indo.'</small></a>';
            }
        }
        else{
            echo '<span class="dropdown-item">Pesanan belum ada!</span>';
        }
    }

    public function update_message_status()
    {
        $email = $_SESSION['email'];
        $this->db->query("UPDATE order_message SET message_status=1 WHERE costumers='$email' and message_status=0");
    }

    public function message()
    {
        $where = array(
            'costumers' => $_SESSION['email']
        );

        $data = array(
            'title' => 'CV. New Garuda Jaya Totabuan',
            'content' => 'order/message',
            'message' => $this->order_model->message($where)
        );
		$this->load->view('layouts/wrapper', $data);

    }

}
