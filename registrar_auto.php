<?php

//conexion a la bd
include 'conexion.php';


// $nombre_auto=$_POST['marca_auto'];
$id_cliente=$_POST['id_cliente'];
// $modelo_auto=$_POST['modelo_auto'];
$patente_auto=$_POST['patente_auto'];
$color_auto=$_POST['color_auto'];

$id_modelo_auto=$_POST['modelo_auto_final'];

$sql_2 ="INSERT INTO autos  (id_auto ,id_cliente,auto_modelo_id ,patente_auto , color_auto) values (null , '$id_cliente'  ,'$id_modelo_auto','$patente_auto' , '$color_auto' )";


$conexion_consulta2 =mysqli_query($conexion , $sql_2);

if ($conexion_consulta2) 
{
   echo '<script language="javascript">';
	echo 'alert("Registro exitoso")';
	echo '</script>';
	print "<script>window.location='realizar_venta.php';</script>";	
}
else 
{
    echo "---------Error------------ al insertar"; 
}
?>