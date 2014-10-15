<!DOCTYPE html>
<html>
<head>
	<title>Web</title>
	<link rel="stylesheet" href="css/styles.css">
	<meta charset="utf-8" name="viewport" content="width=device-width">
</head>
<body>
	<header>
		<nav>
			<ul>
				<li>
					<figure>
						<img src="img/home.png" alt="home"/>
					</figure>
					<a href="">Home</a>
				</li>
				<li>
					<figure>
						<img src="img/aboutUs.png" alt="about us">
					</figure>
					<a href="">About us</a>
				</li>
				<li>
					<figure>
						<img src="img/contactUs.png" alt="about us">
					</figure>
					<a href="">Contact us</a>
				</li>
			</ul>
		</nav>
	</header>

	<div>
		<img src="img/logo.png" alt="logo">
	</div>

	<?php
	echo "<section>";
			include_once("includes/database.php");

			$r = array();

			if(empty($_GET)) {
				$result = mysqli_query($conexion,"SELECT usuarios.imagenUsuario, usuarios.nombreUsuario, articulos.Titulo, articulos.Contenido FROM usuarios
					JOIN articulos ON articulos.id_Usuario = usuarios.id_Usuario");
			} else {
				$result = mysqli_query($conexion, "SELECT usuarios.imagenUsuario, usuarios.nombreUsuario, articulos.Titulo, articulos.Contenido FROM articulos
					JOIN favoritos ON favoritos.id_Articulo = articulos.id_Articulo
					JOIN usuarios ON usuarios.id_Usuario = favoritos.id_Usuario
					WHERE usuarios.id_Usuario =".$_GET["id"]);
			}

			$i = 0;    
		   	while($row = mysqli_fetch_array($result)) {
		   		$r[] = $row;

			   	echo "<article>";
			   		echo "<div class='estrella'>★</div>";

					echo "<div class='contenido'";
						echo "<figure>";
							echo"<img class='imagen' src='".$r[$i]['imagenUsuario']."'/>";				
						echo"</figure>";				

					    echo "<p>".$r[$i]['nombreUsuario']."</p>";
				    echo "</div>";
				    echo "</br>";

				    echo "<h1>".$r[$i]['Titulo']."</h1>";
				    echo "<p>".$r[$i]['Contenido']."</p>";

				    echo "<footer>";
						echo "<div id='likeDislike'>";
							echo "<div class='like'>";
								echo "<img src='img/like.png' alt='like'>";
							echo "</div>";
							echo "<div class='dislike'>";
								echo "<img src='img/dislike.png' alt='like'>";
							echo "</div>";
						echo "</div>";
					echo "</footer>";
				echo "</article>";

			    $i++;
		    };
	echo "</section>";
	?>

	<aside>
	</aside>

	<footer></footer>
</body>
</html>