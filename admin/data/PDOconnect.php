<?php
	$dns = "mysql:host=localhost;dbname=ecommerce;port:3306";
	$PDOusuario = "root";
	$PDOpassword = "";
	$pdo = new PDO($dns,$PDOusuario,$PDOpassword);
	/*var_dump($pdo);
	$query = $pdo->prepare("SELECT * FROM productos");
	$query->execute();
	$productos = $query->fetchAll(PDO::FETCH_ASSOC);
	foreach($productos as $producto){
		echo $producto['name']." ".$producto['price']."<br>";
	}*/
?>