<?php
	require 'conn.php';
	include_once 'encriptar.php';

	$nombre_usuario=$_REQUEST['usuario'];
	$password=$_REQUEST['password'];
	$correo=$_REQUEST['email'];
	$privilegio=$_REQUEST['privilegio'];
	$enc = encrypt($password,"poio");

	$comp_nombre= mysqli_query($conexion,"SELECT * FROM usuarios WHERE nombre = '$nombre_usuario'");
	$rep = mysqli_fetch_array($comp_nombre);
	$comp_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo_electronico = '$correo'");
	$rep2 = mysqli_fetch_array($comp_correo);
	if ($rep>0) {
		echo "existe_nombre";
	}
	else if ($rep2>0)
	{
		echo "existe_correo";	
	}
	else{
			$query="INSERT INTO usuarios(nombre,contrasena,correo_electronico,privilegio)
			VALUES('$nombre_usuario', '$enc','$correo','$privilegio')";

			$result=mysqli_query($conexion,$query) or die(mysqli_error($conexion));
			if ($result) {
				echo "exito";
			}
			else{
				echo "error";
			}
		}

    $conexion->close();

?>
