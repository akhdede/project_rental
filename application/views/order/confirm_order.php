<!-- ========================================== start of main ========================================== -->
<main role="main">
    <div class="album py-5 bg-light" style="margin-top: -30px;">
        <div class="container">
            <div class="row">
                <!-- start album -->
                <?php foreach($group_order as $go) {?>
                    <div class="col-md-8 offset-md-2" style="margin-top:20px; padding: 20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 10px 0 rgba(0, 0, 0, 0.10);">
                        <?php if(!empty($bayar[0]->harga)){ ?>
                            Hai <?php echo $_SESSION['nama_lengkap'] ?>, terimakasih telah melakukan pemesanan di rental kami. Berikut rincian pesanan anda :
                            <table class="table" style="margin-top: 10px;">
                                <thead>
                                    <tr class="font-weight-bold">
                                        <td width=300>Plat Nomor Mobil</td>
                                        <td width=300>Nomor Kursi</td>
                                        <td width=300>Harga</td>
                                    </tr>
                                </thead>
                                <?php foreach($bayar as $o) { ?>
                                    <?php if($go->tanggal_pesan == $o->tanggal_pesan){ ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $o->plat_nomor ?></td>
                                                <td><?php echo $o->nomor_kursi ?></td>
                                                <td><?php echo 'Rp.'.number_format("$o->harga","0",",",".") ?></td>
                                            </tr>
                                        </tbody>
                                    <?php } ?>
                                <?php } ?>
                                <tr>
                                    <td class="text-center" colspan=2><b>Total Bayar</b></td>
                                    <?php foreach($total as $t){ ?>
                                        <?php if($go->tanggal_pesan == $t->tanggal_pesan) {?>
                                            <td><?php echo '<b>Rp.'.number_format("$t->harga","0",",",".").'<b>'; ?></td>
                                        <?php } ?>
                                    <?php } ?>
                                </tr>
                            </table>
                            Silahkan melakukan pembayaran langsung ke Pangkalan CV. New Garuda Jaya Totabuan.<br>
                            Kode pemesanan anda : <?php foreach($get_kode as $b){ if($go->tanggal_pesan == $b->tanggal_pesan){echo '<b>'.$b->kode.'</b>';}} ?> (tunjukkan kode ini saat melakukan pembayaran).<br><br>
                            <button class="btn btn-primary btn-sm">Cetak</button>
                            <button class="btn btn-danger btn-sm">Batalkan pesanan</button>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php foreach($get_kode as $gk){?>
                                <?php if($go->tanggal_pesan == $gk->tanggal_pesan){ ?>
                                    Dipesan pada tanggal <?php echo str_replace(' ',' pukul ', $gk->tanggal_pesan); ?></b><br><br>
                                <?php } ?>
                            <?php } ?>
                        <?php }else{ ?>
                            Harap lakukan pemesanan terlebih dahulu!.
                        <?php } ?>
                    </div>
                <?php } ?>
                <!-- end album -->
            </div>
        </div>
    </div>
</main>
<!-- ========================================== end of main ========================================== -->


