<?php echo $this->session->flashdata('message'); ?>
<div class="col-sm-12">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <div class="panel-title">Daftar Pesanan</div>
    </div>
    <div class="panel-body">
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
          <?php $no = 1; foreach($ordered as $o) { ?>
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
      </table>
    </div>
  </div>
</div>
