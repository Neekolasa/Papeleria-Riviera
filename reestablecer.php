<?php
  include 'cont/encriptar.php';

  if (isset($_REQUEST['hjfhdi'])) {
    //$hjfhdi = decrypt($_REQUEST['usuario'],'poio');
    $hjfhdi = $_REQUEST['hjfhdi'];

  }
  else
  {
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

    <title>SVPR - Recuperar cuenta</title>
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
            <form id="recuperar-form">
              <h1> Recuperar contraseña </h1>
              <div>
                <input type="text" class="form-control" placeholder="Nombre de usuario" name="usuario" readonly="true" value="<?php echo $hjfhdi; ?>">
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Contraseña" id="contrasegna-name" name="password" required minlength='5'>
                <input type="hidden" >
                <label for="ver_pass">Ver contraseña</label>
                <input type="checkbox" onchange="ver();" id="ver_pass" class="js-switch align-left" />   
              </div>

              <br />

              <div>
                <button class="btn btn-primary submit" type="submit">Reestablecer contraseña</button>
                
                
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
<script src="build/js/reestablecer.js"></script>
