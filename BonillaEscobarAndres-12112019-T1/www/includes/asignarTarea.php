<?php

	include_once("database.php");

	$nombreTarea = $_POST["titulo"];
	$descripcion = $_POST["descripcion"];
	$importancia = $_POST["importancia"];
	$fecha = $_POST["fecha"];
	$destinatario = $_POST["destinatario"];

	echo "Nombre de la tarea: " . $nombreTarea;
	echo "<br/>";
	echo "Descripcion: " . $descripcion;
	echo "<br/>";
	echo "Importancia: " . $importancia;
	echo "<br/>";
	echo "Fecha: " . $fecha;
	echo "<br/>";
	echo "Destinatario: " . $destinatario;

	$result = mysqli_query($conexion, "INSERT INTO `tareasdeusuarios`(`NombreUsuario`, `NombreTarea`, `Descripcion`, `Fecha`, `Prioridad`) VALUES ('$destinatario','$nombreTarea','$descripcion','$fecha','$importancia')");
?>