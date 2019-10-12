<?php
class Tersedia_model extends CI_Model{
  //  menampilkan daftar mobil 
  function mblDetails() {
    $this->db->order_by('plat_nomor', ASC);
    return $this->db->get('daftar_mobil')->result();
  }

  function mblTersedia() {
    $tanggal_sekarang = date('d-m-Y');
    return $this->db->query("SELECT a.id_sopir, a.plat_nomor, a.sudah_jalan, a.tanggal_tersedia, b.merek FROM mobil_tersedia a, daftar_mobil b WHERE a.plat_nomor=b.plat_nomor and a.tanggal_tersedia LIKE '$tanggal_sekarang%' ORDER BY plat_nomor ASC")->result();
  }

  function get($table, $where){
    return $this->db->get_where($table, $where);
  }

  function insert($plat_nomor, $merek, $img, $tanggal_tersedia, $idDrv){
    $this->db->set('plat_nomor', $plat_nomor);
    $this->db->set('merek', $merek);
    $this->db->set('img', $img);
    $this->db->set('tanggal_tersedia', $tanggal_tersedia);
    $this->db->set('id_sopir', $idDrv);
    $this->db->insert('mobil_tersedia');
  }

  function mblBatal($plat_nomor, $tanggal_sekarang){
    $this->db->where(array('plat_nomor' => $plat_nomor, 'tanggal_tersedia' => $tanggal_sekarang));
    $this->db->delete('mobil_tersedia');
    
    $this->db->where(array('plat_nomor' => $plat_nomor, 'tanggal_mobil_tersedia' => $tanggal_sekarang));
    $this->db->delete('order_detail');
  }

  function addKursi($plat_nomor, $no_kursi, $tanggal_tersedia){
    $this->db->set('plat_nomor', $plat_nomor);
    $this->db->set('nomor_kursi', $no_kursi);
    $this->db->set('tanggal_tersedia', $tanggal_tersedia);
    $this->db->insert('kursi_tersedia');
  }

  function stts_bayar($plat_nomor, $no_kursi, $stts_bayar){
    return $this->db->query("UPDATE kursi_tersedia SET stts_bayar='$stts_bayar' WHERE plat_nomor_mobil='$plat_nomor' AND no_kursi='$no_kursi'");
  }

  function krsBatal($plat_nomor, $tanggal_sekarang){
    $this->db->where(array('plat_nomor' => $plat_nomor, 'tanggal_tersedia' => $tanggal_sekarang));
    $this->db->delete('kursi_tersedia');
  }

  function krsUpdate($status, $plat_nomor, $nomor_kursi, $costumer, $keterangan, $status_bayar){
    return $this->db->query("UPDATE kursi_tersedia SET status='$status', costumer='$costumer', keterangan='$keterangan', status_bayar='$status_bayar' WHERE plat_nomor='$plat_nomor' AND nomor_kursi='$nomor_kursi'");
  }

  function krsStatus(){
      $this->db->select('*');
      $this->db->from('kursi_tersedia a');
      $this->db->join('users b', 'a.costumer=b.email', 'left');
      $query = $this->db->get();
      return $query->result();

  }

  function batalPesan($plat_nomor, $no_kursi, $kode_pesanan){
    $this->db->query("UPDATE kursi_tersedia SET status=0, costumer=null, kode_pesanan=null WHERE plat_nomor='$plat_nomor' AND nomor_kursi='$no_kursi' AND kode_pesanan='$kode_pesanan'");
    $this->db->query("DELETE FROM order_detail WHERE plat_nomor='$plat_nomor' AND nomor_kursi='$no_kursi' AND kode='$kode_pesanan'");
    return true;
  }

  // mobil jalan
  function mblJalan($plat_nomor, $sudah_jalan){
    return $this->db->query("UPDATE mobil_tersedia SET sudah_jalan='$sudah_jalan' WHERE plat_nomor='$plat_nomor'");
  }

  public function getDriver(){
    return $this->db->query('SELECT id, nama_lengkap FROM sopir');
  }
}
