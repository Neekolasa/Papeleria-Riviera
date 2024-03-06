<?php
	require 'conn.php';
	include_once 'encriptar.php';

	$correo=$_REQUEST['email'];
	$consulta = "SELECT * FROM usuarios WHERE correo_electronico = '$correo'";
	//echo "$consulta";
	$resultado = mysqli_query($conexion,$consulta);

	if (mysqli_num_rows($resultado)>0) {
		while ($data = mysqli_fetch_array($resultado)) {
			$nombre = $data['nombre'];
			$mail = $data['correo_electronico'];
		}

		$enc = encrypt($nombre, 'poio');

		//Empieza a armar el correo
		$url = "http://www.papeleriariviera.epizy.com/reestablecer.php?hjfhdi=$enc";
		$msg="tu contraseña es 123";
		$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
    	$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    	$res=mail($mail,"Recuperar contraseña SVPR",$msg,$cabeceras);

    	if($res){
    		echo "exito";
    	}
    	else
    	{
    		echo "no";
    	}
	}
	else{
		echo "error";
	}

    $conexion->close();

?>
