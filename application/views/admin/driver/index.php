<?php echo $this->session->flashdata('message'); ?>
<div class="col-sm-12">
  <a href="<?php echo base_url('admin/driver/add')?>"><button class="btn btn-primary">Tambah</button></a>
  <br><br>
  <table class="table">
    <tr>
      <thead>
        <th>No.</th>
        <th>Nama Lengkap</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Alamat</th>
        <th>Foto</th>
        <th>Aksi</th>
      </thead>
    </tr>
  <?php $no = 1; ?>
  <?php foreach($driver as $t){ ?>
    <tr>
      <tbody>
        <td><?php echo $no++ ?></td>
        <td><?php echo $t->nama_lgkp; ?></td>
        <td><?php echo $t->tempat_lhr; ?></td>
        <td><?php echo $t->tanggal_lhr; ?></td>
        <td><?php echo $t->alamat; ?></td>
        <td><img src="<?php echo base_url($t->image) ?>" class="thumbnail" width="100px"></td>
        <td>
          <a href="<?php echo base_url('admin/driver/edit/'.$t->id); ?>"><span class="glyphicon glyphicon-pencil"><span></span></a> | 
          <a href="<?php echo base_url('admin/driver/delete/'.$t->id); ?>" onclick="javascript: return confirm('Are you sure delete this data?')"><span class="glyphicon glyphicon-trash"></span></a>
        </td>
      </tbody>
    </tr>
  <?php } ?>
  </table>
</div>
