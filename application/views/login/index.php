<div class="row">
  <div class="col-sm-3 col-sm-offset-4">
    <div class="well">
      <form action="<?php echo base_url();?>login/aksi_login" method="post">
        <h2 class="text-center">Login Administrator</h2>
        <h5 class="text-center">CV. Garuda Jaya Totabuan</h5>
        <hr>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
      </form>
    </div>
  </div>
</div>
