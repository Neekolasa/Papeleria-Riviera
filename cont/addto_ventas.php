<?php 
	require 'conn.php';
	//mysqli_query($conexion,"TRUNCATE TABLE tmp_ventas");
	$id_producto="";
	$descripcion="";
	$detalleTabla="";
	$detalleFooter="";
	$subTotal=0;
	$total=0;
	$arrayData = array();
	$array2Data = array();
	$nombre = $_REQUEST['producto'];
	$cantidad = $_REQUEST['cantidad'];
	

	$kk="SELECT id_producto,marca,descripcion,precio_unidad FROM productos WHERE nombre = '$nombre'";
	$query_id = mysqli_query($conexion, $kk);
	

	while ($data = mysqli_fetch_array($query_id)) {
		$id_producto=$data['id_producto'];
		$marca=$data['marca'];
		$descripcion=$data['descripcion'];
		$precio=$data['precio_unidad'];
	}
	

	$kk2 = "INSERT INTO tmp_ventas(id,nombre,marca,descripcion,cantidad,total) VALUES($id_producto, '$nombre','$marca','$descripcion', $cantidad, $precio)";
	$query_tmp = mysqli_query($conexion, $kk2);
	//echo $kk2;

	$query_tmp_consulta = mysqli_query($conexion,"SELECT * FROM tmp_ventas");

	while ($consulta = mysqli_fetch_array($query_tmp_consulta)) {
		$id = $consulta['llave'];
		$precioTotal = round($consulta['cantidad'] * $consulta['total'], 2);
		$total = round($total + $precioTotal, 2);

		$detalleTabla.="<tr><th scope='row'>$consulta[id]</th><td>$consulta[nombre]</td><td>$consulta[cantidad]</td><td>$consulta[marca]</td><td>$consulta[descripcion]</td><td>$consulta[total]</td><td id='precioTotal'>$precioTotal</td><td><a href='#' class='btn btn-danger borrar' id='$id'> Eliminar</a><input type='hidden' id='borrar' value='$id'></td></tr>";

		

		
		
		//$detalleFooter="";
		
		//echo json_encode($arrayData);
		//mysqli_close($conexion);
	}
	$detalleFooter.="<tr><th scope='row' colspan='6'>Total</th><td>".$total."</td></tr>";
	$arrayData['detalle'] = $detalleTabla;
	$arrayData['footer'] = $detalleFooter;
	echo json_encode($arrayData);
	$detalleTabla="";
	$detalleFooter="";
	$total=0;


?>