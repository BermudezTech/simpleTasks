function show_menu(){
	document.getElementById('boton_desplegable').style.display = 'none';
	document.getElementById('boton_desplegable1').style.display = 'block';
	document.getElementById('menudesplegable').style.display = 'block';
	/*document.getElementById('flecha').innerHTML = "🔺";*/
}

function hide_menu(){
	document.getElementById('boton_desplegable').style.display = 'block';
	document.getElementById('boton_desplegable1').style.display = 'none';
	document.getElementById('menudesplegable').style.display = 'none';
	/*document.getElementById('flecha').innerHTML = "🔻";*/
}

function cerrar_sesion(){
	location.href = "cerrar_sesion.php";
}

function nueva_tarea(){
	location.href = "fnueva_tarea.php";
}

function nueva_materia(){
	location.href = "fnueva_materia.php";
}

function nuevo_usuario(){
	location.href = "fnuevo_usuario.php";
}

function changepass(){
	location.href = "fchangepass.php";
}

function erasethis(id){
	$.ajax({
		url: 'eliminartarea.php',
		type: "POST",
		data: { id: id},
		success: function(response){
			location.reload(true);
		}
	});
}

function horario(){
	location.href = "horario.php";
}