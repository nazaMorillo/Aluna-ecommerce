<?php
include_once('funciones.php');
// session_start();
function validarLogin(){

	if ($_POST) {
            $_SESSION['messagerror']['email'] = "";
            $_SESSION['messagerror']['password'] = "";
            if(strlen($_POST['email']) == 0) {
                $_SESSION['messagerror']['email'] = "El email no puede estar vacío<br>";
            } elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $_SESSION['messagerror']['email'] = "El email ingresado no es válido<br>";
            }else{
                $_SESSION['completarCorrectos']['email'] = $_POST['email'];
            };
            if(strlen($_POST['password']) == 0) {
                $_SESSION['messagerror']['password'] = "La contraseña no puede estar vacía<br>";
            } elseif(strlen($_POST['password']) < 5) {
                $_SESSION['messagerror']['password'] = "La contraseña no puede ser menor a 5<br>";
            }else{
                $_SESSION['completarCorrectos']['password'] = $_POST['password'];
            };
            if($_SESSION['messagerror']['email'] == "" && $_SESSION['messagerror']['password'] == ""){
                return true;
            } else{
                header('Location: ../../index.php?sec=login#TOP');
            }
        }
    }
function redordarUsuario(){
    if (!empty($_POST['recordarUsuario'])) {
        $cookie_email = "email";
        $cookie_emailvalue = $_POST['email'];
        setcookie($cookie_email, $cookie_emailvalue, time()+604800);
        $cookie_password = "password";
        $cookie_passwordvalue = $_POST['password'];
        setcookie($cookie_password, $cookie_passwordvalue, time()+604800);
        header('Location: ../../index.php?sec=login#TOP');
    } elseif(isset($_COOKIE['email'])){
        setcookie('email',"",time()-604800);
        setcookie('password',"",time()-604800);
        header('Location: ../../index.php?sec=login#TOP');
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
    $usersJsonEncode = file_get_contents('admin/data/dataBase.json');
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
        $_SESSION['messagerror']['returnsearch'] = "<br><br>Contraseña incorrecta";
        header('Location: ../../index.php?sec=login#TOP');
	    } else{
	    	$_SESSION['messagerror']['returnsearch'] = "<br><br>El usuario no existe";
	        header('Location: ../../index.php?sec=login#TOP');
	    }
}
if (validarLogin()) {
    echo '<br><br>hola';
    redordarUsuario();
	if (recorrerBDBuscandoUsuario(abrirJson(), guardarInfoUsuario())){
		header('Location: loginExito.php');
	}
}
?>