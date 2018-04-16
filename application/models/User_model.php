<?php

class User_model extends CI_Model {

    function users()
    {
        $sql = $this->db->query('SELECT email, password, nama_lengkap, kabupaten_kota, kecamatan, desa_kelurahan, alamat, nomor_handphone FROM users');
        return $sql->result();
    }

    function get_provinces()
    {
        $query = $this->db->get('provinces');
        return $query->result();
    }

    function get_regencies($id_province)
    {
        $sql = $this->db->query("SELECT * FROM regencies WHERE province_id = '$id_province'");
        return $sql->result();
    }

}
