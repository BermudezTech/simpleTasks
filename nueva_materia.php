<?php
ob_start();
session_start();
?>
<?php
include 'header.php';
$nombre = $_POST['nombre'];
$usuario = $_SESSION['id'];
$st = $conexion -> prepare("INSERT INTO materia(nombre, usuario) VALUES ('$nombre', '$usuario')");
$st -> execute();
header('Location: inicio.php');

?>