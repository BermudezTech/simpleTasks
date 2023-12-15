<link rel="icon" href="unnamed.png" type="image/png">
<?php

include 'conexion.php';
if (!isset($_SESSION['id'])) {
    header('location: index.php');
}
$id = $_SESSION['id'];
$st = $conexion -> prepare("SELECT * FROM usuarios WHERE id='$id'");
$st -> execute();
$usuarioinfo = $st -> fetch();
$opciones = $usuarioinfo['opciones'];
$opcionespart = explode('-', $opciones);
$_SESSION['materias'] = $opcionespart[0];
$_SESSION['tareas'] = $opcionespart[1];


?>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<div class="header">
	<!--<div class="left" onclick="location.href='index.php';" style="cursor: pointer;">ALGORITMO DE ORGANIZACION DE TAREAS</div>-->
	<div class="left" style="display: flex;justify-content: center;align-items: center;"><img src="unnamed.png"
			width="40px" height="40px" style="margin-right: 20px;"><a href="inicio.php">Inicio</a></div>
	<div class="right">
		<p><?php echo $usuarioinfo['nombre']; ?>
		</p>
		<div class="separador">
			<p>|</p>
		</div>
		<div id="boton_desplegable" onclick="show_menu()">
			<p id="flecha">🔻</p>
		</div>
		<div id="boton_desplegable1" onclick="hide_menu()">
			<p id="flecha">🔺</p>
		</div>
		<div id="menudesplegable">
			<div class="botonmenudesplegable" onclick="changepass()">Cambiar contraseña</div>
			<div class="botonmenudesplegable" onclick="cerrar_sesion()">Cerrar sesion</div>
		</div>
	</div>
</div>
<script src="acciones.js"></script>