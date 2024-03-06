<?php
	require 'conn.php';

    
	$result = "";
    $arrayData= array();
    if (!isset($_REQUEST['datos'])) {
        $nombre_producto=$_REQUEST['producto'];
        $query="SELECT * FROM productos WHERE nombre LIKE '%".$nombre_producto."%' OR marca LIKE '%".$nombre_producto."%'";

        //$query="SELECT * FROM productos WHERE nombre LIKE '%".$nombre_producto."%' OR marca LIKE '%".$nombre_producto."%' OR descripcion LIKE '%".$nombre_producto."%'";

        $resultado=mysqli_query($conexion,$query) or die(mysqli_error($conexion));
        while ($a = mysqli_fetch_array($resultado)) {
                    $result.= "<option marca='".$a['marca']."' value='".$a['nombre']."''>";
                    //$result.= "<option marca='".$a['marca']."' value='".$a['nombre'].' '.$a['descripcion']."'>";
                    $result.= $a["nombre"]." ".substr($a["descripcion"],0,3);
                    //$result.= $a["nombre"];
                    $result.= "</option>";
                }
                
                $arrayData['opcion'] = $result;
                echo json_encode($arrayData);
    }
    else
    {
        $nombre_producto=$_REQUEST['product'];
        $query="SELECT * FROM productos WHERE nombre LIKE '%".$nombre_producto."%'";

        $resultado=mysqli_query($conexion,$query) or die(mysqli_error($conexion));
        $data = mysqli_fetch_assoc($resultado);
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        exit;
    }
	
        
	
/*
    AL MOSTRAR LOS PRODUCTOS REEMPLAZAR LA MARCA EN EL NOMBRE PARA EVITAR REDUNDANCIA AL MOSTRAR LA INFORMACION

*/    
?>

