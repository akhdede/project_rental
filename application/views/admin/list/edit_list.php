  <div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Tambah Mobil</h3>
  </div>
  <div class="panel-body">
    <?php echo form_open_multipart('admin/lists/update', 'id=myForm');?>
      <?php foreach($editList as $e) { ?>
        <input type="hidden" name='id' value="<?php echo $e->id; ?>">
        <input type="hidden" name='gambar' value="<?php echo $e->img; ?>">
        <div class="col-sm-2">
          <label>Plat no. <span class="bintang">*</span></label>
          <?php echo form_input(array(
          'name' => 'plat',
          'class' => 'form-control required',
          'id' => 'plat',
          'placeholder' => 'Plat no.',
          'onkeydown' => 'upperCaseF(this)',
          'value' => $e->plat_nomor,
          'title' => 'Plat nomor harus diisi!'
          ));?>
        </div>
        <div class="col-sm-5">
          <label>Merek Mobil <span class="bintang">*</span></label>
          <?php echo form_input(array(
          'name' => 'merek',
          'class' => 'form-control required',
          'placeholder' => 'Merek',
          'value' => $e->merek,
          'title' => 'Merek harus diisi!'
          ));?>
        </div>
        <div class="col-sm-3">
          <label>Gambar Mobil <span class="bintang">*</span></label>
          <img src="<?php echo base_url().$e->img; ?>" class="thumbnail" width="100px">
            Ukuran : 18,5cm x 10,5cm
          <input type="file" name="img" id="fup" title="Gambar harus diupload!" >
        </div>
        </br>
        <?php echo form_submit(array(
        'name' => 'simpan',
        'type' => 'submit',
        'value' => 'Simpan',
        'class' => 'btn btn-primary'
        ));?>
      <?php } ?>
    </form>
  </div>
</div>


