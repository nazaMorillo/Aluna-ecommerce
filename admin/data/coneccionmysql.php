<?php 
	$prueba = "Hola";
	$coneccion = mysqli_connect(
		'localhost',
		'root',
		'',
		'ecommerce'
	);
	$query = "SELECT * FROM productos";
	$result = mysqli_query($coneccion, $query);
	
	echo "<table border='2'";
	echo "<tr>";
	echo "<th>Nombre</th>";
	echo "<th>Marca</th>";
	echo "<th>Modelo</th>";
	echo "<th>Precio</th>";
	echo "</tr>";

	while($columna = mysqli_fetch_array($result)){
		echo "<tr>";
		echo "<td>".$columna['Name']."</td><td>".$columna['Brand']."</td><td>".$columna['Model']."</td><td>".$columna['Price']."</td>";
		echo "</tr>";
	}

	echo "</table>";
?>