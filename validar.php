<?php 
include 'conexion.php';
sleep(2);
$usuario = $_POST['user'];
$usuariofrst = $_POST['user'];
$pass = $_POST['pass'];
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
		$opciones = $usuario['opciones'];
		$opcionespart = explode('-', $opciones);
		$_SESSION['materias'] = $opcionespart[0];
		$_SESSION['tareas'] = $opcionespart[1];
		if (isset($_POST['recordar'])) {
			setcookie("sesion", $usuariofrst."Ç".$pass, time() + 84600000);
		}		
	break;
}

  ?>