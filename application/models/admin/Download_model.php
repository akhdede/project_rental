<?php 
class Download_model extends CI_Model {
 function download() {
   $query = $this->db->query("SELECT a.merek, b.plat_nomor, f.nama_lengkap sopir, b.nomor_kursi, b.costumer, c.id_kursi_harga, d.harga FROM daftar_mobil a, kursi_tersedia b, kursi_details c, kursi_harga d, mobil_tersedia e, sopir f WHERE a.plat_nomor=b.plat_nomor AND b.nomor_kursi=c.nomor_kursi and d.id=c.id_kursi_harga AND e.id_sopir=f.id AND e.plat_nomor IN (SELECT(b.plat_nomor)) AND b.status=1 AND b.status_bayar='Sudah' ORDER BY b.plat_nomor, c.nomor_kursi ASC, d.harga DESC");
   return $query->result();
  }

 function total()
 {
   $query = $this->db->query("SELECT sum(d.harga) total FROM daftar_mobil a, kursi_tersedia b, kursi_details c, kursi_harga d, mobil_tersedia e, sopir f WHERE a.plat_nomor=b.plat_nomor AND b.nomor_kursi=c.nomor_kursi and d.id=c.id_kursi_harga AND e.id_sopir=f.id AND e.plat_nomor IN (SELECT(b.plat_nomor)) AND b.status=1 AND b.status_bayar='Sudah'");

   return $query->result();
 }
}
