<?php
    //session_destroy();
    session_start();
   // include_once("funciones.php");
function validarDatos(){
        if ($_POST) {

            if (isset($errores)) {
                unset($errores);
            }

            $errores = "";

            if (strlen($_POST['username']) == 0) {
                $nameVacio = "&nameVacio=El nombre no puede estar vacío";
                $errores .= $nameVacio;
                $_SESSION['completarCorrectos']['nombre'] = "";
            } elseif(strlen($_POST['username']) < 2) {
                $nameMin = "&nameMin=El nombre no puede tener menos de 2 caracteres";
                $errores .= $nameMin;
                $_SESSION['completarCorrectos']['nombre'] = "";
            } else{
                $_SESSION['completarCorrectos']['nombre'] = $_POST['username'];
            };

            if(strlen($_POST['usersecondname']) == 0) {
                $secondNameVacio = "&secondNameVacio=El apellido no puede estar vacío";
                $errores .= $secondNameVacio;
                $_SESSION['completarCorrectos']['secondname'] = "";
            } elseif(strlen($_POST['usersecondname']) < 2) {
                $secondNameMin = "&secondNameVacio=El apellido no puede tener menos de 2 caracteres";
                $errores .= $secondnameMin;
                $_SESSION['completarCorrectos']['secondname'] = "";
            }else{
                $_SESSION['completarCorrectos']['secondname'] = $_POST['usersecondname'];
            };

            if(strlen($_POST['useremail']) == 0) {
                $emailVacio = "&emailVacio=El email no puede estar vacío";
                $errores .= $emailVacio;
                $_SESSION['completarCorrectos']['email'] = "";
            } elseif(!filter_var($_POST['useremail'], FILTER_VALIDATE_EMAIL)) {
                $emailVal = "&emailMin=El email ingresado no es válido";
                $errores .= $emailVal;
                $_SESSION['completarCorrectos']['email'] = "";
            }else{
                $_SESSION['completarCorrectos']['email'] = $_POST['useremail'];
            };

            if(strlen($_POST['userpassword']) == 0) {
                $passVacia = "&passVacia=La contraseña no puede estar vacía";
                $errores .= $passVacia;
                $_SESSION['completarCorrectos']['password'] = "";
            } elseif(strlen($_POST['userpassword']) < 5) {
                $passMin = "&passMin=La contraseña no puede ser menor a 5";
                $errores .= $passMin;
                $_SESSION['completarCorrectos']['password'] = "";
            }else{
                $_SESSION['completarCorrectos']['password'] = $_POST['userpassword'];
            };

            if(strlen($_POST['userpassword2']) == 0) {
                $passVacia2 = "&passVacia2=La contraseña no puede estar vacía";
                $errores .= $passVacia2;
                $_SESSION['completarCorrectos']['password2'] = "";
            } elseif(strlen($_POST['userpassword']) < 5) {
                $passMin2 = "&passMin2=La contraseña no puede ser menor a 5";
                $errores .= $passMin2;
                $_SESSION['completarCorrectos']['password2'] = "";
            }else{
                $_SESSION['completarCorrectos']['password2'] = $_POST['userpassword2'];
            };

            if ($_SESSION['completarCorrectos']['password'] != "" && $_SESSION['completarCorrectos']['password2'] != "") {
             
                if($_POST['userpassword'] != $_POST['userpassword2']) {

                $passSame = "&passSame=Las contraseñas deben ser iguales";
                $passSame2 = "&passSame2=Las contraseñas deben ser iguales";
                $errores .= $passSame;
                $errores .= $passSame2;
                }else{
                $_SESSION['completarCorrectos']['passwordConfirmada'] = $_POST['userpassword'];
                };

            }

            if($errores == ""){             
                return true;
            } else{
                header("Location: ../../index.php?sec=perfil".$errores."&noCompletar=true");
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

function recorrerBDyGuardarUsuarioEditado($usersJsonDecode, $nuevousuario){
    for ($i=0; $i<count($usersJsonDecode); $i++) {
        foreach ($usersJsonDecode[$i] as $key => $value) {
            if ($key == 'email') {
                    if ($value == $nuevousuario['email']) {
                    $usersJsonDecode[$i]['name'] =  $nuevousuario['name'];
                    $usersJsonDecode[$i]['secondname'] =  $nuevousuario['secondname'];
                    if (isset($nuevousuario['image'])) {
                       $usersJsonDecode[$i]['image'] = $nuevousuario['image']; 
                    }
                    $usersJsonDecode[$i]['email'] = $nuevousuario['email'];
                    $usersJsonDecode[$i]['password'] = $nuevousuario['password'];
                    return $usersJsonDecode;
                }
            }
        }
    }
}

function guardarJson($usersJsonDecode, $username){
    $usersMustSave = json_encode($usersJsonDecode);
    file_put_contents('../data/dataBase.json', $usersMustSave);
    $_SESSION['messagexito'] = "Bienvenido $username";
    unset($_SESSION['nombreSesion']);
    unset($_SESSION['apellidoSesion']);
    unset($_SESSION['fotoSesion']);
    unset($_SESSION['emailSesion']);
    unset($_SESSION['UserID']);
    header('Location: ../../index.php?sec=login#TOP');
}

if (validarDatos()) {
    redordarUsuario();
    guardarJson( recorrerBDyGuardarUsuarioEditado(  abrirJson(),guardarInfoUsuario()  ), guardarInfoUsuario()['name'] );
}

?>
