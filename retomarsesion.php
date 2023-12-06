<?php 
include 'conexion.php';
if (isset($_COOKIE['sesion'])) {
	$sesiondata = $_COOKIE['sesion'];
	$sesionpart = explode("Ç", $sesiondata);
	$usuario = $sesionpart[0];
	$pass = $sesionpart[1];
	$estado = 0;
	$busqueda=$conexion->prepare("SELECT * FROM usuarios WHERE user = '$usuario'");
	$busqueda->execute();
	$registro = $busqueda -> fetch();
	if (password_verify($pass, $registro['pass'])) {
		$estado = 1;
		$id = $registro['id'];
	}
	switch ($estado) {
		case 0:
			echo json_encode('error');
		break;
		case 1:
			echo json_encode('correcto');
			session_start();
			$st = $conexion -> prepare("SELECT * FROM usuarios WHERE id='$id'");
			$st ->execute();
			$usuario = $st -> fetch();
			$_SESSION['id'] = $usuario['id'];
			$_SESSION['nombre'] = $usuario['nombre'];
			$_SESSION['user'] = $usuario['user'];
			header('location: inicio.php');
		break;
	}
}



 ?>