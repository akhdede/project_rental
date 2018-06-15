<?php echo $this->session->flashdata('message'); ?>
<div class="col-md-6 col-md-offset-3">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Harga Kursi</h3>
    </div>
    <div class="panel-body">
      <table class="table">
        <thead>
          <tr>
            <th>No.</th>
            <th>Kursi Posisi</th>
            <th>Kursi Harga</th>
            <th>Edit</th>
          </tr>
        </thead>
        <tbody>
        <?php $no = 1; ?>
        <?php foreach($vHarga as $v) { ?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $v->posisi ?></td>
            <td><?php echo 'Rp. '.number_format($v->harga) ?></td>
            <td>
              <a href="<?php echo base_url('admin/setharga/editharga/').$v->id ?>">
                <i class="glyphicon glyphicon-pencil"></i>
              </a>
            </td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
