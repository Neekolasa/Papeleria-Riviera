<?php 
  session_start();
  if (!isset($_SESSION['nombre'])) {
    echo "<script>window.location.replace('login.php')</script>";
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

    <title>Gentelella Alela! | </title>

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
                <h3>Pagina vacia</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Plain Page</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      

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

    <?php 
      include_once 'templates/footer.php';
    ?>
  </body>
</html>
