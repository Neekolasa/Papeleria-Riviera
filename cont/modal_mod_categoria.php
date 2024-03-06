<?php
require 'conn.php';
if (isset($_REQUEST['proceso'])) {
		$respuesta = $_REQUEST['proceso'];
		if ($respuesta == "editar_categoria") {
            $nombre = "";
            $descripcion = "";
            $id = $_REQUEST['modify_id'];
            $modal = "";
			//echo $id;
			$consulta = "SELECT * FROM categoria WHERE id = '$id'";

			$user_select = mysqli_query($conexion,$consulta);
			while ($resp = mysqli_fetch_array($user_select)) {
				$id = $resp['id'];
				$nombre = $resp['nombre'];
				$descripcion = $resp['descripcion'];
			}
			$modal.= "
							
			                    <div class='item form-group'>
			                      <label class='col-form-label col-md-3 col-sm-3 label-align'>Nombre categoría 
			                      </label>
			                      <div class='col-md-7 col-sm-7 '>
			                        <input type='text' id='usuario-name'  required name='cat' class='form-control' minlength='4' required value='$nombre'>
			                      </div>
			                    </div>

			                    <div class='item form-group'>
			                      <label class='col-form-label col-md-3 col-sm-3 label-align' for='contrasegna-name'>Descripción
			                      </label>
			                      <div class='col-md-7 col-sm-7 '>
			                        <input type='text' id='correo-name' name='descripcion' value='$descripcion'  class='form-control' minlength='5' >
			                      </div>
			                    </div>
			                    <input type='hidden' value='$id' name='ide'>
			                    <div class='modal-footer'>
			                      
			                    	<button type='submit' class='btn btn-success'>Guardar <i class='fa fa-check'></i></button>
			                    	<button type='button' class='btn btn-danger' data-dismiss='modal'>Cancelar</button>
			                   
			                    </div>
			              

			";
			echo $modal;
		}
		elseif ($respuesta == "modificar") {
			$id = $_REQUEST['ide'];
			$nombre = $_REQUEST['cat'];
			$descripcion = $_REQUEST['descripcion'];
			$consulta = "UPDATE categoria SET nombre = '$nombre', descripcion = '$descripcion' WHERE nombre = '$nombre' ";
			$resultado = mysqli_query($conexion,$consulta);
			if ($resultado==1) {
					
				echo "exito";
			}
			else{
				echo "error";
			}
			
		}
		elseif ($respuesta == "borrar_categoria") {
			$id = $_REQUEST['borrar_id'];
			/*if ("$_SESSION['nombre']" == $nombre) {
				echo "logeado";
			}*/
			
			$consulta = "DELETE FROM categoria WHERE id =$id";
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