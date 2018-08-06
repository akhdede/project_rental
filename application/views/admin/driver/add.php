<?php echo $this->session->flashdata('message'); ?>
<?php echo form_open_multipart('admin/driver/save', 'id=myForm');?>
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Tambah Driver</h3>
    </div>
    <div class="panel-body">
      <div class="col-sm-6">
        <label for="nama_lgkp">Nama Lengkap</label>
        <input class="form-control" type="text" placeholder="Nama Lengkap" name="nama_lgkp">
      </div>
      <div class="col-sm-4">
        <label for="tempat_lhr">Tempat Lahir</label>
        <input class="form-control" type="text" placeholder="Tempat Lahir" name="tempat_lhr">
      </div>
      <div class="col-sm-2">
        <label for="tanggal_lhr">Tanggal Lahir</label>
        <input class="form-control" type="date" name="tanggal_lhr">
      </div>
      <div class="col-sm-12">&nbsp;</div>
      <div class="col-sm-8">
        <label for="alamat">Alamat</label>
        <textarea name="alamat" class="form-control" cols="30" rows="10"></textarea>
      </div>
      <div class="col-sm-4">
        <label for="nomor_handphone">Nomor Handphone</label>
        <input class="form-control" type="text" name="nomor_handphone" placeholder="Nomor Handphone">
      </div>
      <div class="col-sm-12">&nbsp;</div>
      <div class="col-sm-2">
        <label for="pas_foto">Pas Foto</label>
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
