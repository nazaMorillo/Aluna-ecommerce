<?php
session_start();

function validarLogin(){	
	if ($_POST) {

            $_SESSION['messagerror'] = "";

            if(strlen($_POST['email']) == 0) {
                $_SESSION['messagerror'] .= "<br><br>El email no puede estar vacío<br>";
            } elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $_SESSION['messagerror'] .= "<br><br>El email ingresado no es válido<br>";
            };

            if(strlen($_POST['password']) == 0) {
                $_SESSION['messagerror'] .= "La contraseña no puede estar vacía<br>";
            } elseif(strlen($_POST['password']) < 5) {
                $_SESSION['messagerror'] .= "La contraseña no puede ser menor a 5<br>";
            };

            if($_SESSION['messagerror'] == ""){
                return true;
            } else{
                header('Location: login.php');
            }
        }
    }

function guardarInfoUsuario(){
    // Si se envían datos por el método POST se guarda la información en variables
    if ($_POST) {
       $useremail = $_POST['email'];
       $userpassword = $_POST['password'];
    };

    // Se crea la variable a guardar en la base de datos con la información recibida
    $nuevousuario = [
        'email' => $useremail,
        'password' => $userpassword,
    ];
    return $nuevousuario;
}

function abrirJson(){
    $usersJsonEncode = file_get_contents('dataBase.json');
    $usersJsonDecode = json_decode($usersJsonEncode, true);
    return $usersJsonDecode;
}

function recorrerBDBuscandoUsuario($usersJsonDecode, $nuevousuario){
	$flagemail = false;
	$flagpassword = false;
        for ($i=0; $i<count($usersJsonDecode); $i++) {
            foreach ($usersJsonDecode[$i] as $key => $value) {
                if ($key == 'email') {
                        if ($value == $nuevousuario['email']) {
                        	$flagemail = true;
                        }
                    }
                if ($key == 'password') {
                        if (password_verify($nuevousuario["password"],$value)) {
                        	$flagpassword = true;
                        }
                    }
                }
            }
        if ($flagemail && $flagpassword) {
        	$_SESSION['messagexito'] = "Usuario <br>".$nuevousuario['email']." Bienvenido!!";
            return true;
        } elseif($flagemail){
        $_SESSION['messagerror'] = "<br><br>Contraseña incorrecta";
        header('Location: login.php');        	
	    } else{
	    	$_SESSION['messagerror'] = "<br><br>El usuario no existe";
	        header('Location: login.php');
	    }
}

if (validarLogin()) {
	if (recorrerBDBuscandoUsuario(abrirJson(), guardarInfoUsuario())){
		header('Location: loginExito.php');
	}

}
?>