<?php
    session_destroy();    
    session_start();
   // include_once("funciones.php");
function validarDatos(){
        if ($_POST) {

            if (strlen($_POST['username']) == 0) {
                $_SESSION['registErrMsj']['username'] = "El nombre no puede estar vacío<br>";
                $_SESSION['completarCorrectos']['nombre'] = "";
            } elseif(strlen($_POST['username']) < 2) {
                $_SESSION['registErrMsj']['username'] = "El nombre no puede tener menos de 2 caracteres<br>";
                $_SESSION['completarCorrectos']['nombre'] = "";
            } else{
                $_SESSION['completarCorrectos']['nombre'] = $_POST['username'];
            };

            if(strlen($_POST['usersecondname']) == 0) {
                $_SESSION['registErrMsj']['secondname'] = "El apellido no puede estar vacío<br>";
            } elseif(strlen($_POST['usersecondname']) < 2) {
                $_SESSION['registErrMsj']['secondname'] = "El apellido no puede tener menos de 2 caracteres<br>";
            }else{
                $_SESSION['completarCorrectos']['secondname'] = $_POST['usersecondname'];
            };

            if(strlen($_POST['useremail']) == 0) {
                $_SESSION['registErrMsj']['email'] = "El email no puede estar vacío<br>";
                $_SESSION['completarCorrectos']['secondname'] = "";
            } elseif(!filter_var($_POST['useremail'], FILTER_VALIDATE_EMAIL)) {
                $_SESSION['registErrMsj']['email'] = "El email ingresado no es válido<br>";
                $_SESSION['completarCorrectos']['secondname'] = "";
            }else{
                $_SESSION['completarCorrectos']['email'] = $_POST['useremail'];
            };

            if(strlen($_POST['userpassword']) == 0) {
                $_SESSION['registErrMsj']['password'] = "La contraseña no puede estar vacía<br>";
                $_SESSION['completarCorrectos']['password'] = "";
            } elseif(strlen($_POST['userpassword']) < 5) {
                $_SESSION['registErrMsj']['password'] = "La contraseña no puede ser menor a 5<br>";
                $_SESSION['completarCorrectos']['password'] = "";
            }else{
                $_SESSION['completarCorrectos']['password'] = $_POST['userpassword'];
            };

            if(!isset($_SESSION['registErrMsj'])){             
                return true;
            } else{
                $errores = 1;
                header('Location: ../../index.php?sec=registro#TOP');
            }
        }
    }

function redordarUsuario(){
    if (!empty($_POST['recordarUsuario'])) {
        $cookie_email = "email";
        $cookie_emailvalue = $_POST['useremail'];
        setcookie($cookie_email, $cookie_emailvalue, time()+604800);
        $cookie_password = "password";
        $cookie_passwordvalue = $_POST['userpassword'];
        setcookie($cookie_password, $cookie_passwordvalue, time()+604800);
        header('Location: ../../index.php?sec=registro#TOP');
    } elseif(isset($_COOKIE['email'])){
        setcookie('email',"",time()-604800);
        setcookie('password',"",time()-604800);
        header('Location: ../../index.php?sec=registro#TOP');
    }
}

function guardarInfoUsuario(){
    // Si se envían datos por el método POST se guarda la información en variables
    if ($_POST) {
       $username = $_POST['username'];
       $usersecondname = $_POST['usersecondname'];
       $useremail = $_POST['useremail'];
       $userpassword = password_hash($_POST['userpassword'], PASSWORD_DEFAULT);
    };
    // Se crea la variable a guardar en la base de datos con la información recibida
    $nuevousuario = [
        'name' => $username,
        'secondname' => $usersecondname,
        'email' => $useremail,
        'password' => $userpassword,
    ];
    // Si se envía un archivo
    if(strlen($_FILES['userimage']['tmp_name']) != ""){
        // Y si el archivo es una imagen, se guarda en una carpeta "img" y se le da el path a la variable a guardar
        if (pathinfo($_FILES['userimage']['name'], PATHINFO_EXTENSION) == 'jpg' || pathinfo($_FILES['userimage']['name'], PATHINFO_EXTENSION) == 'jpeg' || pathinfo($_FILES['userimage']['name'], PATHINFO_EXTENSION) == 'png') {
        $pathimage = $_FILES['userimage']['tmp_name'];
        $nameimage = pathinfo($_FILES['userimage']['name'], PATHINFO_FILENAME);
        $extimage = pathinfo($_FILES['userimage']['name'], PATHINFO_EXTENSION);
        move_uploaded_file($pathimage, '../images/avatar/'.$nameimage.'.'.$extimage);
        $nuevousuario['image'] = 'admin/images/avatar/'.$nameimage.'.'.$extimage;
        }
    };
    return $nuevousuario;
}

function abrirJson(){
    $usersJsonEncode = file_get_contents('../data/dataBase.json');
    $usersJsonDecode = json_decode($usersJsonEncode, true);
    return $usersJsonDecode;
}

function recorrerBDyGuardarUsuario($usersJsonDecode, $nuevousuario){
    if ($usersJsonDecode == "" ) {
        $usersJsonDecode[0] = $nuevousuario;
    } else{
        for ($i=0; $i<count($usersJsonDecode); $i++) {
            foreach ($usersJsonDecode[$i] as $key => $value) {
                if ($key == 'email') {
                        if ($value == $nuevousuario['email']) {
                        $_SESSION['registErrExistMsj'] = "<br><br>El usuario ya existe<br>";
                        header('Location: ../../index.php?sec=registro#TOP');
                        exit;
                        };
                    };
                }
            }
        array_push($usersJsonDecode, $nuevousuario);
        return $usersJsonDecode;
        }
        return $usersJsonDecode;
    }

function guardarJson($usersJsonDecode, $username){
    $usersMustSave = json_encode($usersJsonDecode);
    file_put_contents('../data/dataBase.json', $usersMustSave);
    $_SESSION['messagexito'] = "Bienvenido $username";
    header('Location: ../../index.php?sec=login#TOP');
}

if (validarDatos()) {
    redordarUsuario();
    guardarJson( recorrerBDyGuardarUsuario(  abrirJson(),guardarInfoUsuario()  ), guardarInfoUsuario()['name'] );
}

?>
