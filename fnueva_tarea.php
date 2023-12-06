<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Nueva tarea</title>
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
			<form action="nueva_tarea.php" class="form" method="POST" autocomplete="off">
				<h1>Crear nueva tarea</h1>
				<label>Nombre: </label>
				<br><input type="text" name="nombre" required>
				<br><label>Materia: </label>
				<br><select name="materia" required><?php 
					$usuario = $_SESSION['id'];
					$st = $conexion -> prepare("SELECT * FROM materia WHERE usuario='$usuario'");
					$st -> execute();
					$estado = 0;
					while ($fila = $st -> fetch()) {
						$estado = 1;
				?>
					<option value="<?php echo $fila['id'] ?>"><?php echo $fila['nombre'] ?></option>
				<?php
					}
					if ($estado == 0) {
						header('location: fnueva_materia.php');
					}

				 ?></select>
				<br><label>Fecha de entrega: </label>
				<br><input type="date" name="fecha" required>
				<br><label>Descripción</label>
				<br><textarea name="descripcion" required></textarea>
				<br><label>Dificultad:</label>
				<div class="dificultad">
					<input type="radio" name="dificultad" value="1" id="baja"><label for="baja">Baja</label>
					<input type="radio" name="dificultad" value="2" id="media"><label for="media">Media</label>
					<input type="radio" name="dificultad" value="3" id="alta"><label for="alta">Alta</label>
				</div>
				<input type="submit" value="Enviar">
			</form>
		</div>
	</div>
	<script src="acciones.js"></script>
</body>
</html>