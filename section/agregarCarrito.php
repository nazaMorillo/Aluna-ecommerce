<?php
	echo "Hola";
	if(isset($_POST['id'])){
		echo "vino el post";
		$carritoEncode = file_get_contents("../admin/data/carrito.json");
		$carritoDecode = json_decode($carritoEncode, true);
		if($carritoDecode == ""){
			$carritoDecode[0] = $_POST['id'];
		} else{
			array_push($carritoDecode,$_POST['id']);
		}
		$guardarJsonCarrito = json_encode($carritoDecode);
		file_put_contents("../admin/data/carrito.json", $guardarJsonCarrito);
		echo "Producto agregado al carrito";
	}
?>