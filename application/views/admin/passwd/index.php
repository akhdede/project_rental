<?php echo $this->session->flashdata('message'); ?>
<div class="col-md-6 col-md-offset-3">
  <!-- start of modals -->
  <div class="modal fade" id="lupa_pass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="exampleModalLabel">Reset Password</h4>
        </div>
        <div class="modal-body">
        <form action="<?php echo base_url('admin/passwd/reset')?>" method="post">
            <div class="form-group">
              Apakah anda setuju untuk mereset password?
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
            <button type="submit" class="btn btn-primary">Ya</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- end of modals -->
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Harga Kursi</h3>
    </div>
    <div class="panel-body">
      <form action="<?php echo base_url('admin/passwd/update')?>" method="post">
        <div class="col-sm-12">
          <br>
          <label for="">Password Lama: </label>
          <input type="password" name="pass_lama" class="form-control" placeholder="Password Lama">
          <a data-toggle="modal" data-target="#lupa_pass" href="#">Reset password?</a>
        </div>
        <div class="col-sm-12">
          <br>
          <label for="">Password Baru: </label>
          <input type="password" name="pass_baru" class="form-control" placeholder="Password Baru">
        </div>
        <div class="col-sm-12">
          <br>
          <label for="">Ulangi Password Baru: </label>
          <input type="password" name="pass_baru_konfirm" class="form-control" placeholder="Konfirmasi Password Baru">
        </div>
        <div class="col-sm-12">
          <br>
          <input type="submit" class="btn btn-primary" value="Ubah">
        </div>
      </form>
    </div>
  </div>
</div>
