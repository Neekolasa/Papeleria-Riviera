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
    <title>SVPR - Categorias</title>

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
                <h3>SVPR - Categorias</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Ver lista de categorias</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    
          
                    <table id="" class="table table-striped table-bordered dt-responsive nowrap datatable" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Nombre</th>
                          <th>Descripción</th>
                          <th class='admin'>Acciones</th>
                        </tr>
                      </thead>
                      <tbody id="tabla_categorias">
                        

                        <!-- INFORMACION LLENADA CON datos_categorias.php -->
                        <?php include_once("cont/datos_categorias.php"); ?>
                        
                      </tbody>
                    </table>
          
          
                  </div>
                </div>
              </div>

                  	<!--Añadir contenido AQUI--->


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
<div class="modal fade bs-example-modal-lg editar_categoria_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Modificar categoria</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                              </button>
                </div>
                <div class="modal-body">
                  <form id='categoria_mod' data-parsley-validate class='form-horizontal form-label-left'>


                  </form>
                </div>
                <!--<div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>-->

            </div>
        </div>
    </div>
    <?php 
      include_once 'templates/footer.php';
    ?>
  </body>
</html>
<script src="build/js/tabla_categorias.js"></script>
<script src="build/js/tablas_traductor.js"></script>
<script src="build/js/gestor_permisos.js"></script>
<script type="text/javascript">
  
  var privilegio='<?php echo $privilegio ?>';
  console.log(privilegio);
  gestor_recursos(privilegio);

</script>