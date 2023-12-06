<?php 
include 'conexion.php';
$op = $_REQUEST['op'];
switch ($op) {
	case 'materias':
		$st = $conexion -> prepare("SELECT * FROM materia");
		$st -> execute();
		$contador = 1;
		while ($materias = $st -> fetch()) {
			$o[$contador] = $materias['id'];
			$contador++;
		}
		$numaterias = $contador -1;
		for ($i=1; $i <= $numaterias ; $i++) { 
			$id = $o[$i];
			$nombre = "m" . $o[$i];
			$usuario = "mu" . $o[$i];
			$nombremateria = $_POST[$nombre];
			$usuariomateria = $_POST[$usuario];
			$st2 = $conexion -> prepare("SELECT * FROM usuarios WHERE nombre='$usuariomateria'");
			$st2 -> execute();
			$usuariomateria = $st2 -> fetch();
			$usuariomateria = $usuariomateria['id'];
			$st = $conexion -> prepare("UPDATE materia SET nombre='$nombremateria' WHERE id='$id'");
			$st -> execute();
		}
		header('location: inicio.php');
	break;
	case 'tareas':
		$st = $conexion -> prepare("SELECT * FROM tarea");
		$st -> execute();
		$contador = 1;
		while ($materias = $st -> fetch()) {
			$o[$contador] = $materias['id'];
			$contador++;
		}
		$numaterias = $contador -1;
		for ($i=1; $i <= $numaterias ; $i++) { 
			$id = $o[$i];
			$nombre = "nombre" . $o[$i];
			$descripcion = "descripcion" . $o[$i];
			$dificultad = "dificultad" . $o[$i];
			$fecha = "fecha" . $o[$i];
			$estado = "estado" . $o[$i];
			$nombre = $_POST[$nombre];
			$descripcion = $_POST[$descripcion];
			$dificultad = $_POST[$dificultad];
			$fecha = $_POST[$fecha];
			$estado = $_POST[$estado];
			echo $sql = "UPDATE tarea SET nombre='$nombre', descripcion='$descripcion', dificultad='$dificultad', fecha_entrega = '$fecha', estado='$estado' WHERE id='$id'";
			$st = $conexion -> prepare($sql);
			$st -> execute();
		}
		header('location: inicio.php');
	break;
	case 'eliminarmaterias':
		$id = $_REQUEST['id'];
		$st = $conexion -> prepare("DELETE FROM materia WHERE id = '$id'");
		$st -> execute();
		header('location:inicio.php');
	break;
	case 'eliminartarea':
		$id = $_REQUEST['id'];
		$st = $conexion -> prepare("DELETE FROM tarea WHERE id = '$id'");
		$st -> execute();
		header('location:inicio.php');
	break;
	default:
		header('location: inicio.php');
	break;
}

 ?>