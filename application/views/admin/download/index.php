<?php
header("Content-Type: application/xls");    
header('Content-Disposition: attachment; filename=download-on-'.date('d-m-Y_h:i:s').'.xls');  
header("Pragma: no-cache"); 
header("Expires: 0");
?>
<h3 class="text-center">
Laporan Transasksi CV. New Garuda Totabuan @ <?= $tanggal_sekarang?>
</h3>
<br>
<div class="col-sm-12">
  <table class="table" style="border: 1px #solid #000;">
    <thead>
      <tr>
        <th>Merek Mobil</th>
        <th>Plat Nomor</th>
        <th>No. Kursi</th>
        <th>Nama Penumpang</th>
        <th>Harga Bayar</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($download as $d) { ?>
        <tr>
          <td><?= $d->merek ?></td>
          <td><?= $d->plat_nomor ?></td>
          <td><?= $d->nomor_kursi ?></td>
          <td><?= $d->costumers ?></td>
          <td><?= "Rp ".number_format("$d->harga","0",",",".") ?></td>
        </tr>
      <?php } ?>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td><b>TOTAL</td>
          <?php foreach($total as $t) { ?>
            <td><b><?= "Rp ".number_format("$t->total_harga","0",",",".") ?></td>
          <?php } ?>
        </tr>
    </tbody>
  </table>
</div>
