<?php

	require 'conn.php';



	$nombre_producto=$_REQUEST['producto'];

	$descripcion=$_REQUEST['descripcion'];

    $pu=$_REQUEST['precio'];

    $categoria=$_REQUEST['categoria'];

    $marca=$_REQUEST['marca'];

    $cantidad = $_REQUEST['cantidad'];



	$query="INSERT INTO productos(

    nombre,

    marca,

    cantidad,

    descripcion,

    precio_unidad,

    fk_categoria) 

    VALUES('$nombre_producto $marca','$marca', '$cantidad', '$descripcion','$pu',$categoria)";



	//



    $prueba=mysqli_query($conexion,"SELECT nombre FROM productos WHERE nombre='$nombre_producto' AND marca='$marca'");

    $lol=mysqli_fetch_array($prueba);

    if ($lol>0) {

           $respuesta = array(

                'respuesta' => 'Repetido'

            );

           $conexion->close();

            die(json_encode($respuesta));

       }

    else{

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

    }



	/*if ($result) {

        

        $respuesta = array(

        'respuesta' => "Success"

        );

        

    } else{

       

        $respuesta = array(

            'respuesta' => 'Fail'

        );

    }

    $conexion->close();

    die(json_encode($respuesta));*/

?>