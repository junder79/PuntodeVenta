<?php
include 'conexion.php';

// $consulta_id=("SELECT id_servicio
// FROM servicios
// ORDER by id_servicio desc
// limit 1");

// $resultado_consulta=mysqli_query($conexion , $consulta_id);

// $ultimo_id=$resultado_consulta['id_servicio'];

$id_servicio_registrar=$_POST['id_servicio_registrar'];

$id_auto=$_POST['id_auto'];
$tipo_servicio=$_POST['id_tipo_servicio'];
$id_cliente=$_POST['id_cliente_servicio'];
$fecha_hoy=date('Y-m-d');
$forma_pago=$_POST['forma_pago'];
$hora_retiro=$_POST['hora_retiro'];
$numero_de_llaves=$_POST['n_llaves'];
// $estado_inicial_vehiculo=0;
// Estado del Vehiculo (Automaticamente se guardará en 0 , ya que significa que se ingreso a la sucursal) 
$hora_ingreso=date("Y-m-d H:i:s");
  foreach($tipo_servicio as $category) {
     	$query=("INSERT INTO `servicios` (`id_servicio_numero`, `id_tipo_s`,`id_auto`,`fecha`, `id_cliente`,`estado_vehiculo`,`forma_pago`,`hora_ingreso`,`hora_retiro`, `n_llaves`) VALUES ('$id_servicio_registrar'
     		, '$category','$id_auto','$fecha_hoy', '$id_cliente' ,0,'$forma_pago' ,'$hora_ingreso' ,'$hora_retiro', '$numero_de_llaves' )");
$conexion_consulta =mysqli_query($conexion , $query) or die (mysqli_error($conexion)); 
    }



// verificar el registro de los datos 
if ($conexion_consulta) 
{
    echo '<script language="javascript">';
	echo 'alert("Servicio Agregado Exitosamente")';
	echo '</script>';
	print "<script>window.location='realizar_venta.php';</script>";	
}
else 
{
    echo "---------Error------------ al insertar".mysqli_error();
}

?>