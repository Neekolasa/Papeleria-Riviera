<?php 
	require 'conn.php';

	$arrayData = array();
	$usuariosTabla="";
	$sel_ventas = mysqli_query($conexion, "SELECT id_venta, TRIM(replace(productos.nombre,productos.marca,'')) as nombre_producto,productos.marca, fecha_venta, TIME_FORMAT(hora_venta,'%h:%i %p') as hora,anio,cantidad,CONCAT('$',cantidad*total) as total,fk_usuario FROM ventas JOIN productos WHERE fk_producto = productos.id_producto");
	

	while ($data = mysqli_fetch_array($sel_ventas)) {
		$date=date_create($data['fecha_venta']);
		$fecha=date_format($date,'d/m/Y');
		$dia=date_format($date,'d');
		$mes=date_format($date,'m');
		if($mes == '01')
		{
			$mes_nombre = "de enero del";
		}
		else if ($mes == '02') {
			$mes_nombre = "de febrero del";
		}
		else if ($mes == '03') {
			$mes_nombre = "de marzo del";
		}
		else if ($mes == '04') {
			$mes_nombre = "de abril del";
		}
		else if ($mes == '05') {
			$mes_nombre = "de mayo del";
		}
		else if ($mes == '06') {
			$mes_nombre = "de junio del";
		}
		else if ($mes == '07') {
			$mes_nombre = "de julio del";
		}
		else if ($mes == '08') {
			$mes_nombre = "de agosto del";
		}
		else if ($mes == '09') {
			$mes_nombre = "de septiembre del";
		}
		else if ($mes == '10') {
			$mes_nombre = "de octubre del";
		}
		else if ($mes == '11') {
			$mes_nombre = "de noviembre del";
		}
		else if ($mes == '12') {
			$mes_nombre = "de diciembre del";
		}
		$anio=date_format($date,'Y');
		$usuario= ucfirst($data['fk_usuario']);
		$usuariosTabla.="
		<tr>
        	<td>$data[id_venta]</td>
        	<td>$data[nombre_producto]</td>
        	<td>$data[marca]</td>
        	<td>$dia $mes_nombre $anio</td>
        	<td>$data[hora]</td>
        	<td>$data[anio]</td>
        	<td>$data[cantidad]</td>
        	<td>$data[total]</td>
        	<td>$usuario</td>
        	<td class='admin'>
	        	<button class='btn btn-danger borrar admin' id='$data[id_venta]' title='Borrar registro'><i class='fa fa-trash'></i></button>
        	</td>                
        </tr>

		";
	}
	//$arrayData['usuarios'] = $usuariosTabla;
	//echo $arrayData;
	echo $usuariosTabla;
	$usuariosTabla="";

	//mysqli_close($conexion);



?>
