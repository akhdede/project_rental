<div class="container" style="margin: 100px auto;">
    <div class="col-md-4 offset-md-4" style="padding: 20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 10px 0 rgba(0, 0, 0, 0.10);">
        <form action="<?php echo base_url('user/login_action'); ?>" method="post">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan alamat email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <p> <p>
        Belum punya akun? silahkan <a href="<?php echo base_url('user/signup'); ?>">daftar</a>
    </div>
</div>
