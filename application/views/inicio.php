<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PDVSA</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=ASSETS_DIR?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=ASSETS_DIR?>css/jumbotron-narrow.css" rel="stylesheet">
    <!-- <link href="css/estilos.css" rel="stylesheet"> -->
  </head>

  <body>

    <div class="container-narrow">
      <div class="header">
        <div class="row">
          <div class="col-lg-12">
            <a href="index.html">
              <img class="img-responsive" src="<?=ASSETS_DIR?>img/top.png" alt="DEM">
            </a>
          </div>
        </div>
        <h4 class="text-muted text-center">Historial de Pozos UE Barua-Motatán</h4>
      </div>

      <div class="row">
        <h3 class="text-center">INGRESE AL SISTEMA</h3>
        <form class="form-horizontal col-lg-offset-3" action="<?=base_url()?>welcome/entrar" method="post">
          <div class="form-group">
            <label for="Usuario" class="col-lg-2 control-label">Usuario</label>
            <div class="col-lg-6">
              <input type="text" class="form-control" id="Usuario" placeholder="Usuario" name="usuario">
            </div>
          </div>
          <div class="form-group">
            <label for="Clave" class="col-lg-2 control-label">Clave</label>
            <div class="col-lg-6">
              <input type="password" class="form-control" id="Clave" placeholder="Clave" name="clave">
            </div>
          </div>
          <button type="submit" class="btn btn-primary col-lg-offset-2 col-lg-2">Entrar</button>
          <div class="form-group">
          </div>
        </form>
      </div>

      <div class="footer">
        <div class="row">
          <div class="col-lg-6">
            <p>&copy; PDVSA 2013</p>
          </div>
          <div class="col-lg-6">
            <p class="text-right">Diseño y Desarrollo: <strong>Adriana Avendaño</strong></p>
          </div>
        </div>
      </div>

    </div> <!-- /container -->
    
  </body>
</html>