<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cambio contraseña</title>
	<link rel="stylesheet" href="style.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>
	<?php include 'header.php' ?>
<?php 

$firstpass = $_POST['firstpass'];
$pass = $_POST['pass'];
$rpass = $_POST['rpass'];

$usuario = $_SESSION['id'];
$sql = "SELECT * FROM usuarios WHERE id='$usuario'";
$st = $conexion -> prepare($sql);
$st -> execute();
$registro = $st -> fetch();

$estado = 0;
//echo $registro['pass'];
if (password_verify($firstpass, $registro['pass'])) {
	$estado = 1;
}
if ($pass != "" && $rpass != "" && $pass == $rpass && $estado == 1) {
	$estado = 2;
	$pass = password_hash($pass, PASSWORD_DEFAULT);
	$sql = "UPDATE usuarios SET pass='$pass' WHERE id='$usuario'";
	$st = $conexion -> prepare($sql);
	$st -> execute();
}

 ?>
 <style>
		p{
			margin-top: 0;
			margin-bottom: 0;
		}
	</style>
	<div class="container">
		<div class="main" style="padding: 30px; box-sizing: border-box;">
			<?php if ($estado == 0): ?>
				<h1>Su contraseña actual no coincide</h1>
			<?php endif ?>
			<?php if ($estado == 1): ?>
				<h1>Las nuevas contraseñas no coinciden</h1>
			<?php endif ?>
			<?php if ($estado == 2): ?>
				<h1>Contraseña cambiada correctamente</h1>
				<?php if (isset($_COOKIE['sesion'])): ?>
					<h3>Para poder efectuar el cambio en la sesion guardada en el navegador, su sesión ha clausurado.</h3>	
					<p>Porfavor vuelva a <a href="index.php">Iniciar sesión</a>.</p>
				<?php 
					$usuariofrst = $_SESSION['user'];
					session_destroy();
					setcookie("sesion", $usuariofrst."Ç".$pass, time() - 84600000);
					die();
				 ?>
				 
				<?php endif ?>				
			<?php endif ?>			
			<a href="inicio.php">Volver a la pagina inicial</a>
		</div>
	</div>
	<script src="acciones.js"></script>
</body>
</html>