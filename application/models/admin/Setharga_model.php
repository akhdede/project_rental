<?php
class Setharga_model extends CI_Model{
  //  menampilkan daftar mobil 
  function vHarga(){
    return $this->db->get('kursi_harga')->result();
  }
  
  function eHarga($id){
    $this->db->where(array('id' => $id));
    return $this->db->get('kursi_harga')->result();
  }
  
  function update($id, $harga) {
    $this->db->query("UPDATE kursi_harga SET harga='$harga' WHERE id='$id'");
  }

}
