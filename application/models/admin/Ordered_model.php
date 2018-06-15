<?php
class Ordered_model extends CI_Model
{
    public function tampilOrdered()
    {
        $this->db->where('confirm_by_admin', null);
        $this->db->group_by('kode', 'DESC');
        $sql = $this->db->get('order_detail');
        return $sql->result();
    }

    public function uraiGroup()
    {
        $this->db->where('confirm_by_admin', null);
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
