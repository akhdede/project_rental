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
        $tanggal_sekarang = date('d-m-Y');
        $query = $this->db->query("SELECT COUNT(plat_nomor) as jml FROM mobil_tersedia WHERE tanggal_tersedia='$tanggal_sekarang'")->row_object();
        return $query->jml;
    }

    function jmlMblJalan() {
        $tanggal_sekarang = date('d-m-Y');
        $query = $this->db->query("SELECT COUNT(plat_nomor) as jml FROM mobil_tersedia WHERE sudah_jalan = 'y' AND tanggal_tersedia='$tanggal_sekarang'")->row_object();
        return $query->jml;
    }

}
