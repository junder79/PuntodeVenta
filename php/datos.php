<?php

include '../conexion/conexion.php';

$id_cliente= $_GET["id_cliente"];
$resultado=mysqli_query($conexion,"SELECT c.run , c.nombre_completo , a.color_auto , a.patente_auto , (select count(a.id_auto) from autos AS a where a.id_cliente = c.id_cliente) as 'Cantidad de Autos'  from autos a
									join clientes c 
									on c.id_cliente=a.id_cliente
									where c.id_cliente=$id_cliente")or die(mysqli_error()); 
					$result=mysqli_fetch_object($resultado);
					echo json_encode($result);

?>