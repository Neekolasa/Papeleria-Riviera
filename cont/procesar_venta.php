<?php
	session_start();
	require 'conn.php';
	$usuario=$_SESSION['nombre'];
	$dato = $_REQUEST["info"];
	if ($dato=="insertar") {
		date_default_timezone_set('America/Monterrey');		
		//COMPROBAR SI EXISTEN REGISTROS		
		$query_buscar = mysqli_query($conexion, "SELECT count(*) as existente FROM tmp_ventas");
		while ($existente = mysqli_fetch_array($query_buscar)) {
			$cantidad = $existente['existente'];
		}
		//echo $cantidad;
		if ($cantidad > 0) {
			//SELECCIONAR REGISTROS DE LA TABLA TEMPORAL
			$query_seleccionar=mysqli_query($conexion,"SELECT * FROM tmp_ventas");
			//$timezone=mysqli_query($conexion,"SET GLOBAL time_zone = ‘-6:00’;");
			//INSERTAR REGISTROS EN TABLA DEFINITIVA
			while ($rest = mysqli_fetch_array($query_seleccionar)) {
				
				$consulta="INSERT INTO ventas(fecha_venta,hora_venta,anio,cantidad,total,fk_producto,fk_usuario) VALUES(curdate(),SUBTIME(CURTIME(), '1:0:0'),YEAR(CURDATE()),$rest[cantidad],$rest[total],$rest[id],'$usuario')";
				$query_insertar = mysqli_query($conexion,$consulta);
			}
			//ELIMINAR INFORMACION DE LA TABLA TEMPORAL AL INSERTARLA
			$query_eliminar_info=mysqli_query($conexion, "TRUNCATE TABLE tmp_ventas");
			echo "exito";

		}
		else
		{
			echo "error";
		}

	}
	else if($dato=="borrar"){
		$query_eliminar_info=mysqli_query($conexion, "TRUNCATE TABLE tmp_ventas");
		echo "borrado";
	}
	else{
		echo "error";
	}

?>