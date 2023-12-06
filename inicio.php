<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inicio</title>
	<link rel="stylesheet" href="styles2.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>
	<div class="container">
		<?php include 'header.php'; ?>
		<div class="aside">
			<?php if ($usuarioinfo['id'] != 0): ?>
			<?php if ($_SESSION['tareas'] != 'none'): ?>
				<div class="botonaside" onclick="nueva_tarea()">+ Nueva tarea</div>
			<?php endif ?>
			<?php if ($_SESSION['materias'] != 'none'): ?>
				<div class="botonaside" onclick="nueva_materia()">+ Nueva materia</div>
			<?php endif ?>			
			<?php if ($usuarioinfo['id'] == 1): ?>
				<div class="botonaside" onclick="nuevo_usuario()">+ Nuevo usuario</div>
				<div class="botonaside" onclick="horario()">Mi horario</div>
			<?php endif ?>			
			<?php endif ?>
			<div class="botonaside" onclick="cerrar_sesion()">Cerrar sesión</div>
		</div>
		<div class="main">
			<h1>Bienvenido</h1>

			<?php if ($usuarioinfo['id'] != 0):include 'algoritmo.php';else: include 'admin.php';endif; ?>

		</div>
	</div>
</body>
</html>