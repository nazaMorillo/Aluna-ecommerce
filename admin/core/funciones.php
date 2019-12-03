<?php
session_start();
// $_FILES["avatar"]["name"] nos retornará el nombre con el que fue subido el archivo.

// Para mostrar fechas y horas
date_default_timezone_set('America/Argentina/Buenos_Aires');
setlocale(LC_TIME, "es_AR");

function mostrarFecha($fecha)
{
	return date_format(date_create($fecha), 'd/m/Y');
}

function mostrarFechaHora($fecha)
{
	return date_format(date_create($fecha), 'd/m/Y H:m');
}

function mostrarHora($fecha)
{
	return date_format(date_create($fecha), 'H:m');
}

function saludar(){
    echo '<br><br>';
    echo '<h1>Hola</h1>';
    exit;
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
// Recibe un json y agrega un array
function agregarUsuario($jsonUsuarios, $usuarioNuevo) {
    $arrayUsuarios= arrayDeJson($jsonUsuarios);
    $arrayUsuarios[] = $usuarioNuevo;
    return jsonDeArray($arrayUsuarios);
}
// Recibe la ubicación de un archivo y lo que hay que escribir en el
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
// Valida si se subió archivo, recibe $_FILE['avatar']['error'] y devuelve true o false
function validaSubidaArchivo($fileError) {
    if($fileError == 0 ){
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
// Sube un archivo, recibiendo por parametro nombre de input y ruta
function subirArchivo($fileNombre, $ruta) {
    $nombre=$_FILES[$fileNombre]["name"];
    $archivo=$_FILES[$fileNombre]["tmp_name"];
    $ext=pathinfo($nombre, PATHINFO_EXTENSION);
    move_uploaded_file($archivo, $ruta.$ext);  
}
// Recuperar datos de sessión
function sesionUsuario(){
    foreach($_SESSION['completarCorrectos'] as $key => $value){
        echo "$key : $value<br>";
    }    
}
// validar si existe $_POST, debuelve true si existe
function exitePOST(){
    $res=false;
    if(isset($_POST)){
        $res=true;
    }
    return $res;
}
// Devuelve POST si existe
function devuelvePost(){
    // echo '<br><br>entra por acá';
    pre($_POST);
    // exit;
}

// Recuperar datos de sessión
function arrayUserForm(){
    foreach($_SESSION['completarCorrectos'] as $key => $value){
        echo "$key : $value<br>";
    }    
}

// Recibe valores de formulario y lo agrega el usuario json
function crearUsuario() {
    $hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $usuario = [];
    $usuarios = file_get_contents("usuarios.json");
    $usuariosArray  = json_decode($usuarios,true);
    $usuariosArray[] = $usuario;
    $usuariosFinal = json_encode($usuariosArray );
    file_put_contents("usuarios.json", $usuariosFinal);
}

?>