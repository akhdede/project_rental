<?php
class List_model extends CI_Model{
  //  menampilkan daftar mobil 
  function data($number, $offset) {
    $this->db->order_by("tanggal_aktif", "desc");
    $query = $this->db->get('daftar_mobil', $number, $offset);
    return $query->result();
  }

  function cekData($plat_nomor){
    return $this->db->get_where('daftar_mobil', array('plat_nomor' => $plat_nomor))->num_rows();
  }

  function cData() {
    return $this->db->get('daftar_mobil')->num_rows();
  }
    
  function filter($by) {
    $this->db->where('plat_nomor', $by);
    $query = $this->db->get('daftar_mobil');
    return $query->result();
  }

  function found($by) {
    $this->db->where('plat_nomor', $by);
    $query = $this->db->get('daftar_mobil')->row_array();
    return $query;
  }

  function jumlah_data(){
    return $this->db->get('daftar_mobil')->num_rows();
  }

  function save($plat_nomor, $merek, $url){
    $this->db->set('plat_nomor', $plat_nomor);
    $this->db->set('merek', $merek);
    $this->db->set('img', $url);
    $this->db->insert('daftar_mobil');
  }

  function edit($table, $where){
    return $this->db->get_where($table, $where);
  }

  function update($plat_nomor, $merek, $url, $where){
    $query = $this->db->query("UPDATE daftar_mobil SET plat_nomor='$plat_nomor', merek='$merek', img='$url' WHERE id=$where");
    return $query;
  }

  function delete($id){
    $this->db->delete('daftar_mobil', array('id' => $id));
  }

}
