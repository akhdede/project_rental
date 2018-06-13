<div class="col-md-6 col-md-offset-3">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Harga Kursi</h3>
    </div>
    <form action="<?php echo base_url('admin/setharga/update')?>" method="post">
      <div class="panel-body">
      <?php foreach($eHarga as $e) { ?>
        <input type="hidden" name="id" value="<?php echo $e->id ?>">
        <div class="col-md-4">
          <label for="kursi">Kursi <?php echo $e->posisi ?>:</label>
        </div>
        <div class="col-md-4">
          <input type="text" name="harga" class="form-control" value="<?php echo $e->harga ?>">
        </div>
        <div class="col-md-2">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      <?php } ?>
      </div>
    </form>
  </div>
</div>
