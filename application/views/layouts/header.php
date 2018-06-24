<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CV. New Garuda Jaya Totabuan | Rental</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/select2.min.css'); ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/album.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/fontawesome/css/fontawesome-all.css'); ?>"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 
    <style>
        *{
            font-family: 'Open Sans', sans-serif;
        }
    </style>
</head>
<body>    
<div id="test"></div>
<?php if($this->router->fetch_class() == 'welcome' or $this->router->fetch_class() == 'order') { ?>
    <header>
        <div class="collapse bg-danger" id="navbarHeader">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-7 py-4">
                        <h4 class="text-white">About</h4>
                        <p class="text-black">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
                    </div>
                    <div class="col-sm-4 offset-md-1 py-4">
                        <h4 class="text-white">Contact</h4>
                        <ul class="list-unstyled">
                            <li><span class="text-black">082348366034</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-dark bg-danger box-shadow">
            <div class="container d-flex justify-content-between">
                <a href="<?php echo base_url(); ?>" class="navbar-brand d-flex align-items-center">
                    <span class="fa fa-car" style="margin-right: 10px;"></span>
                    <strong><?php echo $title; ?></strong>
                </a>
                <?php if(isset($_SESSION['nama_lengkap'])){ ?>
                    <div class="btn-group">
                        <a href="#" onclick="update_message_status()" class="text-white fa fa-envelope fa-lg" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-decoration: none;"><span class="badge badge-danger"><div id="count_message"></div></span></a>
                        <div class="dropdown-menu dropdown-menu-right" id="link_message" style="height: 400px; overflow-y: auto;"></div>
                    </div>

                    <div class="btn-group">
                        <a href="#" class="text-white fa fa-shopping-cart fa-lg" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-decoration: none;"><span class="badge badge-danger"><div id="count_order"></div></span></a>
                        <div class="dropdown-menu dropdown-menu-right" id="link_order"></div>
                    </div>
                    <a href="<?php echo base_url('user/logout'); ?>" class="btn btn-light">Logout</a>
                <?php }else{ ?>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                <?php } ?>
            </div>
        </div>
    </header>
<?php } ?>
<?php if($this->router->fetch_class() === 'user') { ?>
    <header>
        <div class="navbar navbar-dark bg-light box-shadow border-top border-bottom">
            <div class="container d-flex justify-content-between">
                <a href="<?php echo base_url(); ?>" class="navbar-brand d-flex align-items-center text-dark">
                    <span class="fa fa-car" style="margin-right: 10px;"></span>
                    <strong><?php echo $title; ?></strong>
                </a>
                <?php if($this->uri->segment(1) == 'user' and $this->uri->segment(2) == 'login') { ?>
                    <span class="nav-link">Silahkan login</span>
                <?php } elseif($this->uri->segment(1) == 'user' and $this->uri->segment(2) == 'signup') { ?>
                    <span class="nav-link">Silahkan masukkan data diri anda</span>
                <?php  } ?>
            </div>
        </div>
    </header>
<?php } ?>
