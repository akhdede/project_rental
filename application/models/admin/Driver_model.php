<?php
class Driver_model extends CI_Model{
  //  menampilkan daftar driver
  function tmplDriver(){
    $query = $this->db->query('SELECT id, nama_lengkap, tempat_lahir, DATE_FORMAT(tanggal_lahir,"%d-%m-%Y") as tanggal_lahir, alamat, nomor_handphone, img FROM sopir');
    return $query->result();
  }

  function save($nama_lengkap, $tempat, $tanggal, $alamat, $nomor_handphone, $url){
    $this->db->set('nama_lengkap', $nama_lengkap);
    $this->db->set('tempat_lahir', $tempat);
    $this->db->set('tanggal_lahir', $tanggal);
    $this->db->set('alamat', $alamat);
    $this->db->set('nomor_handphone', $nomor_handphone);
    $this->db->set('img', $url);
    $this->db->insert('sopir');
  }

  function edit($table, $where){
    return $this->db->get_where($table, $where);
  }

  function update($nama, $tempat, $tanggal, $alamat, $nomor_handphone, $url, $where){
    $query = $this->db->query("UPDATE sopir SET nama_lengkap='$nama', tempat_lahir='$tempat', tanggal_lahir='$tanggal', alamat='$alamat', nomor_handphone='$nomor_handphone', img='$url' WHERE id=$where");
    return $query;
  }

  function delete($id){
    $this->db->where(array('id' => $id));
    $this->db->delete('sopir');
  }
}

