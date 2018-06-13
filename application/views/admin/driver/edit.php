<?php echo $this->session->flashdata('message'); ?>
<?php foreach($editdriver as $e) {?>
<?php echo form_open_multipart('admin/driver/update', 'id=myForm');?>
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Edit Driver</h3>
    </div>
    <div class="panel-body">
      <div class="col-sm-6">
        <label for="nama_lgkp">Nama Lengkap</label>
        <input type="hidden" value="<?php echo $e->id ?>" name="id">
        <input type="hidden" value="<?php echo $e->img ?>" name="gambar">
        <input class="form-control" type="text" placeholder="Nama Lengkap" name="nama_lgkp" value="<?php echo $e->nama_lengkap ?>">
      </div>
      <div class="col-sm-4">
        <label for="tempat_lhr">Tempat Lahir</label>
        <input class="form-control" type="text" placeholder="Tempat Lahir" name="tempat_lhr" value="<?php echo $e->tempat_lahir ?>">
      </div>
      <div class="col-sm-2">
        <label for="tanggal_lhr">Tanggal Lahir</label>
        <input class="form-control" type="date" name="tanggal_lhr" value="<?php echo $e->tanggal_lahir ?>">
      </div>
      <div class="col-sm-12">&nbsp;</div>
      <div class="col-sm-8">
        <label for="alamat">Alamat</label>
        <textarea name="alamat" class="form-control" cols="30" rows="10"><?php echo $e->alamat ?></textarea>
      </div>
      <div class="col-sm-2">
        <label for="pas_foto">Pas Foto</label>
        <img src="<?php echo base_url($e->img) ?>" class="thumbnail">
        <input type="file" name="pas_foto">
      </div>
    </div>
    <div class="panel-footer clearfix">
      <div class="col-sm-12">
        <button class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</form>
<?php } ?>
