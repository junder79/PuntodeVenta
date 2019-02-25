<?php
  session_start();
include '../conexion/conexion.php';

// $id_cliente= $_GET["id_cliente"];
$id_servicio_numero=$_GET["id_servicio_numero"];
$resultado=mysqli_query($conexion, "SELECT id_cliente ,id_servicio,id_servicio_numero, estado_vehiculo , forma_pago from servicios where  estado_vehiculo=0 and id_servicio_numero=$id_servicio_numero");

$result=mysqli_fetch_object($resultado);
					echo json_encode($result);




?>



