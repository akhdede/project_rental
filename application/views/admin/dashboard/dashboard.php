<div class="placeholders text-center">
	<div class="col-xs-6 col-sm-3 placeholder">
    <div class="curve1">
      <?php echo $jmlMbl; ?>
    </div>
		<h4>Jumlah Mobil</h4>
	</div>
	<div class="col-xs-6 col-sm-3 placeholder">
    <div class="curve2">
      <?php echo $jmldriver; ?>
    </div>
		<h4>Jumlah Driver</h4>
	</div>
	<div class="col-xs-6 col-sm-3 placeholder">
    <div class="curve1">
      <?php echo $jmlMblTersedia; ?>
    </div>
		<h4>Mobil Tersedia</h4>
	</div>
	<div class="col-xs-6 col-sm-3 placeholder">
    <div class="curve2">
      <?php echo $jmlMblJalan; ?>
    </div>
		<h4>Mobil Berangkat</h4>
	</div>
</div>
<div class="tombol col-sm-3 col-sm-offset-9 text-center">
  <a href="<?php echo base_url('admin/dashboard/backup') ?>" onclick="javascript: return confirm('Apakah anda akan mem-backup data hari ini?')"><button class="btn btn-danger" <?php if($this->uri->segment(3) == 'backup') echo "disabled"; ?> > Backup</button></a>

  <a href="<?php echo base_url('admin/download') ?>" onclick="javascript: return confirm('Apakah anda akan merekap transaksi hari ini?')"><button class="btn btn-primary">Rekap</button></a>

  <a <?php if($this->uri->segment(3) != 'backup') { ?> 
  onclick="javascript: return alert('Harap lakukan backup dan rekap terlebih dahulu!')" 
  <?php } else { ?>
  onclick="javascript: return confirm('Data transaksi hari ini akan terhapus, pastikan anda sudah merekapnya! apakah anda yakin?')"href="<?php echo base_url('admin/dashboard/new') ?>"
  <?php } ?> ><button class="btn btn-primary"> New day</button></a>
</div>
