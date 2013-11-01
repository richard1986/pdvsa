<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PDVSA</title>
    
    <!-- 

    <?php if (!empty($css)): ?>
      <?php foreach ($css as $item): ?>
    <link href="<?=ASSETS_DIR?><?=$item?>" rel="stylesheet">
      <?php endforeach ?>
    <?php endif ?>
 -->
    <?php if (!empty($css_files)): ?>
    <?php foreach($css_files as $file): ?>
      <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
    <?php endforeach; ?>
    <?php endif ?>


    <!-- Bootstrap core CSS -->
    <link href="<?=ASSETS_DIR?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=ASSETS_DIR?>css/sticky-footer-navbar.css" rel="stylesheet">
    
    <!-- Personalizados -->
    <link href="<?=ASSETS_DIR?>css/default.css" rel="stylesheet">
  </head>

  <body>

    <!-- Wrap all page content here -->
    <div id="wrap">

      <!-- Fixed navbar -->
      <div class="navbar navbar-fixed-top">
        <div class="container">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Historial de Pozos UE Barua-Motatán&nbsp;&nbsp;&nbsp;</a>
          <div class="nav-collapse collapse">
            <ul class="nav navbar-nav">
              <li <?php if ($this->uri->segment(2)==''): ?>class="active"<?php endif ?>><a href="<?=base_url()?>/admin">Inicio</a></li>
              <li <?php if ($this->uri->segment(2)=='campos'): ?>class="active"<?php endif ?>><a href="<?=base_url()?>admin/campos">Campos</a></li>
              <li <?php if ($this->uri->segment(2)=='pozos'): ?>class="active"<?php endif ?>><a href="<?=base_url()?>admin/pozos">Pozos</a></li>
                            
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Historial <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="<?=base_url()?>admin/historial">Historial de Pozos</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Estadística de Pozos</a></li>
                </ul>
              </li>
            </ul>

            
              <div class="nav pull-right">
                <ul class="nav navbar-nav">
                  <li><a href="#">Usuarios</a></li>
                </ul>
              </div>

          </div><!--/.nav-collapse -->
        </div>
      </div>
      
      <!-- Begin page content -->
      <div class="container">
        
      <div class="row">
        <div class="span12 pull-right">
          <?=$this->session->userdata('nombre')?> | <?=$this->session->userdata('tipo')?>
          <a href="<?=base_url()?>admin/logout" class="btn btn-danger">Cerrar Sesión</a>
        </div>
      </div>
