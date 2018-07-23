<div class="wrapper">
  <nav class="navbar navbar-default navbar-fixed-top" style="background: #dc3545">
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <span class="navbar-brand" href="#"><?php echo $header; ?></span>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <ul class="nav navbar-nav navbar-right" style="padding-top: 9px;">
            <span style="color: #fff;">Welcome admin,</span>&nbsp;&nbsp;&nbsp;&nbsp;
            <a class="btn btn-primary" href="<?php echo base_url('user/logout')?>" style="background: #fff; border: none;color: #0f0f0f;"><i class="glyphicon glyphicon-log-out"></i> Logout</a>
      </ul>
    <div>
  </nav>
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <aside class="sidebar" style="background: #676a6c;">
      <div class="menu">
        <ul class="menu-content">
          <li class="<?php if($this->uri->segment(2) == 'dashboard'){echo 'active';} ?>"><a href="<?php echo base_url(); ?>admin/dashboard"><i class="glyphicon glyphicon-home" class="sMenu"></i> Home </a></li>
          <li data-toggle="collapse" data-target="#products" class="collapsed <?php if($this->uri->segment(2) == 'lists' || $this->uri->segment(2) == 'tersedia' || $this->uri->segment(2) == 'setharga'){echo 'aktiv';} ?>">
            <a href="#" ><i class="glyphicon glyphicon-book"></i> Data Mobil<span class="caret pull-right"></span></a>
            <ul class="submenu collapse " id="product">
              <li class="<?php if($this->uri->segment(2) == 'lists'){echo "active";}?> "><a href="<?php echo base_url(); ?>admin/lists"><i class="glyphicon">&nbsp;</i> Tambah / list</a></li>
              <li class="<?php if($this->uri->segment(2) == 'tersedia'){echo "active";}?> "><a href="<?php echo base_url(); ?>admin/tersedia"><i class="glyphicon">&nbsp;</i> Tersedia</a></li>
              <li class="<?php if($this->uri->segment(2) == 'setharga'){echo "active";}?> "><a href="<?php echo base_url(); ?>admin/setharga"><i class="glyphicon">&nbsp;</i> Set harga</a></li>
            </ul>
          </li>
          <li class="<?php if($this->uri->segment(2) == 'driver'){echo 'active';} ?>"><a href="<?php echo base_url('admin/driver'); ?>"><i class="glyphicon glyphicon-user"></i> Driver </a></li>
          <li class="<?php if($this->uri->segment(2) == 'ordered'){echo 'active';} ?>"><a href="<?php echo base_url('admin/ordered'); ?>"><i class="glyphicon glyphicon-shopping-cart"></i> Ordered <span class="badge" style="background-color: red"><div id="count_ordered"></div></span></a></li>
          <li class="mobile"><a href="<?php echo base_url('admin/passwd') ?>">Ganti password</a></li>
          <li class="mobile"><a href="<?php echo base_url('logout')?>">Logout</a></li>
        </ul>
      </div>
    </aside>
  </div>
