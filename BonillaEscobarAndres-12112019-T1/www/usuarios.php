<?php

	include_once("includes/database.php");

	echo "<h1>Participantes</h1>";

	$result = mysqli_query($conexion,"SELECT `NombreUsuario` FROM `usuarios`");

	echo "<table border='1'>
	<tr>
		<th>Nombre</th>
	</tr>";

	while($row = mysqli_fetch_array($result)) {
	  echo "<tr>";
	  echo "<td>" . $row['NombreUsuario'] . "</td>";
	  echo "</tr>";
	}

	echo "</table>";

?>