<?php

class Welcome_model extends CI_Model {

    public function mobil_tersedia()
    {
        $sql = $this->db->get('mobil_tersedia');
        return $sql->result();
    }

    public function kursi_tersedia()
    {
        $sql = $this->db->get('kursi_tersedia');
        return $sql->result();
    }

    public function kursi_harga()
    {
        $sql = $this->db->get('kursi_harga');
        return $sql->result();
    }
}
