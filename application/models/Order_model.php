<?php

class Order_model extends CI_Model {

    public function mobil_order($where)
    {
        return $this->db->get_where('mobil_tersedia', $where);

    }

    public function kursi_order($where)
    {
        return $this->db->get_where('kursi_tersedia', $where);
    }

    public function kursi_harga()
    {
        $sql = $this->db->get('kursi_harga');
        return $sql->result();
    }
}

