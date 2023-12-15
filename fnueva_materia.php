<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Nueva materia</title>
	<link rel="stylesheet" href="styles2.css">
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>

<body>
	<div class="container" id="container2">
		<style>
			#container2 {
				grid-template-columns: 5% auto 1fr auto 5%;
				grid-template-rows: 60px auto;
				grid-template-areas: 'header header header header header'
					'espacio espacio main espacio2 espacio2';
			}

			@media (max-width: 800px) {
				#container2 {
					grid-template-columns: auto;
					grid-template-rows: 60px auto;
					grid-template-areas: "header" "main";
				}

				.espacio {
					display: none;
				}

				.main {
					padding: 40px;
				}
			}
		</style>
		<?php include 'header.php' ?>
		<div class="espacio" style="grid-area: espacio; visibility: hidden;">as</div>
		<div class="espacio" style="grid-area: espacio2; visibility: hidden;">as</div>


		<div class="main">
			<form action="nueva_materia.php" class="form" method="POST">
				<h1>Crear nueva materia</h1>
				<?php
                    $usuario = $_SESSION['user'];
$sql = "SELECT * FROM usuarios WHERE user='$usuario'";
$st = $conexion -> prepare($sql);
$st -> execute();
$usuarioid = $st -> fetch()["id"];
$sql = "SELECT * FROM materia WHERE usuario='$usuarioid' ORDER BY nombre ASC";
//echo $sql;
$st = $conexion -> prepare($sql);
$st -> execute();
$contador = 1;
while ($fila = $st -> fetch()) {

    if ($contador == 1) {
        echo "<h3>Estas materias ya son existentes:</h3>";
    }
    echo "<p style='font-size: 12px; margin: 0;'>" . $fila['nombre'] . "</p>";
    $contador++;
}

?><br>
				<label style="margin-top: 20px;">Nombre: </label>
				<br><input type="text" name="nombre" required>
				<input type="submit" value="Enviar">
			</form>
		</div>
	</div>
	<script src="acciones.js"></script>
</body>

</html>