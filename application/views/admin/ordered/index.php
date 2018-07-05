<?php echo $this->session->flashdata('message'); ?>
<div class="col-sm-12">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <div class="panel-title">Daftar Pesanan</div>
    </div>
    <div class="panel-body">
    <?php if($ordered->num_rows() > 0){ ?>
        <?php echo form_open('admin/ordered');?>
            <div class="col-sm-3">
                <div class="form-group">
                    <input type="text" placeholder="Masukkan kode pesanan" class="form-control" name="filter" value="<?php echo $kode;?>">
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div> 
        </form>
        <div class="col-sm-12">
          <table class="table">
            <thead>
              <tr height="50px">
                <th>No.</th>
                <th>Nama costumer</th>
                <th>No. Handphone</th>
                <th>Nomor kursi</th>
                <th>Plat nomor</th>
                <th>Total bayar</th>
                <th>Kode pesanan</th>
                <th>Konfirmasi</th>
              </tr>
            </thead>
            <?php if(isset($_POST['filter']) and !empty($_POST['filter'])) { ?>
                <?php if($filter->num_rows() > 0) {?>
                    <?php $no = 1; foreach($filter->result() as $o) { ?>
                        <tbody>
                          <tr height="50px">
                            <td><?php echo $no++ ?></td>
                            <td>
                                <?php
                                $array_user = array();
                                foreach($user as $u){
                                    if($o->kode == $u->kode){
                                        $array_user[] = $u->nama_lengkap;
                                        echo $array_user[0];
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                $array_user = array();
                                foreach($user as $u){
                                    if($o->kode == $u->kode){
                                        $array_user[] = $u->nomor_handphone;
                                        echo $array_user[0];
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                $array_kursi = array();
                                foreach($urai as $u){
                                    if($o->kode == $u['kode']){
                                        $array_kursi[] = $u['nomor_kursi'];
                                    }
                                }
                                foreach($array_kursi as $a){
                                    echo ' ['.$a.']';
                                }
                                ?>
                            </td>
                            <td><?php echo $o->plat_nomor ?></td>
                            <td>
                                <?php 
                                $array_harga = array();
                                foreach($urai as $u){
                                    if($o->kode == $u['kode']){
                                        $array_harga[] = $u['harga'];
                                    }
                                }
                                        echo 'Rp. '.number_format(array_sum($array_harga));
                                ?>
                            </td>
                            <td><?php echo $o->kode ?></td>
                            <td>
                                <a href="<?php echo base_url('admin/ordered/konfirmasi/').$o->kode.'/true' ?>" onclick="javascript: return confirm('Anda yakin costumer ini sudah melakukan pembayaran?')" class="btn btn-primary btn-sm">ya</a> 
                                <a href="<?php echo base_url('admin/ordered/konfirmasi/').$o->kode.'/false' ?>" onclick="javascript: return confirm('Anda yakin ingin membatalkan transaksi costumer ini?')" class="btn btn-danger btn-sm">tidak</a>
                            </td>
                          </tr>
                          <tr><td colspan=10></td></tr>
                          <tr><td colspan=10 style="border: 0px"><font color=red>*</font> Hasil filter kode pesanan : <?php echo $this->input->post('filter');?></td></tr>
                        </tbody>
                    <?php } ?>
                <?php }else{ ?>
                    <tr><td colspan=10 style="border: 0px"><font color=red>Pesanan tidak ditemukan!</font></td></tr>
                    <tr><td colspan=10 style="border: 0px"><font color=red>*</font> Hasil filter kode pesanan : <?php echo $this->input->post('filter');?></td></tr>
                <?php } ?>
            <?php }else{ ?>
                <?php $no = 1; foreach($ordered->result() as $o) { ?>
                    <tbody>
                      <tr height="50px">
                        <td><?php echo $no++ ?></td>
                        <td>
                            <?php
                            $array_user = array();
                            foreach($user as $u){
                                if($o->kode == $u->kode){
                                    $array_user[] = $u->nama_lengkap;
                                    echo $array_user[0];
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $array_user = array();
                            foreach($user as $u){
                                if($o->kode == $u->kode){
                                    $array_user[] = $u->nomor_handphone;
                                    echo $array_user[0];
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $array_kursi = array();
                            foreach($urai as $u){
                                if($o->kode == $u['kode']){
                                    $array_kursi[] = $u['nomor_kursi'];
                                }
                            }
                            foreach($array_kursi as $a){
                                echo ' ['.$a.']';
                            }
                            ?>
                        </td>
                        <td><?php echo $o->plat_nomor ?></td>
                        <td>
                            <?php 
                            $array_harga = array();
                            foreach($urai as $u){
                                if($o->kode == $u['kode']){
                                    $array_harga[] = $u['harga'];
                                }
                            }
                                    echo 'Rp. '.number_format(array_sum($array_harga));
                            ?>
                        </td>
                        <td><?php echo $o->kode ?></td>
                        <td>
                            <a href="<?php echo base_url('admin/ordered/konfirmasi/').$o->kode.'/true' ?>" onclick="javascript: return confirm('Anda yakin costumer ini sudah melakukan pembayaran?')" class="btn btn-primary btn-sm">ya</a> 
                            <a href="<?php echo base_url('admin/ordered/konfirmasi/').$o->kode.'/false' ?>" onclick="javascript: return confirm('Anda yakin ingin membatalkan transaksi costumer ini?')" class="btn btn-danger btn-sm">tidak</a>
                        </td>
                      </tr>
                    </tbody>
                <?php } ?>
            <?php } ?>
          </table>
            <?php }else{ ?>
            <h4><font color="red">Tidak ada pesanan</font></h4>
            <?php } ?>
        </div>
    </div>
  </div>
</div>
