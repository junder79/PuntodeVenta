<?php 

include '../conexion/conexion.php';
$output='';
$desde = $_POST['f-desde'];
$hasta = $_POST['f-hasta'];
if(isset($_POST['exportar']) && isset($desde) && isset($hasta))
{
	$sql="


	SELECT s.id_servicio_numero , s.fecha ,c.id_cliente,upper(c.nombre_completo) as 'nombre_completo', upper(a.patente_auto) 'patente_auto' ,upper(tp.nombre) as 'nombre_servicio',s.forma_pago , tp.valor, s.hora_ingreso  from servicios s
join tipo_servicio tp 
on tp.id_servicio=s.id_tipo_s
join clientes c 
on c.id_cliente=s.id_cliente
join autos a 
on a.id_auto=s.id_auto
group by s.id_servicio_numero , s.fecha , c.id_cliente,c.nombre_completo,a.patente_auto, tp.nombre , s.forma_pago,tp.valor
having s.fecha BETWEEN '$desde' AND '$hasta'

	";
	$result=mysqli_query($conexion, $sql);
	if (mysqli_num_rows($result)>0)
	{
		$output.='

		<table class="table" bordered="1">

			<tr>
	  <th scope="col">NÚMERO DEL SERVICIO</th>
      <th scope="col">FECHA</th>
      <th scope="col">ID CLIENTE</th>
      <th scope="col">NOMBRE CLIENTE</th>
      <th scope="col">PATENTE</th>
      <th scope="col">NOMBRE SERVICIO</th>
      <th scope="col">FORMA PAGO</th>
      <th scope="col">VALOR SERVICIO</th>
      <th scope="col">HORA REGISTRO SERVICIO</th>
			</tr>
		';
		while($row=mysqli_fetch_array($result))
		{
			$output.='

				<tr>
				<td>'.$row["id_servicio_numero"].'</td>
		        <td>'.fechaNormal($row['fecha']).'</td>
		        <td>'.$row["id_cliente"].'</td>
		        <td>'.$row["nombre_completo"].'</td>
		        <td>'.$row["patente_auto"].'</td>
		        <td>'.$row["nombre_servicio"].'</td>
		        <td>'.$row["forma_pago"].'</td>
		        <td>$ '.$row["valor"].'</td>
		        <td>'.$row["hora_ingreso"].'</td>
				</tr>

			';
		}

		$output.='</table>';
		header("Content-Type: application/xls");
		header("Content-Disposition: attachment; filename=download.xls");
		echo $output;
	}
}
?>