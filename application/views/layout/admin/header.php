<div class="wrapper">
  <nav class="navbar navbar-default navbar-fixed-top">
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
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i> <span class="username">admin</span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url('admin/passwd') ?>"><i class="glyphicon glyphicon-lock"></i> Ganti password</a></li>
            <li><a href="<?php echo base_url('logout')?>"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    <div>
  </nav>
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <aside class="sidebar">
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
          <li class="mobile"><a href="<?php echo base_url('admin/passwd') ?>">Ganti password</a></li>
          <li class="mobile"><a href="<?php echo base_url('logout')?>">Logout</a></li>
        </ul>
      </div>
    </aside>
  </div>
