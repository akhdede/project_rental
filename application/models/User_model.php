<?php

class User_model extends CI_Model {

    function get_all_provinsi() {
        $this->db->select('*');
        $this->db->from('wilayah_provinsi');
        $query = $this->db->get();
        
        return $query->result();
    }

    function signup_action($data, $table)
    {
        $this->db->insert($table, $data);
    }

}
