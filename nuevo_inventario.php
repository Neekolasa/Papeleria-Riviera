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



    <title>SVPR - Nuevo inventario</title>



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

                <h3>Inventario</h3>

              </div>

            </div>



            <div class="clearfix"></div>



            <div class="row">

              <div class="col-md-12 col-sm-12  ">

                <div class="x_panel">

                  <div class="x_title">

                    <h2>Agregar producto al inventario</h2>

                    

                    <div class="clearfix"></div>

                  </div>

                  <div class="x_content">

                      



                  	<form id="form_producto" data-parsley-validate class="form-horizontal form-label-left">

                    <div class="item form-group">

                      <label class="col-form-label col-md-3 col-sm-3 label-align">Nombre producto

                      </label>

                      <div class="col-md-5 col-sm-5 ">

                        <input type="text" id="categoria-name" required="required" name="producto" class="form-control ">

                      </div>

                    </div>

                    <div class="item form-group">

                      <label class="col-form-label col-md-3 col-sm-3 label-align">Marca

                      </label>

                      <div class="col-md-5 col-sm-5 ">

                        <input type="text" id="marca-name" required="required" name="marca" class="form-control ">

                      </div>

                    </div>

                    <div class="item form-group">

                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="descripcion-name">Cantidad en existencia

                      </label>

                      <div class="col-md-5 col-sm-5 ">

                        <input type="number" min="1" step="any" id="cantidad-name" required="required" name="cantidad" class="form-control">

                      </div>

                    </div>

                    <div class="item form-group">

                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="categoria-name">Descripción

                      </label>

                      <div class="col-md-5 col-sm-5 ">

                        <input type="text" id="descripcion-name" name="descripcion" class="form-control">

                      </div>

                    </div>

                    <div class="item form-group">

                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="descripcion-name">Precio unitario

                      </label>

                      <div class="col-md-5 col-sm-5 ">

                        <input type="number" min="1" step="any" id="precio-name" required="required" name="precio" class="form-control">

                      </div>

                    </div>



                    <div class="item form-group">

                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="precio-name">Categoría </label>

                      <div class="col-md-5 col-sm-5">

                        <select id="cat" name="categoria" required class="form-control col-md-7 col-xs-12">

                          <?php 

                            include 'cont/conn.php';

                            $query="SELECT id,nombre FROM categoria";

                            $res=mysqli_query($conexion,$query);

                            while ($resultado=mysqli_fetch_array($res)) {

                              $id=$resultado['id'];

                              $nombre=$resultado['nombre'];

                              echo "<option value=$id>$nombre</option>";

                              //echo "<option value='$resultado[id]'>$resultado['nombre']</option>";

                            }

                          ?>

                          

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

<script src="build/js/nuevo_inventario.js"></script>