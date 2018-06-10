<?php
class Setharga_model extends CI_Model{
  //  menampilkan daftar mobil 
  function vHarga(){
    return $this->db->get('kursi_kategori')->result();
  }
  
  function eHarga($id){
    $this->db->where(array('id' => $id));
    return $this->db->get('kursi_kategori')->result();
  }
  
  function update($id, $harga) {
    $this->db->query("UPDATE kursi_kategori SET kursi_hrg='$harga' WHERE id='$id'");
  }

}
