<?php
$host = 'localhost'; //PUEDES PONER LA IP
$user = 'root';
$pwd = ''; //INGRESA TU CONTRASEÑA
$db_name = 'tutorial';

$conexion = mysqli_connect($host, $user, $pwd);
mysqli_select_db($conexion,$db_name);