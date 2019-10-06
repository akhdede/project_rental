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

    function login($email, $password)
    {
        $this->db->where('email', $email);
        $account = $this->db->get('users')->row();

        if($account != NULL){
            if(password_verify($password, $account->password)){
                return $account;
            }else{
                return NULL;
            }
        }
        return NULL;
    }

    function activate($email, $hash)
    {
        return $this->db->query("UPDATE users SET active='y' WHERE email='$email' AND hash='$hash'");
    }
}
