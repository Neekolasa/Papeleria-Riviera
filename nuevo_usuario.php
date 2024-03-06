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

    <title>SVPR - Nuevo usuario</title>

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
                <h3>Usuarios</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Agregar usuario</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      

                  	<form id="usuarios" autocomplete="off" data-parsley-validate class="form-horizontal form-label-left">
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align">Nombre usuario <span class="required"></span>
                      </label>
                      <div class="col-md-5 col-sm-5 ">
                        <input type="text" id="usuario-name" required="required" required name="usuario" class="form-control" minlength="4" placeholder="Minímo 4 caracteres">
                      </div>
                    </div>
                    <div class="item form-group ">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="usuario-name">Contraseña <span class="required"></span>
                      </label>
                      <div class="col-md-5 col-sm-5">
                        <input type="password" id="contrasegna-name" autocomplete="off" name="password" required class="form-control" minlength="5" placeholder="Minímo 5 caracteres">
                      </div>
                    </div>
                    <div class="item form-group ">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="usuario-name">Ver contraseña 
                      </label>
                      <div class="col-md-5 col-sm-5">
                        <input type="checkbox" onchange="ver();" id="ver_pass" class="js-switch" />
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="contrasegna-name">Correo electrónico <span class="required"></span>
                      </label>
                      <div class="col-md-5 col-sm-5 ">
                        <input type="email" id="correo-name" autocomplete="off" name="email" required class="form-control" minlength="5" placeholder="ejemplo@example.com">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="correo-name">Privilegio
                       <span class="required"></span></label>
                      <div class="col-md-5 col-sm-5 ">
                        <select class="form-control" name="privilegio" required id="privilegio">
                          <option value="user">Usuario</option>
                          <option value="admin">Administrador</option>
                        </select>
                        
                      </div>
                    </div>
                    

                    <div class="ln_solid"></div>
                    <div class="item form-group">
                      <div class="col-md-6 col-sm-6 offset-md-3">
                        <button type="submit" class="btn btn-success">Guardar <i class="fa fa-save"></i></button>
                        <button class="btn btn-primary" style="background-color: #FFF; color:#000;" type="reset">Limpiar campos <i class="fa fa-eraser"></i></button>
                      </div>
                    </div>
                  </form>


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
<script src="build/js/nuevo_usuario.js"></script>
<script src="build/js/tabla_usuarios.js"></script>
