<?php
ob_start();
session_start();
?>
<?php
include 'header.php';
$nombre = $_POST['nombre'];
$materia = $_POST['materia'];
$fecha = $_POST['fecha'];
$descripcion = $_POST['descripcion'];
$dificultad = $_POST['dificultad'];
$usuario = $_SESSION['id'];

echo $sql = "INSERT INTO tarea(nombre, descripcion, dificultad, materia, fecha_entrega, usuario, estado) VALUES ('$nombre', '$descripcion', '$dificultad', '$materia', '$fecha', '$usuario', 0)";
$st = $conexion -> prepare($sql);
$st -> execute();
header('Location: inicio.php');

?>