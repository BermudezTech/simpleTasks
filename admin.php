<div class="admin">
<h3>Materias</h3>

<div class="table-responsive">
	<form action="modificar.php?op=materias" method="POST">
		<div class="boton"><input type="submit" value="Guardar"></div>
	<table>
		<tr>
			<th>Nombre</th>
			<th>Usuario</th>
			<th>Eliminar</th>
		</tr>
		<?php 
			$st = $conexion -> prepare("SELECT * FROM materia");
			$st -> execute();
			while ($materia = $st -> fetch()) {
				$usuarioid = $materia['usuario'];
				$st2 = $conexion -> prepare("SELECT * FROM usuarios WHERE id='$usuarioid'");
				$st2 -> execute();
				$usuario = $st2 -> fetch();
				$usuario = $usuario['nombre'];
		?>
		<tr>
			<td><input type="text" name="m<?php echo $materia['id'] ?>" value="<?php echo $materia['nombre'] ?>"></td>
			<td><input type="text" name="mu<?php echo $materia = $materia['id'] ?>" value="<?php echo $usuario ?>" disabled></td>
			<td style="display: flex; justify-content: center; border: none;"><button onclick="location.href = 'modificar.php?op=eliminarmaterias&id=<?php echo $materia ?>'" type="button">X</button></td>
		</tr>
		<?php
			}
		 ?>
		
	</table>
	<div class="boton"><input type="submit" value="Guardar"></div>
	</form>
</div>

<h3>Tareas</h3>
<div class="table-responsive" style="">
	<form action="modificar.php?op=tareas" method="POST">
		<div class="boton"><input type="submit" value="Guardar"></div>
	<table>
		<tr>
			<th>Id</th>
			<th>Nombre</th>
			<th>Descripción</th>
			<th>Dificultad</th>
			<th>Fecha entrega</th>
			<th>Estado</th>
			<th>Eliminar</th>
		</tr>
		
			<?php 
				$st = $conexion -> prepare("SELECT * FROM tarea");
				$st -> execute();
				while ($tarea = $st -> fetch()) {
			?>
			<tr>
				<td><input type="text" value="<?php echo $tarea['id'] ?>" disabled></td>
				<td><input type="text" name="nombre<?php echo $tarea['id'] ?>" value="<?php echo $tarea['nombre'] ?>"></td>
				<td><input type="text" name="descripcion<?php echo $tarea['id'] ?>" value="<?php echo $tarea['descripcion'] ?>"></td>
				<td><select name="dificultad<?php echo $tarea['id'] ?>"><option value="1">Alta</option><option value="2">Media</option><option value="3">Baja</option></select></td>
				<td><input type="date" name="fecha<?php echo $tarea['id'] ?>" value="<?php echo $tarea['fecha_entrega'] ?>"></td>
				<td><input type="text" name="estado<?php echo $tareaid = $tarea['id'] ?>" value="<?php echo $tarea['estado'] ?>"></td>
				<td style="display: flex; justify-content: center; border: none;"><button onclick="location.href = 'modificar.php?op=eliminartarea&id=<?php echo $tareaid ?>'" type="button">X</button></td>
			</tr>
			<?php
				}
			 ?>
	</table>
	<div class="boton"><input type="submit" value="Guardar"></div>
</div>

</form>
</div>
<style>
	body{
		/*overflow-x: hidden;*/
	}
	.table-responsive{
		width: 100%;
		overflow: auto;
	}
	table{
		border: 2px solid #000;
		border-collapse: collapse;
		width: 100%;
	}
	tr,td,th{
		border: 1px solid #000;
		padding: 7px;
		box-sizing: border-box;
		text-align: center;
	}
	.boton{
		width: 100%;
		display: flex;
		justify-content: flex-end;
		margin-top: 10px;
		margin-bottom: 10px;
	}
	.boton input{
		border: none;
		padding: 5px 10px;
		background-color: #2BAA16;
		color: #fff;
		font-weight: bold;
		border-radius: 4px;
		cursor: pointer;
	}
	.boton input:hover{
		background-color: #42D62A;
	}
	td button{
		background-color: red;
		border: none;
		color: #fff;
		border-radius: 100px;
		width: 20px;
		height: 20px;
		display: flex;
		justify-content: center;
		align-items: center;
		cursor: pointer;
		font-weight: bold;
	}
	td input{
		width: 100%;
		text-align: center;
		border: none;
	}
	@media (max-width: 800px) {
		tr,td,th{
			padding: 1px;
			font-size: 15px;
		}
	}
</style>