<?php

$conexion = new PDO('mysql:host=db;dbname=mis_tareas', 'root', 'password');
$conexion->exec('set names utf8');
