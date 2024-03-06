<?php 
	require 'conn.php';

	$arrayData = array();
	$usuariosTabla="";
	$sel_usuarios = mysqli_query($conexion, "SELECT nombre,correo_electronico,privilegio FROM usuarios");
	

	while ($data = mysqli_fetch_array($sel_usuarios)) {
		if ($data['privilegio'] == "admin") {
			$privilegio = "Administrador";
		}
		else{
			$privilegio = "Usuario";
		}
		if ($_SESSION['nombre'] == $data['nombre']) {
			$usuariosTabla.="
			<tr>
	        	<td>$data[nombre]</td>
	        	<td>$data[correo_electronico]</td>
	        	<td>$privilegio</td>
	        	<td class='admin'>
	        		<div class='btn-group'>
		        		<button class='btn btn-primary editar admin' id='$data[nombre]' title='Editar registro' data-toggle='modal' data-target='.editar_usuario_modal'><i class='fa fa-edit'></i></button>
			        	<button class='btn btn-danger borrar admin' id='$data[nombre]' disabled title='No puedes borrar tu propio usuario'><i class='fa fa-trash'></i></button>
	        		</div>
	        	</td>                
	        </tr>

			";
		}
		else
		{
			$usuariosTabla.="
			<tr>
	        	<td>$data[nombre]</td>
	        	<td>$data[correo_electronico]</td>
	        	<td>$privilegio</td>
	        	<td class='admin'>
		        	<div class='btn-group'>
		        		<button class='btn btn-primary editar admin' id='$data[nombre]' title='Editar registro' data-toggle='modal' data-target='.editar_usuario_modal'><i class='fa fa-edit'></i></button>
			        	<button class='btn btn-danger borrar admin' id='$data[nombre]' title='Borrar registro'><i class='fa fa-trash'></i></button>
	        		</div>
	        	</td>                
	        </tr>

			";
		}
		
	}
	//$arrayData['usuarios'] = $usuariosTabla;
	//echo $arrayData;
	echo $usuariosTabla;
	$usuariosTabla="";

	//mysqli_close($conexion);



?>

