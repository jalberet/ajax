<?php
include('conexion.php');

$nombre =  $_POST['nombre'];
$prefijo =  $_POST['prefijo'];
$idioma =  $_POST['idioma'];

$registro = mysqli_query($conexion, 
"INSERT INTO paises (nombre, prefijo, idioma)
VALUES ('$nombre', '$prefijo', '$idioma')");

return true;
