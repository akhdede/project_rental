<?php

class Welcome_model extends CI_Model {

    public function mobil_tersedia()
    {
        $sql = $this->db->query('SELECT plat_nomor, merek, tanggal FROM mobil_tersedia');
        return $sql->result();
    }

    public function kursi_tersedia()
    {
        $sql = $this->db->query('SELECT plat_nomor, nomor_kursi, status_order FROM kursi_tersedia');
        return $sql->result();
    }

    public function kursi_harga()
    {
        $sql = $this->db->query('SELECT posisi, harga, keterangan FROM kursi_harga');
        return $sql->result();
    }
}
