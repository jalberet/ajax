<?php
include('conexion.php');
$paises = [];
$read = mysqli_query($conexion, "SELECT id, nombre, prefijo, idioma FROM paises");

while ($fila = mysqli_fetch_array($read)) {
	array_push($paises, [
		'id' => $fila['id'],
		'nombre' => $fila['nombre'],
		'prefijo' => $fila['prefijo'],
		'idioma' => $fila['idioma'],
	]);
}
echo json_encode([
	'status'=> true,
	'paises'=> $paises
]);