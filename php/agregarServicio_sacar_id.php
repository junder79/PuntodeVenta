<?php 

include '../conexion/conexion.php';
$id_cliente= $_GET["id_cliente"];
$resultado=mysqli_query($conexion,"

SELECT a.id_auto , a.id_cliente , a.patente_auto , c.nombre_completo FROM  autos a 
join clientes c 
on c.id_cliente = a.id_cliente

 where a.id_cliente=$id_cliente")or die(mysqli_error()); 
$result=mysqli_fetch_array($resultado);

echo json_encode($result);
?>

