<?php
ob_start();
session_start();
?>
<?php

include 'conexion.php';

$nombre = $_POST['nombre'];
$user = $_POST['user'];
$pass = $_POST['pass'];
$pass = password_hash($pass, PASSWORD_DEFAULT);

$st = $conexion -> prepare("INSERT INTO usuarios (nombre, user, pass,opciones) VALUES ('$nombre', '$user', '$pass', 'tareas-materias')");
$st -> execute();
header('location: inicio.php');


?>