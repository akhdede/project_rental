<!-- ========================================== start of main ========================================== -->
<main role="main">

    <!-- start jumbotron -->
    <section class="jumbotron text-center">
        <div class="container">
        <?php if(isset($_SESSION['nama_lengkap'])){ ?>
            <?php echo '<h3 class="font-weight-bold font-italic text-secondary">Hi, '.$_SESSION['nama_lengkap'].'</h3>'; ?>
            <p class="lead text-muted">Selamat! Anda telah berhasil login.<br>Silahkan memilih kendaraan dan nomor kursi.</p>

        <?php }else{ ?> 
            <h2 class="jumbotron-heading">Selamat datang</h2>
            <p class="lead text-muted">Untuk memesan kursi silahkan login terlebih dahulu. Jika belum punya akun segera lakukan pendaftaran.</p>
            <p>
                <a href="<?php echo base_url('user/login'); ?>" class="btn btn-primary btn-lg my-2">Login</a>
                <a href="<?php echo base_url('user/signup'); ?>" class="btn btn-danger btn-lg my-2">Daftar</a>
            </p>
        <?php } ?>
        </div>
    </section>
    <!-- end jumbotron -->

    <div class="album py-5 bg-light" style="margin-top: -30px;">
        <div class="container">
            <div class="row">
                <!-- start album -->
                <div id="responsecontainer"></div>
                <!-- end album -->
            </div>
        </div>
    </div>

</main>
<!-- ========================================== end of main ========================================== -->

