<!-- ========================================== start of main ========================================== -->
<main role="main">

    <!-- start jumbotron -->
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Selamat datang</h1>
            <p class="lead text-muted">Untuk memesan kursi silahkan login terlebih dahulu. Jika belum punya akun segera lakukan pendaftaran. Anda dapat memesan kursi tanpa melakukan pendaftaran, akan tetapi setiap kali melakukan pemesanan kursi anda harus selalu memasukkan identitas diri.</p>
            <p>
                <a href="<?php echo base_url('user/login'); ?>" class="btn btn-primary btn-lg my-2">Login</a>
                <a href="#" class="btn btn-danger btn-lg my-2">Daftar</a>
                <a href="#" class="btn btn-secondary btn-lg my-2">Pesan Tanpa Daftar</a>
            </p>
        </div>
    </section>
    <!-- end jumbotron -->

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">

                <!-- start album -->
                <?php foreach($mobil_tersedia as $mt){ ?>
                    <div class="col-md-4 col-sm-12 album-show">
                        <button class="btn btn-danger btn-lg"><span class="fa fa-shopping-cart"></span> Pesan</button>
                        <span class="album-light">
                            <div class="card mb-4 mb-12 box-shadow">
                                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap">
                                <img class="album-background" src="<?php echo base_url('assets/img/album-background.png'); ?>" alt="">
                                <div class="card-body" style="">
                                    <span class="card-text font-weight-bold text-dark">
                                        <h4 class="text-center"><?php echo $mt->merek.' ('.$mt->plat_nomor.') '; ?></h4>
                                    </span><br />
                                    <h5>
                                        <?php foreach($kursi_tersedia as $kt){ ?>
                                            <?php if($mt->plat_nomor == $kt->plat_nomor){ ?>
                                                <?php echo '&nbsp;&nbsp;<span class="text-secondary"> Kursi '.$kt->nomor_kursi.' : </span>'; ?><?php if($kt->status_order == 0) echo '<span class="fa fa-check text-success"></span>'; else  echo '<span class="fa fa-times text-danger"></span>' ; ?><br />
                                            <?php  } ?>
                                        <?php  } ?>
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

