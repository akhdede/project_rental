<!-- ========================================== start of main ========================================== -->
<main role="main">

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">

                <!-- start album -->
                <?php foreach($mobil_order as $mt){ ?>
                    <div class="col-md-4 col-sm-12 album-show">
                        <div class="card mb-4 mb-12 box-shadow">
                            <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap">
                            <div class="card-body">
                                <span class="card-text font-weight-bold text-dark">
                                    <h4 class="text-center"><?php echo $mt->merek.' ('.$mt->plat_nomor.') '; ?></h4>
                                </span><br />
                                <h5>
                                    <?php foreach($kursi_order as $kt){ ?>
                                        <?php if($mt->plat_nomor == $kt->plat_nomor){ ?>
                                            <?php if($kt->nomor_kursi == 1) { ?>
                                                <a class="btn <?php if($kt->status_order == 0){echo 'btn-primary';}else{echo 'btn-secondary disabled';} ?> text-white" style="margin: 2px 0;" >Kursi <?php echo $kt->nomor_kursi; ?></a><br>
                                            <?php } ?>
                                            <?php if($kt->nomor_kursi != 1) { ?>
                                                <a class="btn <?php if($kt->status_order == 0){echo 'btn-primary';}else{echo 'btn-secondary disabled';} ?> text-white" style="margin: 2px 0;">Kursi <?php echo $kt->nomor_kursi; ?></a>
                                            <?php } ?>
                                        <?php  } ?>
                                    <?php  } ?>
                                </h5>
                                <br><hr>
                                <small class="text-muted">
                                    <span class="text-secondary">Harga sewa : </span><br />
                                    <?php foreach($kursi_harga as $kh){ ?>
                                        <span class="text-secondary"><?php echo '- Kursi '.$kh->posisi.'<i> ( '.$kh->keterangan.' )</i> - Rp.'.$kh->harga; ?></span><br />
                                    <?php } ?>
                                </small>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <!-- end album -->
            </div>
        </div>
    </div>

</main>
<!-- ========================================== end of main ========================================== -->


