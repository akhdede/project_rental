<?php
class Pass_model extends CI_Model{
  public function get()
  {
    $query = $this->db->query('SELECT password FROM user');
    return $query->result();
  }
  public function update($pass_baru)
  {
    $this->db->query("UPDATE user SET password='$pass_baru'");
  }
}
