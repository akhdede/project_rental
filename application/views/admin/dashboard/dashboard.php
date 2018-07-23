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


      <!-- start of modals -->
      <div class="modal fade" id="laporan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="exampleModalLabel">Masukkan tanggal laporan :</h4>
            </div>
            <form action="<?php echo base_url('admin/download')?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-3">
                            <label for="tanggal">Tanggal</label>
                            <input type="text" id="tanggal" name="tanggal" class="form-control" placeholder="dd" onkeydown="upperCaseF(this)">
                        </div>
                        <div class="col-sm-2">
                            <label for="bulan">Bulan</label>
                            <input type="text" id="bulan" name="bulan" class="form-control" placeholder="mm">
                        </div>
                        <div class="col-sm-2">
                            <label for="tahun">Tahun</label>
                            <input type="text" id="tahun" name="tahun" class="form-control" placeholder="yyyy">
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" name="laporan" class="btn btn-primary">Download laporan</button>
                </div>
            </form>
          </div>
        </div>
      </div>
      <!-- end of modals -->
      <a href="<?php echo base_url('admin/dashboard/backup') ?>" onclick="javascript: return confirm('Apakah anda akan mem-backup data hari ini?')"><button class="btn btn-danger" <?php if($this->uri->segment(3) == 'backup') echo "disabled"; ?> > Backup</button></a>
      <button data-toggle="modal" data-target="#laporan" type="button" class="btn btn-primary">Laporan</button>
</div>
