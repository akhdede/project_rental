<?php echo $this->session->flashdata('message'); ?>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Tambah Mobil</h3>
  </div>
  <div class="panel-body">
    <?php echo form_open_multipart('admin/lists/save', 'id=myForm');?>
      <div class="col-sm-2">
        <label>Plat no. <span class="bintang">*</span></label>
        <?php $plat = isset($_POST['simpan'])?$_POST['plat']:''; ?>
        <?php echo form_input(array(
        'name' => 'plat',
        'class' => 'form-control required',
        'id' => 'plat',
        'placeholder' => 'Plat no.',
        'onkeydown' => 'upperCaseF(this)',
        'title' => 'Plat nomor harus diisi!'
        ));?>
      </div>
      <div class="col-sm-5">
        <label>Merek Mobil <span class="bintang">*</span></label>
        <?php $merek = isset($_POST['simpan'])?$_POST['merek']:''; ?>
        <?php echo form_input(array(
        'name' => 'merek',
        'class' => 'form-control required',
        'placeholder' => 'Merek',
        'title' => 'Merek harus diisi!'
        ));?>
      </div>
      <div class="col-sm-3">
        <label>Gambar Mobil <span class="bintang">*</span></label>
        <input type="file" name="img" id="fup" class="required" title="Gambar harus diupload!" >
      </div>
      </br>
      <?php echo form_submit(array(
      'name' => 'simpan',
      'type' => 'submit',
      'value' => 'Simpan',
      'class' => 'btn btn-primary'
      ));?>
    </form>
  </div>
  <div class="panel-footer clearfix">
    <div class="pull-right ">
      <?php echo form_open('admin/lists/index/0');?>
        <?php $by = isset($_POST['tampil'])?$_POST['by']:''; ?>
        <div class="col-sm-5 col-sm-offset-4">
          <input type="text" name="by" placeholder="Filter by plat no." class="form-control" value="<?php echo $by; ?>">
        </div>
        <div class="col-sm-3">
          <?php
          echo form_submit(array(
          'name' => 'tampil',
          'type' => 'submit',
          'value' => 'Tampilkan',
          'class' => 'btn btn-warning'
          ));?>
        </div>
      </form>
    </div>
  </div>
<!-- menampilkan table keseluruhan -->
  <?php if(ISSET($_POST['tampil']) || $this->uri->segment(4) == '0' || $this->uri->segment(4) == TRUE){ ?>
  <div class="panel-body">
    <?php if($_POST['by'] == '') {?>
    <table class="table">
      <thead>
        <tr>
          <th width="100px">No.</th>
          <th width="200px">Plat No.</th>
          <th width="200px">Merek Mobil</th>
          <th width="200px">Gambar Mobil</th>
          <th width="200px">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if($cData < 1) { ?>
          <tr>
            <td width="900px"><font color="red">Data masih kosong!</font></td>
          </tr>
        <?php }else{ ?>
          <?php $no = $this->uri->segment('4') + 1; 
          foreach ($listMbl as $l) { 
          ?>
            <tr>
              <td>
                <?php echo $no++ ?>
              </td>
              <td>
                <?php echo substr($l->plat_nomor,0,2).' '.substr($l->plat_nomor,2,4).' '.substr($l->plat_nomor,6,7) ?>
              </td>
              <td>
                <?php echo $l->merek ?>
              </td>
              <td>
                <img class="thumbnail" width="100px" src="<?php echo base_url($l->img); ?>">
              </td>
              <td>
                <a href="<?php echo base_url().'admin/lists/edit/'.$l->id ?>">
                  <i class="glyphicon glyphicon-pencil"></i>
                </a> | 
                <a href="<?php echo base_url().'admin/lists/delete/'.$l->id ?>" onclick="javascript: return confirm('Are you sure delete this data?')">
                  <i class="glyphicon glyphicon-trash"> </i>
                </a>
              </td>
            </tr>
          <?php }; ?>
        <?php }; ?>
      </tbody>
    </table>
    <?php } else {?>
    
    <!-- menampilkan table yang difilter -->
    <table class="table">
      <thead>
        <tr>
          <th width="100px">No.</th>
          <th width="200px">Plat No.</th>
          <th width="200px">Merek Mobil</th>
          <th width="200px">Gambar Mobil</th>
          <th width="200px">Aksi</th>
        </tr>
      </thead>
        <tbody>
          <?php if($_POST['by'] == $found['plat_nomor']) { ?>
          <?php $no = $this->uri->segment('3') + 1; foreach ($filterMbl as $l) { ?>
          <tr>
            <td>
              <?php echo $no++ ?>
            </td>
            <td>
              <?php echo $l->plat_nomor ?>
            </td>
            <td>
              <?php echo $l->merek ?>
            </td>
            <td>
              <img class="thumbnail" width="100px" src="<?php echo base_url($l->img); ?>">
            </td>
            <td>
            <a href="<?php echo base_url().'admin/lists/edit/'.$l->id ?>"> 
              <i class="glyphicon glyphicon-pencil"></i>
            </a> | 
            <a href="<?php echo base_url().'admin/lists/delete/'.$l->id?>" onclick="javascript: return confirm('Are you sure delete this data?')">
              <i class="glyphicon glyphicon-trash"> </i> 
            </a>
            </td>
          </tr>
          <?php }; ?>
          <?php } else { ?>
          <tr>
            <td width="900px"><font color="red">Data tidak ditemukan!</font></td>
          </tr>
        <?php } ?>
        </tbody>
    </table>
  <?php } ?>
  </div>
  <div class="panel-footer">
    <?php 
    if($_POST['by'] == '') { 
    echo $this->pagination->create_links(); 
    } else {
    echo 'Hasil filter : <b>'.$by.'</b>';
    }
    ?>
  </div>
  <?php } ?>
</div>
