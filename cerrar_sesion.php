<?php 

session_start();
session_destroy();
setcookie("sesion", $usuariofrst."Ç".$pass, time() - 84600000);
header('Location: index.php');


 ?>