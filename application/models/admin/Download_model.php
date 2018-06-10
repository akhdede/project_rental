<?php 
class Download_model extends CI_Model {
 function download() {
   $query = $this->db->query("SELECT a.merek, b.plat_no_mobil, f.nama_lgkp driver, b.no_kursi, b.costumer, c.id_kategori, d.kursi_hrg FROM mobil_details a, kursi_tersedia b, kursi_details c, kursi_kategori d, mobil_tersedia e, driver f WHERE a.plat_no=b.plat_no_mobil AND b.no_kursi=c.no_kursi and d.id=c.id_kategori AND e.driver_id=f.id AND e.plat_no IN (SELECT(b.plat_no_mobil)) AND b.status=1 AND b.stts_bayar='Sudah' ORDER BY b.plat_no_mobil, c.no_kursi ASC, d.kursi_hrg DESC");
   return $query->result();
  }

 function total()
 {
   $query = $this->db->query("SELECT sum(d.kursi_hrg) total FROM mobil_details a, kursi_tersedia b, kursi_details c, kursi_kategori d, mobil_tersedia e, driver f WHERE a.plat_no=b.plat_no_mobil AND b.no_kursi=c.no_kursi and d.id=c.id_kategori AND e.driver_id=f.id AND e.plat_no IN (SELECT(b.plat_no_mobil)) AND b.status=1 AND b.stts_bayar='Sudah'");

   return $query->result();
 }
}
