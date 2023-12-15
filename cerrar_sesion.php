<?php


session_start();
session_destroy();
setcookie("sesion", "", time() - 84600000);
header('Location: index.php');
