<?php

class User_model extends CI_Model {

    public function users()
    {
        $sql = $this->db->query('SELECT email, password, nama_lengkap, kabupaten_kota, kecamatan, desa_kelurahan, alamat, nomor_handphone FROM users');
        return $sql->result();
    }

    public function get_provinsi($name)
    {
        $this->db->like('name', $name, 'both' );
        return $this->db->get('provinces')->result();
    }
}
