<?php
	require 'conn.php';
	include_once 'encriptar.php';

	$nombre_usuario=$_REQUEST['usuario'];
	$password=$_REQUEST['password'];
	$enc = encrypt($password,"poio");

	if (!empty($password)) {
			$consulta = "UPDATE usuarios SET contrasena = '$enc' WHERE nombre = '$nombre_usuario' ";
			$resultado = mysqli_query($conexion,$consulta);
	
			if ($resultado==1) {
			
				echo "exito";
			}
			else{
				echo "error";
			}
		}
	else{
		echo "error";

	}

    $conexion->close();

?>
