<?php
// $_FILES["avatar"]["name"] nos retornará el nombre con el que fue subido el archivo.


function saludar(){
    echo 'Hola';
}
// Muestra un con formato de array asociativo
function pre($array){
    echo "<pre>";
    var_dump($array);
    echo "</pre>";
 }
// Recibe un json y retorna un array del mismo
function arrayDeJson($json){
    return json_decode($json, true);
}
// Recibe un array y retorna un json del mismo
function jsonDeArray($array) {
    return json_encode($array);
}
// Recibe un json, agrega un array de usuario y retorna un Json 
function agregarUsuario($jsonUsuarios, $usuarioNuevo) {
    $arrayUsuarios = arrayDeJson($jsonUsuarios);
    $arrayUsuarios[] = $usuarioNuevo;
    return jsonDeArray($arrayUsuarios);
}
// Recibe la ubicación de un archivo y le agrega el contenido
function escribirArchivo($rutaArchivo, $contenido) {
    file_put_contents($rutaArchivo, $contenido);
 }
 // Recibe el nombre del archivo y retorna el contenido del mismo
 function leerArchivo($archivo) {
    return file_get_contents($archivo);
}
// Recibe texto y lo encripta
function encriptar($textoPlano) {
    $hash = password_hash($textoPlano, PASSWORD_DEFAULT);
    return $hash;
}
// Compara texto y hash que recibe y retorna verdadero o falso
function verificarPass($texto, $hash) {
    return password_verify($texto, $hash);
}
// Valida si se subió archivo, recibe nombre del input, lo agrega a $_FILE['avatar']['error'] y devuelve true o false
function validaSubidaArchivo($fileNombre) {
    $error=$_FILES[$fileNombre]["error"];
    if($error == 0 ){
      return true;
    }else{
      return false;
    }
}
// Valida extensión, Recibe nombre del campo ($_FILES["*avatar*"]["name"]) y revuelve true o false si es correcta
function validarExtFile($fileNombre) {
    $nombre=$_FILES[$fileNombre]["name"];
    $ext=pathinfo($nombre, PATHINFO_EXTENSION);
    if($ext != "jpg" && $ext != "jpeg" && $ext != "png"){
      return false;
    }else{
      return true;
    }
}
// Extraer nombre y extension de $_FILES pasandole nombre del input file
function nombreYExtensionFile($inputfile){
    $nombre=$_FILES[$inputfile]["name"];
    $ext=pathinfo($nombre, PATHINFO_EXTENSION);
    return "$nombre.$ext";
}

// Sube un archivo, recibiendo por parametro nombre de input y ruta
function subirArchivo($inputfile, $ruta) {
    $archivo=$_FILES[$inputfile]["tmp_name"];
    $nombreConExtension=nombreYExtensionFile($inputfile);  
    move_uploaded_file($archivo, $ruta.$nombreConExtension);  
}
// Recibe valores de formulario si existe y lo agrega al usuario json
function crearUsuario($dataForm, $dataFile=null) {
    $usuario=[];
    if( isset($dataForm) ){
        foreach($dataForm as $key => $value){
            if($key=="password" || $key =="clave" || $key =="pass" ){
                $usuario[$key]=encriptar($value);;
            }else{
                $usuario[$key]=$value;
            }       
        }
    }else{
        return $usuario;
    }
    if(validaSubidaArchivo($dataFile)){
        foreach($dataFile as $file){
                $usuario[$key]=$value;
            }       
        }
        subirArchivo($dataFile,"admin/images/avatar/");
        $usuario["urlAvatar"]="admin/images/avatar/";
    }


//     $hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
//     $usuario = [
//     "email" => $_POST["email"],
//     "username" => $_POST["username"],
//     "password" => $hash
//   ];
    $usuarios = file_get_contents("usuarios.json");
    $usuariosArray  = json_decode($usuarios,true);
    $usuariosArray[] = $usuario;
    $usuariosFinal = json_encode($usuariosArray );
    file_put_contents("usuarios.json", $usuariosFinal);
}



?>