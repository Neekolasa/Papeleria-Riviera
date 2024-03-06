<?php 
	require 'conn.php';

	$arrayData = array();
	$stringData = "";
	$stringGrafico = array();
	$mes_nombre="";

	$ventas_dia=mysqli_query($conexion,"SELECT SUM(cantidad*total) as total FROM ventas WHERE fecha_venta = CURRENT_DATE()");
	while ($data = mysqli_fetch_array($ventas_dia)) {
		$stringData=$data['total'];
	}
	$arrayData['dia'] = $stringData;
	

	$ventas_semana=mysqli_query($conexion, "SELECT SUM(cantidad*total) as total FROM ventas WHERE fecha_venta BETWEEN (CURRENT_DATE() - INTERVAL 7 DAY) AND CURRENT_DATE()");
	while ($data = mysqli_fetch_array($ventas_semana)) {
		$stringData=$data['total'];
	}
	$arrayData['semana'] = $stringData;


	$productos_inventario=mysqli_query($conexion, "SELECT count(*) as productos FROM productos");
	while ($data = mysqli_fetch_array($productos_inventario)) {
		$stringData=$data['productos'];
	}
	$arrayData['inventario'] = $stringData;


	$ventas_mes=mysqli_query($conexion, "SELECT SUM(cantidad*total) as total FROM ventas WHERE fecha_venta BETWEEN (CURRENT_DATE() - INTERVAL 30 DAY) AND CURRENT_DATE()");
	while ($data = mysqli_fetch_array($ventas_mes)) {
		$stringData=$data['total'];
	}
	$arrayData['mes'] = $stringData;


	$ventas_barra=mysqli_query($conexion, "SELECT MONTH(fecha_venta) as Mes, SUM(cantidad*total) as Total FROM ventas GROUP BY MONTH(fecha_venta) LIMIT 12");
    while ($data = mysqli_fetch_array($ventas_barra)) {
    	if($data['Mes'] == '1')
		{
			$mes_nombre = "enero";
		}
		else if ($data['Mes'] == '2') {
			$mes_nombre = "febrero";
		}
		else if ($data['Mes'] == '3') {
			$mes_nombre = "marzo";
		}
		else if ($data['Mes'] == '4') {
			$mes_nombre = "abril";
		}
		else if ($data['Mes'] == '5') {
			$mes_nombre = "mayo";
		}
		else if ($data['Mes'] == '6') {
			$mes_nombre = "junio";
		}
		else if ($data['Mes'] == '7') {
			$mes_nombre = "julio";
		}
		else if ($data['Mes'] == '8') {
			$mes_nombre = "agosto";
		}
		else if ($data['Mes'] == '9') {
			$mes_nombre = "septiembre";
		}
		else if ($data['Mes'] == '10') {
			$mes_nombre = "octubre";
		}
		else if ($data['Mes'] == '11') {
			$mes_nombre = "noviembre";
		}
		else if ($data['Mes'] == '12') {
			$mes_nombre = "diciembre";
		}
    	$stringGrafico[] = array(
    		'mes' => ucfirst($mes_nombre),
    		'total' => $data['Total']

    	);
    }
    $arrayData['barra'] = $stringGrafico;

	//SELECT MONTH(fecha_venta) as Mes, SUM(cantidad*total) as Total FROM ventas GROUP BY MONTH(fecha_venta)

	echo json_encode($arrayData);
	//echo json_encode($stringGrafico);


?>