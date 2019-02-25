<?php

include '../conexion/conexion.php';

$id_cliente= $_GET["id_cliente"];
$resultado=mysqli_query($conexion,"SELECT * FROM  clientes where id_cliente=$id_cliente")or die(mysqli_error()); 
$result=mysqli_fetch_object($resultado);
echo json_encode($result);

?>