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
  /* Specilly used for Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
 /* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
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

    <title>SVPR - Nueva venta</title>

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
                <h3>Nueva venta</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Agregar venta</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th style="display:none;">ID producto</th>
                          <th>Nombre</th>
                          <th>Cantidad</th>
                          <th>Marca</th>
                          <th>Descripción</th>
                          <th>Precio Unitario</th>
                          <th>Precio Total</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td id="id_producto" style="display:none;">-</td>
                          <th scope="row">
                            <input type="text" name="nombre_producto" id="nombre_producto" class="form-control" list="productos" onchange="fill();" onselect="fill();">
                            <datalist id="productos" class=""></datalist>
                            
                          </th>
                          <td id=""><input type="number" id="cantidad_producto" class="form-control"></td>
                          <td id="marca_producto">-</td>
                          <td id="descripcion_producto">-</td>
                          <td id="precio_unitario">-</td>
                          <td id="precio_total">-</td>
                          <td><button class="btn btn-success" id="btn_agregar" hidden="">Agregar</button></td>
                        </tr>
                       
                      </tbody>
                    </table>

                  </div>
                </div>

              </div>

              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Productos de la venta</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" id="table">

                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>ID Producto</th>
                          <th>Nombre</th>
                          <th>Cantidad</th>
                          <th>Marca</th>
                          <th>Descripción</th>
                          <th>Precio Unitario</th>
                          <th>Precio Total</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <!--CONTENIDO JAVASCRIPT-->
                      <div id="contenido">
                        
                      </div>
                      <tbody id="detalle_venta">
                        <tr>
                          <th scope="row" id="mirar_nombre_producto">-</th>
                          <td id="mirar_id_producto">-</td>
                          <td id="mirar_cantidad_producto">-</td>
                          <td>-</td>
                          <td id="mirar_descripcion_producto">-</td>
                          <td id="mirar_precio_unitario">-</td>
                          <td id="mirar_precio_total">-</td>
                          <td></td>
                        </tr>
                       
                      </tbody>
                      <tfoot id="detalle_total">
                        <!--<tr>
                          <th scope="row" colspan="5">Sub-total</th>
                          <td id="sub_total">-</td>
                        </tr>-->

                        <tr>
                          <th scope="row" colspan="6">Total</th>
                          <td id="total">-</td>
                        </tr>
                        
                      </tfoot>
                      
                      
                      <!--FIN CONTENIDO JAVASCRIPT-->
                    </table>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-danger" id="btn_cancelar">Cancelar Venta</button>
                        <button class="btn btn-success" id="btn_procesar">Procesar Venta</button>
                    </div>

                    
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <?php 
      include_once 'templates/footer.php';
    ?>
  </body>
</html>
<script src="build/js/nueva_venta.js"></script>