  <?php

  //Array Hari
  $array_hari = array(1=>"Senin","Selasa","Rabu","Kamis","Jumat", "Sabtu","Minggu");
  $hari = $array_hari[date("N")];

  //Format Tanggal
  $tanggal = date ("j");

  //Array Bulan
  $array_bulan = array(1=>" Januari "," Februari "," Maret ", " April ", " Mei ", " Juni "," Juli "," Agustus "," September "," Oktober ", " November "," Desember ");
  $bulan = $array_bulan[date("n")];

  //Format Tahun
  $tahun = date("Y");

  ?>
    <div class="text-right"><button class="btn btn-danger"><b><?php echo $hari . ", " . $tanggal . $bulan . $tahun ?></b></button></div>
    <!-- content -->
    <h1 class="my-4 text-center">
    </h1>
    <div class="row">
      <?php foreach($mobil_tersedia as $mt){ ?>
        <?php foreach($tampilDriver as $td) {?>
          <?php if($mt->driver_id == $td->id) {?>

            <!-- start of modals -->
            <div class="modal fade" id="<?php echo $mt->plat_no ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Detail driver</h4>
                  </div>
                  <div class="modal-body text-center clearfix">
                    <div class="col-sm-12 "><img src="<?php echo $td->image?>" alt="" class="img-circle" width="200px" height="200px"></div>
                    <div class="col-sm-12">&nbsp;</div>

                    <div class="col-sm-12">
                      <label>Nama Lengkap</label><br>
                      <b><i><font color="red"><?php echo $td->nama_lgkp ?></font></i></b>
                    </div>
                    <div class="col-sm-12">&nbsp;</div>

                    <div class="col-sm-12">
                      <label>Tempat lahir</label><br>
                      <b><i><font color="red"><?php echo $td->tempat_lhr ?></font></i></b>
                    </div>
                    <div class="col-sm-12">&nbsp;</div>

                    <div class="col-sm-12">
                      <label>Tanggal lahir</label><br>
                      <b><i><font color="red"><?php echo $td->tanggal_lhr ?></font></i></b>
                    </div>
                    <div class="col-sm-12">&nbsp;</div>

                    <div class="col-sm-12">
                      <label>Alamat</label><br>
                      <b><i><font color="red"><?php echo $td->alamat ?></font></i></b>
                    </div>
                    <div class="col-sm-12">&nbsp;</div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- end of modals -->

          <?php } ?>
        <?php } ?>
      <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
          <div class="caption text-center">
            <h4 class="text-center">
              <b class="text-image">
                <button data-toggle="modal" data-target="#<?php echo $mt->plat_no?>" class="btn btn-primary ld">Lihat driver</button>
                <!-- menampilkan merek dan plat nomor mobil -->
                <?php
                echo strtoupper($mt->merek)." (".substr($mt->plat_no,0,2).' '.substr($mt->plat_no,2,4).' '.substr($mt->plat_no,6,7).")";
                ?>
              </b>
              <!-- menampilkan gambar mobil -->
              <img src="<?php echo base_url($mt->img)?>" class="img-mobil">
            </h4>
          </div>
          <div class="caption">
            <!-- menampilkan nomor urut kursi, harga, keterangan kursi & status mobil -->
            <font color='red'>*</font> Posisi kursi : <p>
            <?php
            foreach($kursi_tersedia as $kt){
              if($mt->plat_no == $kt->plat_no_mobil){
                if($kt->id_kategori == 1){
            ?>
            <div class="btn-group" title="<?php if($kt->status == 1){echo "Sudah ada penumpang";}else{echo "Belum ada penumpang";}?>">
              <button class="btn btn-default" <?php if($kt->status == 1){echo "disabled";}?>>
              <?php echo $kt->no_kursi?>
                <!-- menampilkan centang hijau apabila kursi belum dipesan dan x merah apabila sudah di pesan pada kursi depan -->
                <?php if($kt->status == 1) { echo '<font color="red"><i class="glyphicon glyphicon-remove"></i></font>'; } 
                      else { echo '<font color="green"><i class ="glyphicon glyphicon-ok"></i></font>'; } ?>
              </button>
            </div>
            <div class="btn-group harga">
              <?php
              foreach($kursi_kategori as $kk){
                if($kk->id_kategori == 1){
                  echo "&nbsp;&nbsp;<b>Rp ".number_format("$kk->kursi_hrg","0",",",".")."</b>"; # harga kursi bagian depan
                }
              }
              ?>
            </div>
            <p>
            <?php
                }
                elseif($kt->id_kategori == 2){
            ?>
            <div class="btn-group" title="<?php if($kt->status == 1){echo "Sudah ada penumpang";}else{echo "Belum ada penumpang";}?>">
              <button class="btn btn-default" <?php if($kt->status == 1){echo "disabled";}?>>
                <?php echo $kt->no_kursi?>
                  <!-- menampilkan centang hijau apabila kursi belum dipesan dan x merah apabila sudah di pesan pada kursi tengah-->
                  <?php if($kt->status == 1) { echo '<font color="red"><i class="glyphicon glyphicon-remove"></i></font>'; } 
                        else { echo '<font color="green"><i class ="glyphicon glyphicon-ok"></i></font>'; } ?>
              </button>
            </div>
            <?php
                }
              }
            }
            ?>
            <div class="btn-group harga">
              <?php
              foreach($kursi_kategori as $kk){
                if($kk->id_kategori == 2){
                  echo "&nbsp;&nbsp;<b>Rp ".number_format("$kk->kursi_hrg","0",",",".")."</b>"; # harga kursi bagian tengah
                }
              }
              ?>
            </div>
            <?php
            echo "<p>";
            foreach($kursi_tersedia as $kt){
              if($mt->plat_no == $kt->plat_no_mobil){
                if($kt->id_kategori == 3){
            ?>
            <div class="btn-group" title="<?php if($kt->status == 1){echo "Sudah ada penumpang";}else{echo "Belum ada penumpang";}?>">
              <button class="btn btn-default" <?php if($kt->status == 1){echo "disabled";}?>>
                <?php echo $kt->no_kursi?>
                  <!-- menampilkan centang hijau apabila kursi belum dipesan dan x merah apabila sudah di pesan pada kursi belakang-->
                  <?php if($kt->status == 1) { echo '<font color="red"><i class="glyphicon glyphicon-remove"></i></font>'; }
                        else { echo '<font color="green"><i class ="glyphicon glyphicon-ok"></i></font>'; } ?>
              </button>
            </div>
            <?php
                }
              }
            }
            ?>
            <div class="btn-group harga">
              <?php
              foreach($kursi_kategori as $kk){
                if($kk->id_kategori == 3){
                  echo "&nbsp;&nbsp;<b>Rp ".number_format("$kk->kursi_hrg","0",",",".")."</b>"; # harga kursi bagian belakang
                }
              }
              ?>
            </div>
            <br><br><font color='red'>*</font> Keterangan : <br>
            <?php 
            foreach($kursi_tersedia as $k){ 
            if($mt->plat_no == $k->plat_no){ ?>
            <div class="btn-group">
              <?php echo "&nbsp;&nbsp;&nbsp;- Kursi ".$k->no_kursi." :";
              if($k->status == 1){ 
                echo "<font color='red'><b><i>&nbsp;Sudah ada penumpang</i></b></font>";
              }   
              else{
                echo " Belum ada penumpang";
              }   

              ?>  
            </div>
            <br>
            <?php 
              } 
            } 
            echo "<br><font color='red'>*</font> Status mobil : ";
            if($mt->sdh_jln == 'y'){
              echo "<font color='red'><b><i>Sudah berangkat</i></b></font>";}
            else{
              echo "Belum berangkat";}
            ?>  
            <br><br><font color='red'>*</font> Pesan : Hub. <b>082348366034</b>
          </div>
        </div>  
      </div>
      <?php
      }
      ?>
    </div>
    <!-- akhir content -->
