<?php

	/*$servidor = "localhost";
	$user = "root";
	$pass = "";
	$bd = "tienda";

	$conexion = mysqli_connect($servidor, $user, $pass, $bd);

	if($conexion){
		//echo "Exito";
	}*/

	$servidor = "sql100.epizy.com";
	$user = "epiz_28005830";
	$pass = "HzExPdGRaBD9iOp";
	$bd = "epiz_28005830_tienda";
	

	$conexion = mysqli_connect($servidor, $user, $pass, $bd);

	if($conexion){
		//echo "Exito";
	}
	else
	{
		//echo "no"; 
	}

?>