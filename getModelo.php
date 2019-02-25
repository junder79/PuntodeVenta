

<?php
	
include 'conexion.php';
$id_marca=$_POST['auto_marca_id'];
$query="SELECT auto_modelo_id , nombre  FROM auto_modelo where auto_marca_id='$id_marca' order by nombre asc";

$resultado=mysqli_query($conexion , $query);
	
	$html= "<option value=''>Selecciona un Modelo</option>";
	
	while($fila=mysqli_fetch_assoc($resultado))
	{
		$html.= "<option value='".$fila['auto_modelo_id']."'>".$fila['nombre']."</option>";
	}
	
	echo $html;
?>		




<!-- $resultado=mysqli_query($conexion , $query);
while ($fila=mysqli_fetch_assoc($resultado)){
	$html="<option value='".$fila['auto_modelo_id']."'>".$fila['nombre']."</option>";
} -->