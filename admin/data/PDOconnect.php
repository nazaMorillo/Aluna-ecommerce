<?php
	$dns = "mysql:host=localhost;dbname=ecommerce;port:3306";
	$usuario = "root";
	$password = "";
	$pdo = new PDO($dns,$usuario,$password);
	/*var_dump($pdo);
	$query = $pdo->prepare("SELECT * FROM productos");
	$query->execute();
	$productos = $query->fetchAll(PDO::FETCH_ASSOC);
	foreach($productos as $producto){
		echo $producto['name']." ".$producto['price']."<br>";
	}*/
?>