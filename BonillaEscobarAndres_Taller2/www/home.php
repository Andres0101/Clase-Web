<!DOCTYPE html>
<html>
<head>
	<title>Shopping online</title>
	<link rel="stylesheet" href="css/styles.css">
	<!-- Fuentes -->
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<meta charset="utf-8" name="viewport" content="width=device-width">
</head>
<body>
	<div class="head">
		<header>
			<nav>
				<ul>
					<li>
						<figure>
							<a href="perfil.php">
								<img src="img/usuario.png" alt="usuario"/>
								<?php
									session_start();
									echo "</p>".$_SESSION['nombreUsuario']."</p>";
								?>
							</a>
						</figure>
					</li>
					<li>
						<figure>
							<a href="home.php">
								<img src="img/home.png" alt="home"/>
								<p>inicio</p>
							</a>
						</figure>
					</li>
					<li>
						<figure>
							<a href="carroCompras.php">
								<img src="img/carrito.png" alt="carrito"/>
								<p>Carrito de compras</p>
							</a>
						</figure>
					</li>
					<li>
						<figure>
							<a href="catalogo.php">
								<img src="img/catalogo.png" alt="catalogo"/>
								<p>Catalogo</p>
							</a>
						</figure>
					</li>
					<li>
						<a href="">Cerrar sesion</a>
					</li>
				</ul>
			</nav>
		</header>
	</div>

	<div id="productos">
		<h3>Productos destacados</h3>
		<hr>

		<?php
			include_once("includes/database.php");
			/*$idUser = $_SESSION['nombreUsuario'];*/

			/*$idUsuario = "SELECT usuarios.idUsuario FROM `usuarios` WHERE usuarios.nombreUsuario='$idUser'";
			if($_GET != null) {
				$idProductoSeleccionado = $_GET['idProducto'];

				$agregarProducto = "INSERT INTO `carrito`(`idCarrito`, `idUsuario`, `idProducto`)
					VALUES ('', '$idUsuario', '$idProductoSeleccionado')";
				$resultadoAgregar = mysqli_query($conexion, $agregarProducto);

				if($resultadoAgregar) {
					echo "Bien hecho";
				}else {
					echo "Joda";
				}
			}*/

			$r = array();
			//Selecciona los productos destacados
			$destacados = "SELECT productos.nombreProducto, productos.descripcionProducto, productos.imagenProducto
				FROM productos WHERE favorito='1'";
			$result = mysqli_query($conexion, $destacados);

			$i = 0;
			//Recorre la seleccion   
		   	while($row = mysqli_fetch_array($result)) {
		   		$r[] = $row;

			   	echo "<article>";
					echo "<div class='contenido'";
						echo "<figure>";
							echo"<img class='imagen' src='".$r[$i]['imagenProducto']."'/>";				
						echo"</figure>";				

					    echo "<h4>".$r[$i]['nombreProducto']."</h4>";
					    echo "<p>".$r[$i]['descripcionProducto']."</p>";

					    /*$query = "SELECT productos.idProducto, productos.nombreProducto
							FROM productos WHERE productos.nombreProducto='".$r[$i]['nombreProducto']."'";
						$resultQuery = mysqli_query($conexion, $query);

						while($otheRow = mysqli_fetch_array($resultQuery)) {
							$idProducto = $otheRow['idProducto'];
						}

						echo "<a href='home.php?idProducto=".$idProducto."'>";*/
						echo "<div class='contenido2'>";
							echo "<a href='home.php'>";
								echo "<img src='img/comprar.png' alt='dolar'/>";
							echo "</a>";
							
							echo "<a href='home.php'>";
								echo "<img src='img/carrito2.png' alt='carritoCompra'/>";
							echo "</a>";
						echo "</div>";
					echo "</div>";
				echo "</article>";

			    //Suma el indicador para que cada vez que recorra la seleccion salte a la siguiente fila
			    $i++;
		    };
	?>
	</div>
</body>
</html>