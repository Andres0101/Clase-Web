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
		<h3>Productos en el carrito de compras</h3>
		<hr>

		<?php
			include_once("includes/database.php");

			$user = $_SESSION['nombreUsuario'];

			$r = array();
			//Selecciona los productos comprados
			$productosCarrito = "SELECT productos.nombreProducto, productos.descripcionProducto, productos.imagenProducto, compras.fecha FROM productos
				JOIN compras ON compras.idProducto=productos.idProducto
				JOIN usuarios ON compras.idUsuario=usuarios.idUsuario
				WHERE usuarios.idUsuario='a01'";
			$resultCarrito = mysqli_query($conexion, $productosCarrito);

			$i = 0;
			//Recorre la seleccion   
		   	while($row = mysqli_fetch_array($resultCarrito)) {
		   		$r[] = $row;

			   	echo "<article>";
					echo "<div class='contenido'";
						echo "<figure>";
							echo"<img class='imagen' src='".$r[$i]['imagenProducto']."'/>";				
						echo"</figure>";				

					    echo "<h4>".$r[$i]['nombreProducto']."</h4>";
					    echo "<p>".$r[$i]['descripcionProducto']."</p>";
					    echo "<p>"."Fecha de compra: ".$r[$i]['fecha']."</p>";

					echo "</div>";
				echo "</article>";

			    //Suma el indicador para que cada vez que recorra la seleccion salte a la siguiente fila
			    $i++;
		    };
	?>
	</div>
</body>
</html>