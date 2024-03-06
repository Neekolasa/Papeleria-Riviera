<?php 
	require 'conn.php';
	
	$aid = $_REQUEST['id'];

	$subTotal=0;
	$total=0;
	$detalleTabla="";
	$detalleFooter="";
	$query_borrar = mysqli_query($conexion, "DELETE FROM tmp_ventas WHERE llave = $aid");

	$query_tmp_consulta = mysqli_query($conexion,"SELECT * FROM tmp_ventas");

	while ($consulta = mysqli_fetch_array($query_tmp_consulta)) {
		$id = $consulta['llave'];
		$precioTotal = round($consulta['cantidad'] * $consulta['total'], 2);
		$total = round($total+$precioTotal, 2);

		$detalleTabla.="<tr><th scope='row'>$consulta[id]</th><td>$consulta[nombre]</td><td>$consulta[cantidad]</td><td>$consulta[marca]</td><td>$consulta[descripcion]</td><td>$consulta[total]</td><td>$precioTotal</td><td><a href='#' class='btn btn-danger borrar' id='$id'> Eliminar</a><input type='hidden' id='borrar' value='$id'></td></tr>";

		//

		
		
		//$detalleFooter="";
		
		//echo json_encode($arrayData);
		//mysqli_close($conexion);
	}
	$detalleFooter.="<tr><th scope='row' colspan='6'>Total</th><td>".$total."</td></tr>";

	$arrayData['detalle']=$detalleTabla;
	$arrayData['footer']=$detalleFooter;
	echo json_encode($arrayData);


?>