<?php
	require 'conn.php';

	$nombre_cat=$_POST['cat'];
	$descripcion=$_POST['descripcion'];

	$query="INSERT INTO categoria(nombre,descripcion) VALUES('$nombre_cat', '$descripcion')";

	$result=mysqli_query($conexion,$query) or die(mysqli_error($conexion));

	if ($result) {
        
        $respuesta = array(
        'respuesta' => "Success"
        );
        
    } else{

        $respuesta = array(
            'respuesta' => 'Fail'
        );
    }
    $conexion->close();
    die(json_encode($respuesta));
?>