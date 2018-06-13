  <?php

  //Array Hari
  $array_hari = array(1=>"Senin","Selasa","Rabu","Kamis","Jumat", "Sabtu","Minggu");
  $hari = $array_hari[date("N")];

  //Format Tanggal
  $tanggal = date ("j");

  //Array Bulan
  $array_bulan = array(1=>" Januari "," Februari "," Maret ", " April ", " Mei ", " Juni "," Juli "," Agustus "," September "," Oktober ", " November "," Desember ");
  $bulan = $array_bulan[date("n")];

  //Format Tahun
  $tahun = date("Y");

  ?>
  <section class="content">
    <h3 class="content-header">
      <?php echo $content_header; ?><font size="3">&nbsp;&nbsp;<?php echo $hari . ", " . $tanggal . $bulan . $tahun ?></font>
    </h3>
    <hr>
    <div class="inner">
      <div class="loading">
      </div>
      <?php if($isi) $this->load->view($isi)?>
    </div>
  </section>
</div>
