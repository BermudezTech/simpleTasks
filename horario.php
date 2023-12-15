<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Mi horario</title>
	<link rel="stylesheet" href="styles2.css">
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>

<body>
	<div class="container" style="
		grid-template-columns: auto;
		grid-template-rows: 60px auto;
		grid-template-areas: 'header''main';
	">
		<?php include 'header.php' ?>
		<div class="main" style="overflow: auto; ">
			<table style="margin-right: 10px;">
				<tr>
					<th>Hora</th>
					<th>Lunes</th>
					<th>Martes</th>
					<th>Miercoles</th>
					<th>Jueves</th>
					<th>Viernes</th>
					<th>Sabado</th>
				</tr>
				<tr>
					<td>8:05 - 10:00</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td><b>INGLES I </b><br> BLOQ C108</td>
				</tr>
				<tr>
					<td>2:05 - 4:00</td>
					<td><b>COMUNICACION ORAL Y ESCRITA </b><br> BLOQ C107</td>
					<td><b>MATEMATICAS BASICAS </b><br> BLOQ E305</td>
					<td><b>EXPRESION GRAFICA </b><br> BLOQ G208</td>
					<td><b>INTRODUCCION A LA TECNOLOGIA </b><br> BLOQ J401-2</td>
					<td><b>QUIMICA </b><br> BLOQ C105</td>
					<td><b></td>
				</tr>
				<tr>
					<td>4:05 - 6:00</td>
					<td><b>ALGEBRA LINEAL </b><br> BLOQ C210</td>
					<td><b>HUMANIDADES </b><br> BLOQ C107</td>
					<td><b>MATEMATICAS BASICAS </b><br> BLOQ C210</td>
					<td><b>ALGEBRA LINEAL </b><br> BLOQ C208</td>
					<td><b>EXPRESION GRAFICA </b><br> BLOQ D202</td>
					<td><b></td>
				</tr>
			</table>
			<div class="espacio" style="visibility: hidden;">a</div>
			<style>
				table {
					width: 100%;
					border: 2px solid #000;
					border-collapse: collapse;
					font-size: 13px;
				}

				tr,
				th,
				td {
					border: 1px solid #000;
					text-align: center;
				}

				.main {
					display: flex;
				}
			</style>
		</div>
	</div>
</body>

</html>