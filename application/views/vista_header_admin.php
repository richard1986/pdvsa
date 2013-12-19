<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PDVSA</title>
    <!-- <link class="include" rel="stylesheet" type="text/css" href="<?=ASSETS_DIR?>css/jquery.jqplot.min.css" /> -->
    <!--[if lt IE 9]><script language="javascript" type="text/javascript" src="<?=ASSETS_DIR?>js/excanvas.min.js"></script><![endif]-->
    
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
    
    <link href="<?=ASSETS_DIR?>css/blitzer/jquery-ui-1.10.3.custom.css" rel="stylesheet">
    
    <!--[if lt IE 9]><script language="javascript" type="text/javascript" src="<?=ASSETS_DIR?>js/excanvas.min.js"></script><![endif]-->
    
    <!--script class="include" type="text/javascript" src="<?=ASSETS_DIR?>js/jquery.js"></script-->
    
  </head>

  <body>
    <!-- Wrap all page content here -->
    <div id="wrap">
      <!-- Fixed navbar -->
      <div class="navbar navbar-fixed-top">
        <div class="container">
          <div class="navbar navbar-default navbar-fixed-top">
            <div class="container">
              <div class="navbar-header">
                <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a href="#" class="navbar-brand">Historial de Pozos UE Barua-Motatán&nbsp;&nbsp;&nbsp;</a>
              </div>
              <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                  <li <?php if ($this->uri->segment(2)==''): ?>class="active"<?php endif ?>><a href="<?=base_url()?>/admin">Inicio</a></li>
                  <li <?php if ($this->uri->segment(2)=='campos'): ?>class="active"<?php endif ?>><a href="<?=base_url()?>admin/campos">Campos</a></li>
                  <li <?php if ($this->uri->segment(2)=='pozos'): ?>class="active"<?php endif ?>><a href="<?=base_url()?>admin/pozos">Pozos</a></li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Historial <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      <li><a href="<?=base_url()?>admin/estadisticas">Estadística de Pozos por Mes</a></li>
                      <li class="divider"></li>
                      <li><a href="<?=base_url()?>admin/estadisticas2">Estadística de Pozos por Rango</a></li>
                    </ul>
                  </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="#">Usuarios</a></li>
                </ul>
              </div><!--/.nav-collapse -->
            </div>
          </div>
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
