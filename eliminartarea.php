<?php 

include 'conexion.php';
$id = $_POST['id'];
$st = $conexion -> prepare("UPDATE tarea SET estado = 1 WHERE id='$id'");
$st -> execute();

 ?>