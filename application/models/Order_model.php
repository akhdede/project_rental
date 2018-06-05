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

    public function confirm_order($where)
    {
        $sql = $this->db->get_where('order_detail', $where);
        return $sql->result();
    }

    public function group_order($where)
    {
        $sql = $this->db->group_by('tanggal_pesan', 'ASC');
        $sql = $this->db->get_where('order_detail', $where);
        return $sql->result();
    }

    public function total_bayar($email)
    {
        $total = $this->db->query("SELECT SUM(harga) as harga, tanggal_pesan FROM order_detail WHERE costumers = '$email' GROUP BY tanggal_pesan");
        return $total->result();
    }

    public function get_kode($where)
    {
        $sql = $this->db->group_by('tanggal_pesan', 'ASC');
        $sql = $this->db->get_where('order_detail', $where);
        return $sql->result();
    }

    public function update_kode($kode, $email)
    {
        return $this->db->query("UPDATE order_detail SET kode='$kode' WHERE costumers='$email'");
    }


}

