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

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <!-- start album -->
                <?php foreach($mobil_tersedia as $mt){ ?>
                    <div class="col-md-4 col-sm-12 album-show">
                        <a href="<?php echo base_url('order/mobil/').$mt->plat_nomor; ?>" class="btn btn-danger btn-lg"><span class="fa fa-shopping-cart"></span> Pesan</a>
                        <span class="album-light">
                            <div class="card mb-4 mb-12 box-shadow">
                                <img class="card-img-top" src="<?php echo base_url('assets/img/avanza.jpg');?>" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap">
                                <img class="album-background" src="<?php echo base_url('assets/img/album-background.png'); ?>" alt="">
                                <div class="card-body">
                                    <span class="card-text font-weight-bold text-dark">
                                        <h4 class="text-center"><?php echo $mt->merek.' ('.$mt->plat_nomor.') '; ?></h4>
                                    </span><br />
                                    <h5>
                                        <div id="responsecontainer"></div>
                                    </h5>
                                    <br><hr>
                                    <small class="text-muted">
                                        <span class="text-secondary">Harga sewa : </span><br />
                                            <?php foreach($kursi_harga as $kh){ ?>
                                                <span class="text-secondary"><?php echo '- Kursi '.$kh->posisi.'<i> ( '.$kh->keterangan.' )</i> - Rp.'.$kh->harga; ?></span><br />
                                            <?php } ?>
                                        <span class="text-secondary">Ket :</span><br />
                                        <span class="fa fa-check text-success"></span> Belum dipesan<br />
                                        <span class="fa fa-times text-danger"></span> Sudah dipesan
                                    </small>
                                </div>
                            </div>
                        </span>
                    </div>
                <?php } ?>
                <!-- end album -->

            </div>
        </div>
    </div>

</main>
<!-- ========================================== end of main ========================================== -->

