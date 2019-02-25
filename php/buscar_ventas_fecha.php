<?php

include('../conexion.php');

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];

//COMPROBAMOS QUE LAS FECHAS EXISTAN
if(isset($desde)==false){
	$desde = $hasta;
}

if(isset($hasta)==false){
	$hasta = $desde;
}

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysqli_query($conexion,"
SELECT s.id_servicio_numero , s.fecha ,c.id_cliente,upper(c.nombre_completo) as 'nombre_completo', upper(a.patente_auto) 'patente_auto' , upper(ma.nombre) as 'nombre_marca',upper(am.nombre) as 'nombre_modelo' ,upper(tp.nombre) as 'nombre_servicio',s.forma_pago , format(tp.valor,0,'de_DE')  as 'valor'  from servicios s
join tipo_servicio tp 
on tp.id_servicio=s.id_tipo_s
join clientes c 
on c.id_cliente=s.id_cliente
join autos a 
on a.id_auto=s.id_auto
join auto_modelo am 
on am.auto_modelo_id=a.auto_modelo_id
join auto_marca ma 
on ma.auto_marca_id =am.auto_marca_id
group by s.id_servicio_numero , s.fecha , c.id_cliente,c.nombre_completo,a.patente_auto,ma.nombre,am.nombre, tp.nombre , s.forma_pago,tp.valor
having s.fecha BETWEEN '$desde' AND '$hasta' and s.forma_pago!='PENDIENTE' ;


	");



//Consulta para obtener el total de ventas en EFECTIVO
$x=mysqli_query($conexion , "SELECT  format(sum(ts.valor),0,'de_DE') as 'sumas' from servicios s
join tipo_servicio ts 
on ts.id_servicio=s.id_tipo_s
where s.forma_pago='EFECTIVO' and  s.fecha BETWEEN '$desde' and '$hasta' ");


//Creamos la Vista para mostrar el total de ventas en EFECTIVO
if (mysqli_num_rows($x)>0)
{
	while($filas_total_ventas_efectivo=mysqli_fetch_array($x))
	{
		
		echo '
		<div class="row">
		<div class="col-lg-4 mt-3 mb-2">
		<div class="card" style="background-color:#880e4f; color:white;">
		  <div class="card-body">
		   <span  class="mt-2" style="font-weight:normal; font-size:20px;">Total Efectivo : $'.$filas_total_ventas_efectivo['sumas'].'</span>
		  </div>
		</div>
		</div>
		';

	}
} else 
{
	echo '<h1>ERROR</h1>'; 
}



//Consulta para obtener el total de ventas en TRANSBANK
$z=mysqli_query($conexion , "SELECT  format(sum(ts.valor),0,'de_DE') as 'sumas' from servicios s
join tipo_servicio ts 
on ts.id_servicio=s.id_tipo_s
where s.forma_pago='TRANSBANK' and  s.fecha BETWEEN '$desde' and '$hasta' ");


//Creamos la Vista para mostrar el total de ventas en TRANSBANK
if (mysqli_num_rows($x)>0)
{
	while($filas_total_ventas_transbank=mysqli_fetch_array($z))
	{
		

		echo '
		<div class="col-lg-4 mt-3 mb-2">
		<div class="card" style="background-color:#4a148c; color:white;">
		  <div class="card-body">
		 <span class="mt-2" style="font-weight:normal; font-size:20px;">Total Transbank : $'.$filas_total_ventas_transbank['sumas'].'</span>
		  </div>
		</div>
		</div>
		';

	}
} else 
{
	echo '<h1>ERROR</h1>'; 
}



//Consulta para obtener el valor todas las ventas realizadas

$consulta_obtener_total_ventas=mysqli_query($conexion , "SELECT  format(sum(ts.valor),0,'de_DE') as 'suma' from servicios s
join tipo_servicio ts 
on ts.id_servicio=s.id_tipo_s
where s.fecha BETWEEN '$desde' and '$hasta' and s.forma_pago!='PENDIENTE'
");





//Creamos la Vista para mostrar el total de ventas 
if (mysqli_num_rows($consulta_obtener_total_ventas)>0)
{
	while($filas_total_ventas=mysqli_fetch_array($consulta_obtener_total_ventas))
	{
		echo '

		<div class="col-lg-4 mt-3 mb-2">

		<div class="card" style="background-color:#1a237e; color:white;">
		  <div class="card-body">
		    <span class="mt-2" style="font-weight:normal; font-size:20px;">Total Ventas : $'.$filas_total_ventas['suma'].'</span>
		  </div>
		</div>
		</div>
		</div>
		';
		// echo ''; 
	}
} else 
{
	echo '<h1>Seleciona una fecha</h1>'; 
}



//Creamos la tabla
echo '<div style="height:400px;  width:1200px; overflow: scroll;">';
echo '<table class="table  table-striped table-condensed table-hover" >
        	    <tr>
      <th width="5%" style="font-size:12px;" scope="col">NÚMERO DEL SERVICIO</th>
      <th width="10%" style="font-size:12px;" scope="col">FECHA</th>
      <th width="5%" style="font-size:12px;" scope="col">ID CLIENTE</th>
      <th width="15%" style="font-size:12px;" scope="col">NOMBRE CLIENTE</th>
      <th width="5%" style="font-size:12px;" scope="col">MARCA</th>
      <th width="15%" style="font-size:12px;" scope="col">MODELO</th>
      <th width="15%"  style="font-size:12px;" scope="col">PATENTE</th>
      <th width="10%"  style="font-size:12px;" scope="col">NOMBRE SERVICIO</th>
      <th width="5%" style="font-size:12px;" scope="col">FORMA PAGO</th>
      <th width="5%" style="font-size:12px;" scope="col">VALOR SERVICIO</th>
    </tr>';
if(mysqli_num_rows($registro)>0){
	while($filas = mysqli_fetch_array($registro)){
		echo '<tr>
				<td>'.$filas["id_servicio_numero"].'</td>
		        <td>'.fechaNormal($filas['fecha']).'</td>
		        <td>'.$filas["id_cliente"].'</td>
		        <td>'.$filas["nombre_completo"].'</td>
		        <td>'.$filas["nombre_marca"].'</td>
		        <td>'.$filas["nombre_modelo"].'</td>
		        <td>'.$filas["patente_auto"].'</td>
		        <td>'.$filas["nombre_servicio"].'</td>
		        <td>'.$filas["forma_pago"].'</td>
		        <td>$ '.$filas["valor"].'</td>
		        
				</tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
echo '</div>';



?>