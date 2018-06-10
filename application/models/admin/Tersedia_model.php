<?php
class Tersedia_model extends CI_Model{
  //  menampilkan daftar mobil 
  function mblDetails() {
    $this->db->order_by('plat_no', ASC);
    return $this->db->get('mobil_details')->result();
  }

  function mblTersedia() {
    return $this->db->query('SELECT a.driver_id, a.plat_no, a.sdh_jln, b.merek FROM mobil_tersedia a, mobil_details b WHERE a.plat_no=b.plat_no ORDER BY plat_no ASC')->result();
  }

  function get($table, $where){
    return $this->db->get_where($table, $where);
  }

  function insert($plat_no, $idDrv){
    $this->db->set('plat_no', $plat_no);
    $this->db->set('driver_id', $idDrv);
    $this->db->insert('mobil_tersedia');
  }

  function mblBatal($plat_no){
    $this->db->where(array('plat_no' => $plat_no));
    $this->db->delete('mobil_tersedia');
  }

  function addKursi($plat_no, $no_kursi){
    $this->db->set('plat_no_mobil', $plat_no);
    $this->db->set('no_kursi', $no_kursi);
    $this->db->insert('kursi_tersedia');
  }

  function stts_bayar($plat_no, $no_kursi, $stts_bayar){
    return $this->db->query("UPDATE kursi_tersedia SET stts_bayar='$stts_bayar' WHERE plat_no_mobil='$plat_no' AND no_kursi='$no_kursi'");
  }

  function krsBatal($plat_no){
    $this->db->where(array('plat_no_mobil' => $plat_no));
    $this->db->delete('kursi_tersedia');
  }

  function krsUpdate($status, $plat_no, $no_kursi, $costumer, $ket, $stts_bayar){
    return $this->db->query("UPDATE kursi_tersedia SET status='$status', costumer='$costumer', keterangan='$ket', stts_bayar='$stts_bayar' WHERE plat_no_mobil='$plat_no' AND no_kursi='$no_kursi'");
  }

  function krsStatus(){
    return $this->db->get('kursi_tersedia')->result();
  }

  function batalPesan($status, $plat_no, $no_kursi, $costumer, $ket){
    return $this->db->query("UPDATE kursi_tersedia SET status='$status', costumer='$costumer', keterangan='$ket' WHERE plat_no_mobil='$plat_no' AND no_kursi='$no_kursi'");
  }

  // mobil jalan
  function mblJalan($plat_no, $sdh_jln){
    return $this->db->query("UPDATE mobil_tersedia SET sdh_jln='$sdh_jln' WHERE plat_no='$plat_no'");
  }

  public function getDriver(){
    return $this->db->query('SELECT id, nama_lgkp FROM driver');
  }
}
