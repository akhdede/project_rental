<?php
class Home_model extends CI_Model{

  //Menampilkan merek mobil di halaman home
  function tmplMbl(){
    $query = $this->db->query('SELECT * FROM mobil_details a, mobil_tersedia b WHERE a.plat_no=b.plat_no');
    return $query->result();
  }

  function jumlah_data(){
    return $this->db->query('SELECT * FROM mobil_details a, mobil_tersedia b WHERE a.plat_no=b.plat_no')->num_rows();
  }
  //Menampilkan keterangan kursi di halaman home
  function tmplKrs(){
    return $this->db->query('SELECT * FROM kursi_tersedia a, mobil_tersedia b, kursi_kategori c, kursi_details d WHERE a.plat_no_mobil=b.plat_no and  a.no_kursi=d.no_kursi and c.id=d.id_kategori')->result();
  }

  //Menampilkan harga kursi di halaman home
  function krsKtgr(){
    $query = $this->db->query('SELECT * FROM kursi_details a, kursi_kategori b WHERE a.id_kategori=b.id GROUP BY b.kursi_posisi ORDER BY a.id_kategori');
    return $query->result();
  }

  function tampilDriver()
  {
    $query = $this->db->query('SELECT a.plat_no, a.driver_id, b.id, b.nama_lgkp, b.tempat_lhr, DATE_FORMAT(b.tanggal_lhr,"%d-%m-%Y") as tanggal_lhr, b.alamat, b.image  FROM mobil_tersedia a, driver b WHERE a.driver_id=b.id');
    return $query->result();
  }
}
