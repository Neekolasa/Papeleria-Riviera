<?php
  session_start();
  if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {
    $location = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $location);
    exit;
}
  if (isset($_GET['salir'])) {
    
    unset($_SESSION['nombre']);
    unset($_SESSION['privilegio']);
    echo "<script>window.location.replace('index.php')</script>";
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
    <meta http-equiv="cache-control" content="max-age=0">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="-1">
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 11:00:00 GMT">
    <meta http-equiv="pragma" content="no-cache">
    <title>SVPR - Acceso al sistema</title>
    <?php 
      include_once 'templates/head.php';
    ?>

  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form id="login-form">
              <h1>Inicio de sesión</h1>
              <div>
                <input type="text" class="form-control" placeholder="Nombre de usuario" name="usuario" required>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Contraseña" name="password" required>
                <input type="hidden" >

              </div>
              <div>
                <button class="btn btn-primary submit" type="submit">Iniciar sesión</button>
                
                <!--<a class="reset_pass" href="recuperar_pass.php">¿Olvidaste la contraseña?</a>-->
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-pencil"></i> Sistema de Ventas Papelería Riviera</h1>
                  <p>©2021 Todos los derechos reservados</p>
                </div>
              </div>
              
            </form>
          </section>
        </div>


      </div>
    </div>
    <?php 
      include_once 'templates/footer.php';
    ?>
  </body>
</html>
<script src="build/js/login.js"></script>
