<?php
 session_start();
include 'conexion.php';
$id_servicio_numero=$_POST['id_servicio_numero'];
$forma_pago=$_POST['forma_pago'];
$estado_vehiculo=$_POST['estado_vehiculo'];
$numero_llave=$_POST['n_llave_mod'];

if (empty($estado_vehiculo))
{
	$estado_vehiculo=0;
}
if ($forma_pago=="PENDIENTE")
{
	echo '<script language="javascript">';
	echo 'alert("El Servicio no puede quedar PENDIENTE")';
	echo '</script>';
	print "<script>window.location='servicios_activos.php';</script>";	
} 
else {
//Modificae los datos de la tabla servicios 

$consulta=("UPDATE servicios set estado_vehiculo=$estado_vehiculo , forma_pago='$forma_pago' , n_llaves='$numero_llave' where id_servicio_numero=$id_servicio_numero");

if (mysqli_query($conexion , $consulta))
{
    echo '<script language="javascript">';
	echo 'alert("Modificacion realizada")';
	echo '</script>';
	print "<script>window.location='servicios_activos.php';</script>";	

} else 
{
	echo "Error".mysqli_error($conexion);
	// echo '<script language="javascript">';
	// echo 'alert("Hay un Error , no se pudo realizar dicha Modificacion")';
	// echo '</script>';
	// print "<script>window.location='servicios_activos.php';</script>";	
}
}
?>