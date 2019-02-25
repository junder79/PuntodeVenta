<?php 

include 'conexion.php';
$id_cliente=$_POST['id_cliente'];
$consulta=("SELECT patente_auto WHERE id_cliente = $id_cliente");
$resultado_consulta=mysqli_query($conexion , $consulta);

?>