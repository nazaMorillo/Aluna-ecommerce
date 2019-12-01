<?php

$user = "root";
$pass = "";
$base = "charoaro_web";
$host = "localhost";

$conectar = new mysqli($host, $user, $pass, $base) or die("Error: ".mysqli_error($conectar));
$conectar->query("SET NAMES 'utf8'");
?>
