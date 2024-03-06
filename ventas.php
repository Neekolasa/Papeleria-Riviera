<?php 
  session_start();
  if (!isset($_SESSION['nombre'])) {
    echo "<script>window.location.replace('index.php')</script>";
  }
  else{
    $privilegio=$_SESSION['privilegio'];
  }
  //echo ." ".$_SESSION['privilegio'];
?>
<style>
  .dt-buttons {
    float:none;  
    text-align:center;
    display: block !important;
  }
</style>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="cache-control" content="max-age=0">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="-1">
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 11:00:00 GMT">
    <meta http-equiv="pragma" content="no-cache">

    <title>SVPR - Ventas</title>

    <?php 
      include_once 'templates/head.php';
    ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php 
        	include_once 'templates/navegacion.php';
        	include_once 'templates/barra.php';
      	?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>SVPR - Ventas</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Ver lista de ventas</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="card-box table-responsive">
                          
                          <table id="" class="table table-striped table-bordered dt-responsive nowrap datatable-buttons" cellspacing="0" width="100%">
                            <thead>
                              <tr>
                                <th>ID Venta</th>
                                <th>Nombre Producto</th>
                                <th>Marca</th>
                                <th>Fecha de Venta</th>
                                <th>Hora de Venta</th>
                                <th>Año de Venta</th>
                                <th>Cantidad</th>
                                <th>Total de la Venta</th>
                                <th>Usuario que vendió</th>
                                <th class='admin'>Acciones</th>
                              </tr>
                            </thead>
                            <tbody id="tabla_ventas">
                              
                              <!-- INFORMACION LLENADA CON datos_ventas.php -->
                              <?php include_once("cont/datos_ventas.php"); ?>
                              
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        
        <!-- /footer content -->
      </div>
    </div>

    <?php 
      include_once 'templates/footer.php';
    ?>
  </body>
</html>

<script src="build/js/tabla_ventas.js"></script>
<script src="build/js/tablas_traductor.js"></script>
<script src="build/js/gestor_permisos.js"></script>
<script type="text/javascript">
  
  var privilegio='<?php echo $_SESSION['privilegio'] ?>';
  
  gestor_recursos(privilegio);

</script>