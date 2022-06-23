<?php
include('conexion.php');

$id =  $_POST['id'];
$read = mysqli_query($conexion, "DELETE FROM paises WHERE id = $id");

echo json_encode([
	'status'=> true,
]);