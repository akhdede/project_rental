<?php echo $this->session->flashdata('message'); ?>
<div class="col-sm-12">
  <ul class="nav nav-tabs tersedia">
    <li role="presentation"><a href="<?php echo base_url('admin/tersedia')?>">Mobil Tersedia</a></li>
    <li role="presentation" class="active"><a href="#">Kursi dipesan</a></li>
  </ul>
</div>
<div class="col-sm-12">&nbsp;</div>
<div class="col-sm-12">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <div class="panel-title">Kursi dipesan</div>
    </div>
    <div class="panel-body kursi_tersedia">
      <div class="row">
        <div class="col-sm-1"><font size="2"><b>NO.</font></div>
        <div class="col-sm-1"><font size="2">PLAT</font></div> 
        <div class="col-sm-2 col-sm-offset-1"><font size="2">MEREK</font></div>
        <div class="col-sm-1 col-sm-offset-1">KURSI</div>
        <div class="col-sm-3">NAMA COSTUMER</div>
        <div class="col-sm-1 col-sm-offset-1"><font size="2">AKSI</b></font></div>
      </div>

        <?php $no = 1; foreach($mblTersedia as $mt) { ?>

            <div class="row">
              <div class="col-sm-1"><?php echo $no++ ?></div>
              <div class="col-sm-1"><?php echo $mt->plat_nomor ?></div>
              <div class="col-sm-2 col-sm-offset-1"><?php echo $mt->merek ?></div>
              <div class="col-sm-1 col-sm-offset-6 text-danger">Batal</div>
              <div class="col-sm-12">&nbsp;</div>
              <?php foreach($krsStatus as $ks) { ?>
                <?php if($mt->plat_nomor == $ks->plat_nomor && $ks->status == 1){ ?>
                  <div class="col-sm-1 col-sm-offset-6 text-center"><font size="2"><?php echo "No. ".$ks->nomor_kursi ?></font></div>
                  <div class="col-sm-2 text-center"><font size="2"><?php echo $ks->nama_lengkap ?></font></div>
                  <div class="col-sm-1 col-sm-offset-2 text-center">
                  <a href="<?php if($mt->sudah_jalan == 'y'){echo "#";}else{echo base_url('admin/tersedia/batalPesan/').$ks->plat_nomor."/".$ks->nomor_kursi."/".$ks->kode_pesanan;} ?>" title="Batal" <?php if($mt->sudah_jalan == 'y'){echo ""; }else{?>onclick="javascript: return confirm('Apakah anda akan membatalkan transaksi ini?')" <?php }?>><span class="glyphicon glyphicon-remove"></span></a>
                  </div>
              <div class="col-sm-12">&nbsp;</div>
                <?php } ?>
              <?php } ?>
            </div>
        <?php } ?>
