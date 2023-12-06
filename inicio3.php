<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inicio | Usuario</title>
	<link rel="stylesheet" href="style.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>
	<script src="js/push.min.js"></script>
	<?php include 'header.php'; ?>
	<div class="container">
		<div class="aside">
			<div class="botonaside" onclick="nueva_tarea()">+ Nueva tarea</div>
			<div class="botonaside" onclick="nueva_materia()">+ Nueva materia</div>
			<?php if ($usuarioinfo['id'] == 1): ?>
				<div class="botonaside" onclick="nuevo_usuario()">+ Nuevo usuario</div>
				<div class="botonaside" onclick="horario()">Mi horario</div>
			<?php endif ?>			
			<div class="botonaside">Cerrar sesión</div>
		</div>
		<div class="main">
			<h1>Bienvenido</h1>
			<?php 
				$usuario = $_SESSION['id'];
				$st = $conexion -> prepare("SELECT * FROM tarea WHERE usuario='$usuario' && estado=0");
				$st -> execute();
				$fechaactual = date('o-m-d');
				//$fechaactual = "2020-01-21";
				$i = 1;
				while($tarea = $st -> fetch()){
					$fecha_entrega = $tarea['fecha_entrega'];
					$date1 = new DateTime($fechaactual);
					$date2 = new DateTime($fecha_entrega);
					$diff = $date1->diff($date2);
					// will output 2 days
					$diferencia = $diff->days;
					$tareaid = $tarea['id'];
					if ($diferencia == 0) {
						$st2 = $conexion -> prepare("UPDATE tarea SET estado = 1 WHERE id='$tareaid'");
						$st2 -> execute();
						header('location: inicio.php');
					}
					$numtarea[$i] = $tarea['id'];
					$tareadiff[$i] = $diferencia;
					$tareadificultad[$i] = $tarea['dificultad'];
					$i++;
				}
				//echo $numtarea[24];
				if (isset($tareadiff)) {
					$datoso = count($tareadiff);
				}else{
					echo "<h2>No tiene tareas pendientes</h2><a href='fnueva_tarea.php'>+ Crear una</a>";
					?>
					<script src="acciones.js"></script>
					<script src="jquery.min.js"></script>
					<?php
					die();
				}
				
				for ($o=1; $o <= $datoso ; $o++) { 
					$tarea[$o] = $tareadiff[$o]."-".$tareadificultad[$o]."-".$numtarea[$o];
					//echo "<br>";
				}
				sort($tarea);
				$datostar = count($tarea);

				$h = 0;
				$m = 0;
				$l = 0;

				for ($i=0; $i < $datostar ; $i++) { 
					//echo $tarea[$i];
					$tareapart = explode("-", $tarea[$i]);
					/*******/
						if ($tareapart[0] == 1 && $tareapart[1] == 1) {
							$high[$h] = $tarea[$i];
							$h++;
						}
						if ($tareapart[0] == 2 && $tareapart[1] == 1) {
							$high[$h] = $tarea[$i];
							$h++;
						}
						if ($tareapart[0] == 3 && $tareapart[1] == 1) {
							$high[$h] = $tarea[$i];
							$h++;
						}
						if ($tareapart[0] == 4 && $tareapart[1] == 1) {
							$high[$h] = $tarea[$i];
							$h++;
						}
						if ($tareapart[0] == 5 && $tareapart[1] == 1) {
							$high[$h] = $tarea[$i];
							$h++;
						}
						if ($tareapart[0] == 6 && $tareapart[1] == 1) {
							$high[$h] = $tarea[$i];
							$h++;
						}
						if ($tareapart[0] == 7 && $tareapart[1] == 1) {
							$mid[$m] = $tarea[$i];
							$m++;
						}
						if ($tareapart[0] > 7 && $tareapart[1] == 1) {
							$low[$l] = $tarea[$i];
							$l++;
						}
						if ($tareapart[0] == 1 && $tareapart[1] == 2) {
							$high[$h] = $tarea[$i];
							$h++;
						}
						if ($tareapart[0] == 2 && $tareapart[1] == 2) {
							$high[$h] = $tarea[$i];
							$h++;
						}
						if ($tareapart[0] == 3 && $tareapart[1] == 2) {
							$high[$h] = $tarea[$i];
							$h++;
						}
						if ($tareapart[0] == 4 && $tareapart[1] == 2) {
							$mid[$m] = $tarea[$i];
							$m++;
						}
						if ($tareapart[0] == 5 && $tareapart[1] == 2) {
							$mid[$m] = $tarea[$i];
							$m++;
						}
						if ($tareapart[0] == 6 && $tareapart[1] == 2) {
							$mid[$m] = $tarea[$i];
							$m++;
						}
						if ($tareapart[0] == 7 && $tareapart[1] == 2) {
							$mid[$m] = $tarea[$i];
							$m++;
						}
						if ($tareapart[0] > 7 && $tareapart[1] == 2) {
							$low[$l] = $tarea[$i];
							$l++;
						}
						if ($tareapart[0] == 1 && $tareapart[1] == 3) {
							$high[$h] = $tarea[$i];
							$h++;
						}
						if ($tareapart[0] == 2 && $tareapart[1] == 3) {
							$high[$h] = $tarea[$i];
							$h++;
						}
						if ($tareapart[0] == 3 && $tareapart[1] == 3) {
							$high[$h] = $tarea[$i];
							$h++;
						}
						if ($tareapart[0] == 4 && $tareapart[1] == 3) {
							$mid[$m] = $tarea[$i];
							$m++;
						}
						if ($tareapart[0] == 5 && $tareapart[1] == 3) {
							$mid[$m] = $tarea[$i];
							$m++;
						}
						if ($tareapart[0] == 6 && $tareapart[1] == 3) {
							$low[$l] = $tarea[$i];
							$l++;
						}
						if ($tareapart[0] == 7 && $tareapart[1] == 3) {
							$low[$l] = $tarea[$i];
							$l++;
						}
						if ($tareapart[0] > 7 && $tareapart[1] == 3) {
							$low[$l] = $tarea[$i];
							$l++;
						}
					/******/
					//echo "<br>";
				}
				if (isset($high)) {
					$highcount = count($high);
				}else{
					$highcount = 0;
				}
				if (isset($mid)) {
					$midcount = count($mid);
				}else{
					$midcount = 0;
				}
				if (isset($low)) {
					$lowcount = count($low);
				}else{
					$lowcount = 0;
				}
				
				?>
				<?php
				/******************************************************************/
				for ($i=0; $i < $highcount; $i++) { 
					//echo $high[$i];
					$highpart = explode('-', $high[$i]);
					$idnum = $highpart[2];
					$st = $conexion -> prepare("SELECT * FROM tarea WHERE id='$idnum'");
					$st -> execute();
					$thistarea = $st -> fetch();
					$materia = $thistarea['materia'];
					$st2 = $conexion -> prepare("SELECT * FROM materia WHERE id='$materia'");
					$st2 -> execute();
					$thismateria = $st2 -> fetch();
				?>
				<div class="high">
				 	<div class="contenidotarea">
					 	<h3><?php echo $thistarea['nombre']; ?></h3>
					 	<h4>Materia: <?php echo $thismateria['nombre'] ?></h4><br>
					 	<h4>Descripcion:</h4><p><?php echo $thistarea['descripcion']; ?></p><br>
					 	<p>Fecha de entrega: <?php echo $thistarea['fecha_entrega']; ?></p>
				 	</div>
				 	<div class="finalizado">
				 		<button onclick="erasethis(<?php echo $thistarea['id']; ?>)">✅</button>
				 	</div>
				 </div>
				 <script>
				 	notificacion();
				 	function notificacion(){
						Push.create("<?php echo $thistarea['nombre']; ?>",{
							body: "Materia: <?php echo $thismateria['nombre'] ?>. <?php echo $thistarea['descripcion']; ?>",
							icon: "img/logo.png",
							timeout: 4000,
							onClick: function () {
								window.location="index.php";
								this.close();
							}
						});
					}
				</script>
				<?php
					}
				/**********************************************************************/
				 ?>
				 <?php
				/******************************************************************/
				for ($i=0; $i < $midcount; $i++) { 
					//echo $high[$i];
					$midpart = explode('-', $mid[$i]);
					$idnum = $midpart[2];
					$st = $conexion -> prepare("SELECT * FROM tarea WHERE id='$idnum'");
					$st -> execute();
					$thistarea = $st -> fetch();
					$materia = $thistarea['materia'];
					$st2 = $conexion -> prepare("SELECT * FROM materia WHERE id='$materia'");
					$st2 -> execute();
					$thismateria = $st2 -> fetch();
				?>
				<div class="mid">
				 	<div class="contenidotarea">
					 	<h3><?php echo $thistarea['nombre']; ?></h3>
					 	<h4>Materia: <?php echo $thismateria['nombre'] ?></h4><br>
					 	<h4>Descripcion:</h4><p><?php echo $thistarea['descripcion']; ?></p><br>
					 	<p>Fecha de entrega: <?php echo $thistarea['fecha_entrega']; ?></p>
				 	</div>
				 	<div class="finalizado">
				 		<button onclick="erasethis(<?php echo $thistarea['id']; ?>)">✅</button>
				 	</div>
				 </div>
				<?php
					}
				/**********************************************************************/
				 ?>
				 <?php
				/******************************************************************/
				for ($i=0; $i < $lowcount; $i++) { 
					//echo $high[$i];
					$lowpart = explode('-', $low[$i]);
					$idnum = $lowpart[2];
					$st = $conexion -> prepare("SELECT * FROM tarea WHERE id='$idnum'");
					$st -> execute();
					$thistarea = $st -> fetch();
					$materia = $thistarea['materia'];
					$st2 = $conexion -> prepare("SELECT * FROM materia WHERE id='$materia'");
					$st2 -> execute();
					$thismateria = $st2 -> fetch();
				?>
				<div class="low">
				 	<div class="contenidotarea">
					 	<h3><?php echo $thistarea['nombre']; ?></h3>
					 	<h4>Materia: <?php echo $thismateria['nombre'] ?></h4><br>
					 	<h4>Descripcion:</h4><p><?php echo $thistarea['descripcion']; ?></p><br>
					 	<p>Fecha de entrega: <?php echo $thistarea['fecha_entrega']; ?></p>
				 	</div>
				 	<div class="finalizado">
				 		<button onclick="erasethis(<?php echo $thistarea['id']; ?>)">✅</button>
				 	</div>
				 </div>
				<?php
					}
				/**********************************************************************/
				 ?>
			 
		</div>
	</div>
	
	<script src="jquery.min.js"></script>

</body>
</html>