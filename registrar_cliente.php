<?php

//Iniciar la sesion

session_start();

//conexion a la bd
include 'conexion.php';

//Obtener los valores del formulario 

$run = $_POST['run'];
$nombre_completo=$_POST['nombre_completo'];
$telefono=$_POST['telefono'];



//Insertar datos en la base de datos

$sql="INSERT INTO clientes  (id_cliente ,run ,nombre_completo,telefono) values (null , '$run' , '$nombre_completo' , '$telefono')";

$conexion_consulta =mysqli_query($conexion , $sql);

// verificar el registro de los datos 
if ($conexion_consulta) 
{
    echo '<script language="javascript">';
	echo 'alert("Registro exitoso , porfavor ahora registre un vehiculo")';
	echo '</script>';
	print "<script>window.location='realizar_venta.php';</script>";	
}
else 
{
    echo "---------Error------------ al insertar"; 
}

?>