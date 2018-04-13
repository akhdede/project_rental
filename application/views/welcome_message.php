<!-- ========================================== start of header ========================================== -->
<header>
    <div class="collapse bg-danger" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                    <h4 class="text-white">About</h4>
                    <p class="text-black">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
                </div>
                <div class="col-sm-4 offset-md-1 py-4">
                    <h4 class="text-white">Contact</h4>
                    <ul class="list-unstyled">
                        <li><span class="text-black">082348366034</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-dark bg-danger box-shadow">
        <div class="container d-flex justify-content-between">
            <a href="#" class="navbar-brand d-flex align-items-center">
                <span class="fa fa-car" style="margin-right: 10px;"></span>
                <strong>CV. Garuda Jaya Totabuan</strong>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</header>
<!-- ========================================== end of header ========================================== -->

<!-- ========================================== start of main ========================================== -->

<main role="main">

    <!-- start jumbotron -->
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Selamat datang</h1>
            <p class="lead text-muted">Untuk memesan kursi silahkan login terlebih dahulu. Jika belum punya akun segera lakukan pendaftaran.</p>
            <p>
                <a href="#" class="btn btn-primary btn-lg my-2">Login</a>
                <a href="#" class="btn btn-danger btn-lg my-2">Daftar</a>
            </p>
        </div>
    </section>
    <!-- end jumbotron -->

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">

                <!-- start album -->
                <?php foreach($mobil_tersedia as $mt){ ?>
                    <div class="col-md-4 album-show">
                        <button class="btn btn-danger btn-lg"><span class="fa fa-shopping-cart"></span> Pesan</button>
                        <span class="album-light">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap">
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
                                                <span class="text-secondary"><?php echo '- Kursi '.$kh->posisi.' Rp.'.$kh->harga.'<i> ( '.$kh->keterangan.' )</i>'; ?></span><br />
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

<!-- ========================================== start of footer ========================================== -->

<footer class="text-muted">
    <div class="container">
        <p class="float-right">
            <a href="#">Back to top</a>
        </p>
        <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
        <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a href="../../getting-started/">getting started guide</a>.</p>
    </div>
</footer>
<!-- ========================================== end of footer ========================================== -->
