<?php

require 'conn.php';

if (isset($_REQUEST['proceso'])) {

		$respuesta = $_REQUEST['proceso'];

		if ($respuesta == "editar_inventario") {

            $nombre = "";

            $sel_cat = "";

            $descripcion = "";

            $id = $_REQUEST['modify_id'];

            $modal = "";

			//echo $id;
			//echo "<script>console.log($id)</script>";

			$consulta = "SELECT productos.id_producto, TRIM(replace(productos.nombre,productos.marca,'')) as nombre, productos.marca,productos.descripcion, productos.precio_unidad, productos.cantidad, categoria.nombre as categoria FROM productos JOIN categoria on productos.fk_categoria = categoria.id WHERE id_producto = '$id'";



			$user_select = mysqli_query($conexion,$consulta);

			while ($resp = mysqli_fetch_array($user_select)) {

				$id = $resp['id_producto'];

				$nombre = $resp['nombre'];

				$descripcion = $resp['descripcion'];

				$marca = $resp['marca'];

				$cantidad = $resp['cantidad'];

				$precio_unitario = $resp['precio_unidad'];

				$categoria = $resp['categoria'];

			}



			$categoria_c = mysqli_query($conexion,"SELECT id, nombre FROM categoria");

			while ($cate = mysqli_fetch_array($categoria_c)) {

				if ($cate['nombre']==$categoria) {

					$sel_cat.="<option value='$cate[id]' selected>$cate[nombre]</option>";

				}

				else

				{

					$sel_cat.="<option value='$cate[id]' >$cate[nombre]</option>";

				}

			}



			$modal.= "

							

			                    <div class='item form-group'>

			                      <label class='col-form-label col-md-3 col-sm-3 label-align'>Nombre producto 

			                      </label>

			                      <div class='col-md-7 col-sm-7 '>

			                        <input type='text' id='categoria-name' name='producto' class='form-control' required value='$nombre'>

			                      </div>

			                    </div>

			                    <div class='item form-group'>

			                      <label class='col-form-label col-md-3 col-sm-3 label-align'>Marca 

			                      </label>

			                      <div class='col-md-7 col-sm-7 '>

			                        <input type='text' id='marca-name' name='marca' class='form-control' required value='$marca'>

			                      </div>

			                    </div>

			                   <div class='item form-group'>

			                      <label class='col-form-label col-md-3 col-sm-3 label-align' for='contrasegna-name'>Cantidad en existencia

			                      </label>

			                      <div class='col-md-7 col-sm-7 '>

			                        <input type='number' min='1' step='any' id='cantidad-name' name='cantidad' value='$cantidad' required class='form-control' >

			                      </div>

			                    </div>


			                    <div class='item form-group'>

			                      <label class='col-form-label col-md-3 col-sm-3 label-align'>Descripción 

			                      </label>

			                      <div class='col-md-7 col-sm-7 '>

			                        <input type='text' id='descripcion-name' name='descripcion' class='form-control' value='$descripcion'>

			                      </div>

			                    </div>



			                    <div class='item form-group'>

			                      <label class='col-form-label col-md-3 col-sm-3 label-align' for='contrasegna-name'>Precio unitario

			                      </label>

			                      <div class='col-md-7 col-sm-7 '>

			                        <input type='number' min='1' step='any' id='precio-name' name='precio' value='$precio_unitario' required class='form-control' >

			                      </div>

			                    </div>

			               		<div class='item form-group'>

			                      <label class='col-form-label col-md-3 col-sm-3 label-align'>Categoría 

			                      </label>

			                      <div class='col-md-7 col-sm-7 '>

			                        <select class='form-control' name='categoria'>".

			                        	$sel_cat

			                        ."

			                        </select>

			                      </div>

			                    </div>

			                    <div class='modal-footer'>

			                    <input type='hidden' value='$id' name='ide'>

			                    	<button type='submit' class='btn btn-success'>Guardar <i class='fa fa-check'></i></button>

			                    	<button type='button' class='btn btn-danger' data-dismiss='modal'>Cancelar</button>

			                   

			                    </div>

			              



			";

			echo $modal;

			

		}

		elseif ($respuesta == "modificar") {

			$id = $_REQUEST['ide'];

			$nombre = $_REQUEST['producto'];

			$marca = $_REQUEST['marca'];

			$cantidad = $_REQUEST['cantidad'];

			$descripcion = $_REQUEST['descripcion'];

			$precio = $_REQUEST['precio'];

			$categoria = $_REQUEST['categoria'];

			

			$consulta = "UPDATE productos SET nombre = '$nombre $marca', marca = '$marca', cantidad = '$cantidad', descripcion = '$descripcion', precio_unidad = $precio, fk_categoria = $categoria WHERE id_producto = $id ";

			$resultado = mysqli_query($conexion,$consulta);

			if ($resultado==1) {

					

				echo "exito";

			}

			else{

				echo "error";

			}

			

		}

		elseif ($respuesta == "borrar_inventario") {

			$id = $_REQUEST['borrar_id'];

			/*if ("$_SESSION['nombre']" == $nombre) {

				echo "logeado";

			}*/

			

			$consulta = "DELETE FROM productos WHERE id_producto = $id";

			$resultado = mysqli_query($conexion, $consulta);

			if ($resultado == 1) {

				echo "eliminado";

						//echo "$consulta";

				}

			else{

				echo "error";

			}

			

			

		}

	}





?>