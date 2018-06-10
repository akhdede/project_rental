<?php 
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=rekap-on".date('d-m-y:h:i:s').".xls");
?>
<div class="col-sm-12">
<h3 class="text-center">
Laporan Transasksi CV. New Garuda Jaya Totabuan
</h3>
</div>
<div class="col-sm-12">
  <table class="table">
    <thead>
      <tr>
        <th>Merek Mobil</th>
        <th>Plat Nomor</th>
        <th>Driver</th>
        <th>No. Kursi</th>
        <th>Nama Penumpang</th>
        <th>Harga Bayar</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($download as $d) { ?>
        <tr>
          <td><?php echo $d->merek ?></td>
          <td><?php echo $d->plat_no_mobil ?></td>
          <td><?php echo $d->driver ?></td>
          <td><?php echo $d->no_kursi ?></td>
          <td><?php echo $d->costumer ?></td>
          <td><?php echo $d->kursi_hrg ?></td>
        </tr>
      <?php } ?>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td><b>TOTAL</td>
          <?php foreach($total as $t) { ?>
            <td><b><?php echo "Rp ".number_format("$t->total","0",",",".") ?></td>
          <?php } ?>
        </tr>
    </tbody>
  </table>
</div>
