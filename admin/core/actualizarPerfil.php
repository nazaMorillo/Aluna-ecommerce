<?php
	include_once("../data/PDOconnect.php");
	if(isset($_POST['useremail'])){
		$emailperfil = $_POST['useremail'];
	};

	function buscarUsuario($db,$email){
		$query = $db->prepare("SELECT * FROM usuarios WHERE email = :email");
		$query->bindValue(":email",$email);
		$query->execute();
		$result = $query->fetchAll(PDO::FETCH_ASSOC);
		var_dump($result);
		exit;
	};

	function actualizarUsuario($db,$usuariomodif){
		$query = $db->prepare("UPDATE usuarios SET  name = :name, secondname = :secondname, avatar = :avatar, password = :password");
		$query->execute([
			":name" => $usuariomodif['username'],
			":secondname" => $usuariomodif['usersecondname'],
			":email" => $usuariomodif['email'],
			":avatar" => $usuariomodif['avatar'],
			":password" => $usuariomodif['password']
		]);
		
	}

	buscarUsuario($pdo,$_POST['useremail']);

?>