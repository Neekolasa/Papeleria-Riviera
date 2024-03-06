<?php 
  session_start();
  if (!isset($_SESSION['nombre'])) {
    echo "<script>window.location.replace('index.php')</script>";
  }
  else{
    $privilegio=$_SESSION['privilegio'];
  }
  
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SVPR - Respaldo</title>

    <?php 
      include_once 'templates/head.php';
      include_once 'cont/backup.php';
      $privilegio="";
      if (isset($_GET['backup'])=='yes')
      {
        if ($privilegio=='estandar') 
        {
          echo "<script>window.location.replace('inicio.php')</script>";
        }
        else
        {
          /*
          $servidor = "sql100.epizy.com";
          $user = "epiz_28005830";
          $pass = "HzExPdGRaBD9iOp";
          $bd = "epiz_28005830_tienda";

          $servidor = "localhost";
          $user = "root";
          $pass = "";
          $bd = "tienda";
          */


          $fecha = date("Ymd-His"); //Se solicita la fecha del sistema

          //Se coloca la información de conexion a la base de datos
          $world_dumper = Shuttle_Dumper::create(array(
              'host' => 'sql100.epizy.com',
              'username' => 'epiz_28005830',
              'password' => 'HzExPdGRaBD9iOp',
              'db_name' => 'epiz_28005830_tienda',
          ));

          $world_dumper->dump($fecha.'_tienda.sql.gz');//Se crea el archivo comprimido
          header ("Location: $fecha"."_tienda.sql.gz");//Se envia al cliente para su descarga
        }
      }
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
                <h3>SVPR - Respaldo</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Respaldo de información</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="box-part text-center">
                          <i class="far fa-save"></i>         
                          <div class="title">
                            <h4>Respaldo de información</h4>
                          </div>
                          <div class="text">
                            <span>Crea un backup de la base de datos existente. Descarga una copia en formato SQL de las tablas e información almacenada comprimidos en un archivo ZIP.</span>
                          </div>
                          <a href="?backup=yes" style="color: #1ABB9C;" class='admin'>Realizar respaldo</a>
                         </div>
                      </div>  


                  </div>

                </div>
              </div>
            </div>
            <!--<div class="" role="main">
              <div class="">
                <div class="clearfix"></div>
                <div class="row">
                  <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Restaurar información</h2>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <p>Para restaurar la informacion del sitio utilize una copia de seguridad en formato SQL o GZ para reestablecer los datos del sistema.</p>
                        <form action="cont/restaurar.php" id="restaurar" class="dropzone">
                          
                        </form>
                        <br />
                        <br />
                        <br />
                        <br />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>-->
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
<script src="build/js/gestor_permisos.js"></script>
<script type="text/javascript">
  
  var privilegio='<?php echo $_SESSION['privilegio'] ?>';
  console.log(privilegio);
  gestor_recursos(privilegio);

</script>