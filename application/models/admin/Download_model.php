<?php 
class Download_model extends CI_Model {
    function download($tanggal_sekarang){
        $query = $this->db->query("SELECT a.merek, a.plat_nomor, b.nomor_kursi, b.costumers, c.harga FROM daftar_mobil a, order_detail b, kursi_harga c, kursi_details d WHERE a.plat_nomor=b.plat_nomor AND c.id=d.id_kursi_harga and d.nomor_kursi=b.nomor_kursi AND b.confirm_by_admin=1 and b.tanggal_mobil_tersedia='$tanggal_sekarang'");

        return $query->result();
    }

    function total($tanggal_sekarang){
        $query = $this->db->query("SELECT SUM(c.harga) as total_harga FROM daftar_mobil a, order_detail b, kursi_harga c, kursi_details d WHERE a.plat_nomor=b.plat_nomor AND c.id=d.id_kursi_harga and d.nomor_kursi=b.nomor_kursi AND b.confirm_by_admin=1 and b.tanggal_mobil_tersedia='$tanggal_sekarang'"); 

        return $query->result();
    }
}
