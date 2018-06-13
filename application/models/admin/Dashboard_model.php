<?php 
class Dashboard_model extends CI_Model {
 function jmlMbl() {
   $query = $this->db->query('SELECT COUNT(plat_nomor) as jml FROM daftar_mobil')->row_object();
   return $query->jml;
  }

 function jmldriver() {
   $query = $this->db->query('SELECT COUNT(nama_lengkap) as jml FROM sopir')->row_object();
   return $query->jml;
  }

 function jmlMblTersedia() {
   $query = $this->db->query('SELECT COUNT(plat_nomor) as jml FROM mobil_tersedia')->row_object();
   return $query->jml;
  }

 function jmlMblJalan() {
   $query = $this->db->query('SELECT COUNT(plat_nomor) as jml FROM mobil_tersedia WHERE sudah_jalan = "y" ')->row_object();
   return $query->jml;
  }

}
