<?php echo $this->session->flashdata('message'); ?>
<?php $tanggal_sekarang = date('d-m-Y'); ?>
<div class="col-sm-12">
  <ul class="nav nav-tabs tersedia">
    <li role="presentation" class="active"><a href="#">Mobil Tersedia</a></li>
    <li role="presentation"><a href="<?php echo base_url('admin/tersedia/kursi_dipesan')?>">Kursi dipesan</a></li>
  </ul>
</div>
<div class="col-sm-12">&nbsp;</div>
<div class="col-sm-12">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <div class="panel-title">Mobil tersedia</div>
    </div>
    <div class="panel-body">
      <table class="table">
        <thead>
          <tr height="50px">
            <th width="30px">No.</th>
            <th width="50px">Plat No.</th>
            <th width="150px">Merek</th>
            <th width="155px">Tersedia</th>
            <th width="155px">Sudah Jalan</th>
          </tr>
        </thead>
          <?php $no = 1; foreach($mblDetails as $md) { ?>
            <tbody>
              <tr height="50px">
                <td><?php echo $no++ ?></td>
                <td><?php echo $md->plat_nomor ?></td>
                <td><?php echo $md->merek ?></td>
                <td>
                  <!-- start of modals -->
                  <div class="modal fade" id="<?php echo $md->plat_nomor ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="exampleModalLabel">Nama driver</h4>
                        </div>
                        <div class="modal-body">
                        <form action="<?php echo base_url('admin/tersedia/addMobil')?>" method="post">
                            <div class="form-group">
                                <input type="hidden" name="plat_nomor" value="<?php echo $md->plat_nomor ?>">
                                <input type="hidden" name="merek" value="<?php echo $md->merek ?>">
                                <input type="hidden" name="img" value="<?php echo $md->img ?>">
                                <?php $tanggal_tersedia = date('d-m-Y'); ?>
                                <input type="hidden" name="tanggal_tersedia" value="<?php echo $tanggal_tersedia ?>">
                              <label for="driver_id" class="control-label">Nama Driver</label>
                                <select class="form-control" name="driver_id">
                                  <option value="">- pilihan -</option>
                                  <?php foreach($getDriver as $g){ ?>
                                    <option <?php foreach($mblTersedia as $mt){ if(in_array($g->id,array($mt->id_sopir))){echo "disabled";} } ?> value="<?php echo $g->id ?>"><?php echo $g->nama_lengkap ?></option>
                                  <?php } ?>
                                </select>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Pesan</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end of modals -->
                  <button data-toggle="modal" data-target="#<?php echo $md->plat_nomor ?>" type="button" class="btn btn-primary btn-sm"

                      <?php foreach($mblTersedia as $mt) { ?>
                        <?php if($md->plat_nomor == $mt->plat_nomor){ echo "disabled"; } ?>
                      <?php } ?>
                      >Ya</button>
                  <?php foreach($mblTersedia as $mt) { ?>
                    <?php if($md->plat_nomor == $mt->plat_nomor) { ?>
                            <a href="<?php echo base_url('admin/tersedia/delete/').$mt->plat_nomor ?>" onclick="javascript: return confirm('Apakah anda yakin akan membatalkan mobil ini?')">
                                <input <?php if($mt->sudah_jalan == 'y') echo 'disabled'; ?> type="button" class="btn btn-danger btn-sm" value="Batal">
                            </a>
                    <?php } ?>
                  <?php } ?>
                </td>
                <td>
                <?php foreach($mblTersedia as $mt) { ?>
                    <?php if($md->plat_nomor == $mt->plat_nomor) { ?>
                        <a href="<?php echo base_url().'admin/tersedia/mblJalan/'.$mt->plat_nomor.'/y' ?>" onclick="javascript: return confirm('Apakah anda yakin bahwa mobil ini sudah berangkat?')">
                            <input type="button" class="btn btn-primary btn-sm" value="Ya" <?php if($mt->sudah_jalan == 'y'){ echo "disabled";}?>></a>
                    <?php } ?>
                <?php } ?>
                <?php foreach($mblTersedia as $mt) { ?>
                    <?php if($md->plat_nomor == $mt->plat_nomor) { ?>
                        <a href="<?php echo base_url().'admin/tersedia/mblJalan/'.$mt->plat_nomor.'/n' ?>" onclick="javascript: return confirm('Apakah anda yakin akan membatalkan keberangkatan mobil ini?')">
                            <input type="button" class="btn btn-primary btn-sm" value="Batal" <?php if($mt->sudah_jalan == 'n'){echo "disabled";}?>>
                        </a>
                    <?php } ?>
                <?php } ?>
                </td>
              </tr>
            </tbody>
          <?php } ?>
      </table>
    </div>
  </div>
</div>
