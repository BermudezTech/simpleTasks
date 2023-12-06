<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Notificaciones web</title>
	<script src="js/push.min.js"></script>
</head>
<body>
<script>
	Push.create("Tarea 1",{
		body: "Materia: Matemáticas. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error repellat ducimus amet deleniti labore rem suscipit nemo, hic reiciendis possimus, asperiores dolor, mollitia aperiam in eligendi dolorum magnam molestias, ipsam.",
		icon: "img/logo.png",
		timeout: 4000,
		onClick: function () {
			window.location="index.php";
			this.close();
		}
	});
</script>
</body>
</html>