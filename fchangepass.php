<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cambiar contraseña</title>
	<link rel="stylesheet" href="styles2.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>
	<div class="container" id="container2">
	<style>
		#container2{
			grid-template-columns: 5% auto 1fr auto 5%;
			grid-template-rows: 60px auto;
			grid-template-areas: 'header header header header header'
								 'espacio espacio main espacio2 espacio2';
		}
		@media (max-width: 800px) {
			#container2{
				grid-template-columns: auto;
				grid-template-rows: 60px auto;
				grid-template-areas: "header""main";
			}
			.espacio{
				display: none;
			}
			.main{
				padding: 40px;
			}
		}
	</style>
	<?php include 'header.php' ?>
		<div class="espacio" style="grid-area: espacio; visibility: hidden;">as</div>
		<div class="espacio" style="grid-area: espacio2; visibility: hidden;">as</div>
		
		
		<div class="main">
			<form action="changepass.php" class="form" method="POST">
				<h1>Crear nueva materia</h1>
				<label style="margin-top: 20px;">Contraseña actual: </label>
				<br><input type="password" name="firstpass" required>
				<label style="margin-top: 20px;">Contraseña nueva: </label>
				<br><input type="password" name="pass" required>
				<label style="margin-top: 20px;">De nuevo contraseña nueva: </label>
				<br><input type="password" name="rpass" required>
				<input type="submit" value="Enviar">
			</form>
		</div>
		</div>
	</div>
	<script src="acciones.js"></script>
</body>
</html>