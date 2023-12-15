<?php include 'conexion.php';

session_start();
if (!isset($_SESSION['id'])) {
    session_destroy();
} else {
    header('location: inicio.php');
}
if (isset($_COOKIE['sesion'])) {
    header('location: retomarsesion.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Inicio</title>
	<link rel="stylesheet" href="styles2.css">
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<script src="acciones.js"></script>
<script src="jquery.min.js"></script>

<body style="background-image: url(educacion2.jpg); background-size: cover;">
	<style>
		body {
			overflow-x: hidden;
			overflow-y: hidden;
		}

		.span {
			width: 100%;
			height: 30px;
			display: flex;
			align-items: center;
			justify-content: center;
			color: #ffffff;
			font-weight: bold;
			position: absolute;
			overflow: hidden;
			transition: .5s ease;
			height: 0;
			background-color: red;
		}

		.footer {
			width: 100%;
			position: fixed;
			bottom: 0;
			left: 0;
			background-color: #1D1D1D;
			height: 100px;
			padding: 10px;
		}
	</style>
	<div class="span" id="span">Usuario o contraseña incorrectos</div>
	<div class="logincontainer">
		<form action="#" id="formulario">
			<img src="unnamed.png" width="100px" height="100px" style="margin-bottom: 20px;">
			<label>Usuario:</label>
			<input type="text" name="user">
			<label>Contraseña:</label>
			<input type="password" name="pass">
			<div class="recordar" style="display: flex; justify-content: center; align-items: center;">
				<div class="chk"><input type="checkbox" name="recordar" id="recordar" style="width: auto;"></div>
				<div class="lbl"><label for="recordar" style="font-weight: normal;">Guardar sesión en el
						navegador</label></div>
			</div>
			<input type="submit" id="boton" value="Ingresar">
		</form>
	</div>
	<div class="footer"></div>
	<script src="validar.js"></script>

</body>

</html>