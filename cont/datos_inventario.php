<?php 

	require 'conn.php';



	$arrayData = array();

	$usuariosTabla="";

	$sel_categorias = mysqli_query($conexion, "SELECT productos.id_producto, TRIM(replace(productos.nombre,productos.marca,'')) as nombre, productos.marca,productos.descripcion, productos.precio_unidad, productos.cantidad, categoria.nombre as categoria FROM productos JOIN categoria on productos.fk_categoria = categoria.id  ");

	



	while ($data = mysqli_fetch_array($sel_categorias)) {

		

		$usuariosTabla.="

		<tr>

        	<td>$data[id_producto]</td>

        	<td>$data[nombre]</td>

        	<td>$data[marca]</td>

        	<td>$data[cantidad]</td>

        	<td>$data[descripcion]</td>

        	<td>$ $data[precio_unidad]</td>

        	<td>$data[categoria]</td>

        	<td class='admin'>

        		<div class='btn-group'>

	        		<button class='btn btn-primary editar admin' id='$data[id_producto]' title='Editar registro' data-toggle='modal' data-target='.editar_inventario_modal'><i class='fa fa-edit'></i></button>

	        		<br />

		        	<button class='btn btn-danger borrar admin' id='$data[id_producto]' title='Borrar registro'><i class='fa fa-trash'></i></button>

        		</div>

	        	

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

