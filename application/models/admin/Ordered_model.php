<?php
class Ordered_model extends CI_Model
{
    public function tampilOrdered()
    {
        $this->db->where('confirm_by_admin', 2);
        $this->db->group_by('kode', 'DESC');
        $sql = $this->db->get('order_detail');
        return $sql;
    }

    public function filterOrdered($kode)
    {
        $this->db->where(array('confirm_by_admin' => 2, 'kode' => $kode));
        $this->db->group_by('kode', 'DESC');
        $sql = $this->db->get('order_detail');
        return $sql;
    }

    public function uraiGroup()
    {
        $this->db->where('confirm_by_admin', 2);
        $sql = $this->db->get('order_detail');
        return $sql->result_array();
    }

    public function user()
    {
        $this->db->select('*');
        $this->db->from('order_detail a');
        $this->db->join('users b', 'a.costumers = b.email');
        $this->db->group_by('a.kode');
        $sql = $this->db->get();
        return $sql->result();
    }
}
