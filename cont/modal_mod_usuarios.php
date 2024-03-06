<?php
require 'conn.php';
include 'encriptar.php';
if (isset($_REQUEST['proceso'])) {
		$respuesta = $_REQUEST['proceso'];
		if ($respuesta == "editar_usuario") {
            $nombre = "";
            $correo_electronico = "";
            $privilegio = "";
            $id = $_REQUEST['modify_id'];
            $modal = "";
			//echo $id;
			$consulta = "SELECT nombre,correo_electronico,privilegio FROM usuarios WHERE nombre = '$id'";

			$user_select = mysqli_query($conexion,$consulta);
			while ($resp = mysqli_fetch_array($user_select)) {
				$nombre = $resp['nombre'];
				$correo_electronico = $resp['correo_electronico'];
				$privilegio = $resp['privilegio'];
			}
			$modal.= "
							
			                    <div class='item form-group'>
			                      <label class='col-form-label col-md-3 col-sm-3 label-align'>Nombre usuario 
			                      </label>
			                      <div class='col-md-7 col-sm-7 '>
			                        <input type='text' id='usuario-name'  required name='usuario' class='form-control' minlength='4' required value='$nombre' placeholder='Minímo 4 caracteres'>
			                      </div>
			                    </div>
			                    <div class='item form-group '>
			                      <label class='col-form-label col-md-3 col-sm-3 label-align' for='usuario-name'>Contraseña 
			                      </label>
			                      <div class='col-md-7 col-sm-7'>
			                        <input type='password' id='contrasegna-name' name='password'  class='form-control' minlength='5' placeholder='Minímo 5 caracteres'>
			                      </div>
			                    </div>
			                    <div class='item form-group '>
			                      <label class='col-form-label col-md-3 col-sm-3 label-align' for='usuario-name'>Ver contraseña 
			                      </label>
			                      <div class='col-md-7 col-sm-7'>
			                        <input type='checkbox' onchange='ver()' class='js-switch' />
			                      </div>
			                    </div>

			                    <div class='item form-group'>
			                      <label class='col-form-label col-md-3 col-sm-3 label-align' for='contrasegna-name'>Correo electrónico
			                      </label>
			                      <div class='col-md-7 col-sm-7 '>
			                        <input type='email' id='correo-name' name='email' value='$correo_electronico' required class='form-control' minlength='5' placeholder='ejemplo@example.com'>
			                      </div>
			                    </div>
			                    <div class='item form-group'>
			                      <label class='col-form-label col-md-3 col-sm-3 label-align' for='correo-name'>Privilegio
			                       </label>
			                      <div class='col-md-7 col-sm-7 '>
			                        <select class='form-control' name='privilegio' required id='privilegio'>";
			if ($privilegio == "user") {
			    $modal.= "
			            				<option value='user' selected>Usuario</option>
			                        	<option value='admin'>Administrador</option>
			    ";
			}
			else{
			    $modal.= "
			            				<option value='user'>Usuario</option>
			                        	<option value='admin' selected>Administrador</option>
			    ";
			}
			                   
			$modal.= "     
			             			</select>
			                        <input type='hidden' value='$nombre' name='usr_old'>
			                      </div>
			                    </div>
			                    <div class='modal-footer'>
			                      
			                    	<button type='submit' class='btn btn-success'>Guardar <i class='fa fa-check'></i></button>
			                    	<button type='button' class='btn btn-danger' data-dismiss='modal'>Cancelar</button>
			                   
			                    </div>
			              

			";
			echo $modal;
		}
		elseif ($respuesta == "modificar") {
			
			$newusuario = $_REQUEST['usuario'];
			$oldusuario = $_REQUEST['usr_old'];
			$password = $_REQUEST['password'];
			$enc = encrypt($password,"poio");
			$email = $_REQUEST['email'];
			$privilegio = $_REQUEST['privilegio'];
			if (!empty($password)) {
				$consulta = "UPDATE usuarios SET nombre = '$newusuario', contrasena = '$enc', correo_electronico = '$email', privilegio = '$privilegio' WHERE nombre = '$oldusuario' ";
				$resultado = mysqli_query($conexion,$consulta);
				//DESCOMENTAR CUANDO SE HAYAN PUESTO LAS SESSION_START
				//If en caso de que el usuario cambiado es el que está logeado
				if ($resultado==1) {
					/*if ($_SESSION['usuario'] == $oldusuario) {
						echo "igual";
					}*/
					if ($_SESSION['nombre'] == $oldusuario)  {
						echo "igual";
					}
					else{
						echo "diferente";
					}
				}
				else{
					echo "error";
				}
			}
			else{
				$consulta = "UPDATE usuarios SET nombre = '$newusuario', correo_electronico = '$email', privilegio = '$privilegio' WHERE nombre = '$oldusuario' ";
				$resultado = mysqli_query($conexion,$consulta);
				//DESCOMENTAR CUANDO SE HAYAN PUESTO LAS SESSION_START
				//If en caso de que el usuario cambiado es el que está logeado
				if ($resultado==1) {
					/*if ($_SESSION['usuario'] == $oldusuario) {
						echo "igual";
					}*/
					if ($_SESSION['nombre'] == $oldusuario) {
						echo "igual";
					}
					else{
						echo "diferente";
					}
				}
				else{
					echo "error";
				}

			}
		}
		elseif ($respuesta == "borrar_usuario") {
			$nombre = $_REQUEST['borrar_id'];
			/*if ("$_SESSION['nombre']" == $nombre) {
				echo "logeado";
			}*/
				if ($_SESSION['nombre'] == $nombre) {
					echo "logeado";
				}
				else{
					$consulta = "DELETE FROM usuarios WHERE nombre ='$nombre'";
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
	}


?>