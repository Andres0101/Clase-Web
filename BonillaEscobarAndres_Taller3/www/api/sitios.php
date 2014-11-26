<?php
include_once("includes/database.php");

$tipo = $_POST['tipo'];

// Selecciona el nombre, la latitud, longitud y id de la base de datos sitios donde el tipo sea igual
// al que se obtiene después de arrastrar un elemento al canvas
$result = mysqli_query($conexion,"SELECT nombre, latitud, longitud, id FROM sitios WHERE tipo='$tipo'");

$list = array();

// Recorre el query
while($row = mysqli_fetch_array($result)){
	$list[] = $row; // cada resultado queda en un arreglo
}

print json_encode($list);
?>