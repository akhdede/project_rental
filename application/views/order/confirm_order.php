<!-- ========================================== start of main ========================================== -->
<main role="main">
    <div class="album py-5 bg-light" style="margin-top: -30px;">
        <div class="container">
            <?php echo $this->session->flashdata('message'); ?>
            <div class="row">
                <!-- start album -->
                <?php if(!empty($bayar[0]->harga)){ ?>
                    <?php foreach($group_order as $go) {?>
                        <div class="col-md-8 offset-md-2" style="margin-top:20px; padding: 20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 10px 0 rgba(0, 0, 0, 0.10);">
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
                                Silahkan melakukan pembayaran langsung ke Pangkalan CV. New Garuda Jaya Totabuan atau transfer ke rekening <b>No. 021333445555 An. New Garuda Totabuan</b>.<br>
                                Kode pemesanan anda : <?php foreach($get_kode as $b){ if($go->tanggal_pesan == $b->tanggal_pesan){echo '<b>'.$b->kode.'</b>';}} ?> (tunjukkan kode ini saat melakukan pembayaran).<br><br>
                                <a href="<?php echo 'cancel_order/'.$go->kode ?>" onclick="javascript: return confirm('Apakah anda akan membatalkan pesanan ini?')" class="btn btn-danger btn-sm text-white">Batalkan pesanan</a>

                            <!-- modal for upload bukti pembayaran --> 
                            <!-- trigger -->
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                                Upload bukti pembayaran
                            </button>

                            <!-- modals for upload-->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <?php echo form_open_multipart('order/upload_bukti_pembayaran', 'id=myForm');?>
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Upload bukti pembayaran</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <input type="hidden" name="kode_pesanan" value="<?= $go->kode ?>">
                                        <input type="file" name="img_transfer">
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Upload</button>
                                      </div>
                                    </form>
                                </div>
                              </div>
                            </div>

                            <!-- modals for lihat bukti-->
                            <div class="modal fade" id="bukti" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <?php echo form_open_multipart('order/upload_bukti_pembayaran', 'id=myForm');?>
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                      <img src="<?php echo base_url($go->img_transfer) ?>" class="img-thumbnail">
                                      </div>
                                    </form>
                                </div>
                              </div>
                            </div>

                            <?php if(!empty($go->img_transfer)) { ?>
                                <a href="#" class="" data-toggle="modal" data-target="#bukti">
                                Lihat bukti pembayaran
                                </a>
                            <?php } ?>
                            <br>
                            <br>
                            <?php foreach($get_kode as $gk){?>
                                <?php if($go->tanggal_pesan == $gk->tanggal_pesan){ ?>
                                    <small>Dipesan pada tanggal <?php echo str_replace(' ',' pukul ', $gk->tanggal_pesan); ?></b><br></small><br>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    <?php } ?>
                <?php }else{ ?>
                    <?php redirect('welcome')?>
                <?php } ?>
                <!-- end album -->
            </div>
        </div>
    </div>
</main>
<!-- ========================================== end of main ========================================== -->
