<?php 
	require 'conn.php';

	$arrayData = array();
	$usuariosTabla="";
	$sel_categorias = mysqli_query($conexion, "SELECT * FROM categoria");
	

	while ($data = mysqli_fetch_array($sel_categorias)) {
		
		$usuariosTabla.="
		<tr>
        	<td>$data[id]</td>
        	<td>$data[nombre]</td>
        	<td>$data[descripcion]</td>
        	<td class='admin'>
        		<div class='btn-group'>
	        		<button class='btn btn-primary editar admin' id='$data[id]' title='Editar registro' data-toggle='modal' data-target='.editar_categoria_modal'><i class='fa fa-edit'></i></button>
		        	<button class='btn btn-danger borrar admin' id='$data[id]' title='Borrar registro'><i class='fa fa-trash'></i></button>
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
