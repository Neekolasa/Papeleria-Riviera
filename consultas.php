<?php 
//SELECCIONAR PRODUCTOS SIN LA MARCA EN EL NOMBRE
$sin_marca = "SELECT productos.id_producto, replace(productos.nombre, productos.marca, "") as nombre, productos.marca, productos.precio_unidad, categoria.nombre as categoria FROM productos JOIN categoria on productos.fk_categoria = categoria.id";



?>



