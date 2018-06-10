<?php echo $this->session->flashdata('message'); ?>
<div class="col-sm-12">
  <ul class="nav nav-tabs tersedia">
    <li role="presentation"><a href="<?php echo base_url('admin/tersedia')?>">Mobil Tersedia</a></li>
    <li role="presentation" class="active"><a href="#">Kursi Tersedia</a></li>
  </ul>
</div>
<div class="col-sm-12">&nbsp;</div>
<div class="col-sm-12">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <div class="panel-title">Kursi tersedia</div>
    </div>
    <div class="panel-body kursi_tersedia">
      <div class="row">
        <div class="col-sm-1"><font size="2"><b>NO.</font></div>
        <div class="col-sm-1"><font size="2">PLAT</font></div> 
        <div class="col-sm-2"><font size="2">MEREK</font></div>
        <div class="col-sm-7 text-center"><font size="2">SUDAH DIPESAN</font></div>
        <div class="col-sm-1"><font size="2">AKSI</b></font></div>
        <div class="col-sm-1 col-sm-offset-4"><font size="2">Kursi</font></div>
        <div class="col-sm-2"><font size="2">Nama Costumer</font></div>
        <div class="col-sm-2"><font size="2">Ket.</font></div>
        <div class="col-sm-2"><font size="2">Status Bayar</font></div>
      </div>

        <?php $no = 1; foreach($mblTersedia as $mt) { ?>

          <!-- start of modals -->
          <!-- tambah pesanan kursi -->
          <div class="modal fade" id="<?php echo $mt->plat_no ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="exampleModalLabel">Rincian Pemesanan Kursi</h4>
								</div>
								<div class="modal-body">
                <form action="<?php echo base_url('admin/tersedia/kursi')?>" method="post">
										<div class="form-group">
                      <input type="hidden" name="plat_no" value="<?php echo $mt->plat_no ?>">
											<label for="no_kursi" class="control-label">No. Kursi</label>
                        <select class="form-control" name="no_kursi">
                          <option value="">- Pilihan -</option>
                          <?php for ($i = 1; $i < 8; $i++) { ?>
                          <option value="<?php echo $i; ?>" <?php foreach($krsStatus as $k){if($k->plat_no_mobil == $mt->plat_no && $k->no_kursi == $i && $k->status== 1){echo "disabled";}}?>><?php echo $i; ?></option>
                          <?php }?>
                        </select>
										</div>
										<div class="form-group">
											<label for="costumer" class="control-label">Nama Costumer</label>
											<input type="text" class="form-control" name="costumer" Placeholder="Nama Costumer">
										</div>
										<div class="form-group">
											<label for="ket" class="control-label">Keterangan</label>
											<textarea class="form-control" name="ket" Placeholder="Alamat, No. Handphone"></textarea>
										</div>
										<div class="form-group">
											<label for="stts_bayar" class="control-label">Status Bayar</label>
                        <select class="form-control" name="stts_bayar">
                          <option value="">- Pilihan -</option>
                          <option value="Sudah">Sudah</option>
                          <option value="Belum">Belum</option>
                        </select>
										</div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Pesan</button>
                  </div>
                </form>
							</div>
						</div>
					</div>

          <!-- end of modals -->
            <div class="row">
              <div class="col-sm-1"><?php echo $no++ ?></div>
              <div class="col-sm-1"><?php echo $mt->plat_no ?></div>
              <div class="col-sm-2"><?php echo $mt->merek ?></div>
              <div class="col-sm-1 col-sm-offset-7">
              <input data-toggle="modal" data-target="#<?php echo $mt->plat_no ?>" type="button" class="btn btn-primary btn-sm" value="Pesan" title="Pesan" <?php if($mt->sdh_jln == 'y'){echo "disabled";} ?>>
              </div>
              <div class="col-sm-12">&nbsp;</div>
              <?php foreach($krsStatus as $ks) { ?>
                <?php if($mt->plat_no == $ks->plat_no_mobil && $ks->status == 1){ ?>
                  <div class="col-sm-1 col-sm-offset-4"><font size="2"><?php echo "No. ".$ks->no_kursi ?></font></div>
                  <div class="col-sm-2"><font size="2"><?php echo $ks->costumer ?></font></div>
                  <div class="col-sm-2"><td><font size="2"><?php echo $ks->keterangan ?></font></div>
                  <div class="col-sm-2"><td><font size="2"><?php echo $ks->stts_bayar ?></font></div>
                  <div class="col-sm-1 text-center">
                    <a href="<?php if($ks->stts_bayar == 'Sudah'){echo '#';}else{echo base_url('admin/tersedia/stts_bayar/').$ks->plat_no_mobil."/".$ks->no_kursi;}?>" title="Deal" <?php if($ks->stts_bayar == 'Sudah' or $mt->sdh_jln == 'y'){echo ""; }else{?>onclick="javascript: return confirm('Anda yakin costumer ini sudah melakukan pembayaran?')" <?php }?>><span class="glyphicon glyphicon-ok"></span></a>
                    <a href="<?php if($mt->sdh_jln == 'y'){echo "#";}else{echo base_url('admin/tersedia/batalPesan/').$ks->plat_no_mobil."/".$ks->no_kursi;} ?>" title="Batal" <?php if($mt->sdh_jln == 'y'){echo ""; }else{?>onclick="javascript: return confirm('Apakah anda akan membatalkan transaksi ini?')" <?php }?>><span class="glyphicon glyphicon-remove"></span></a>
                  </div>
              <div class="col-sm-12">&nbsp;</div>
                <?php } ?>
              <?php } ?>
            </div>
        <?php } ?>
