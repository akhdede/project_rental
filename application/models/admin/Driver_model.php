<?php
class Driver_model extends CI_Model{
  //  menampilkan daftar driver
  function tmplDriver(){
    $query = $this->db->query('SELECT id, nama_lgkp, tempat_lhr, DATE_FORMAT(tanggal_lhr,"%d-%m-%Y") as tanggal_lhr, alamat, image FROM driver');
    return $query->result();
  }

  function save($nama_lgkp, $tempat, $tanggal, $alamat, $url){
    $this->db->set('nama_lgkp', $nama_lgkp);
    $this->db->set('tempat_lhr', $tempat);
    $this->db->set('tanggal_lhr', $tanggal);
    $this->db->set('alamat', $alamat);
    $this->db->set('image', $url);
    $this->db->insert('driver');
  }

  function edit($table, $where){
    return $this->db->get_where($table, $where);
  }

  function update($nama, $tempat, $tanggal, $alamat, $url, $where){
    $query = $this->db->query("UPDATE driver SET nama_lgkp='$nama', tempat_lhr='$tempat', tanggal_lhr='$tanggal', alamat='$alamat', image='$url' WHERE id=$where");
    return $query;
  }

  function delete($id){
    $this->db->where(array('id' => $id));
    $this->db->delete('driver');
  }
}

