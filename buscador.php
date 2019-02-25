<?php

include 'conexion.php';


$tabla="";
//Consulta que nos devuelte sin rut ingresado 
$query="

	SELECT   c.id_cliente , c.run , upper(c.nombre_completo) as 'nombre_completo' , c.telefono , (select count(a.id_auto) from autos AS a where a.id_cliente = c.id_cliente) as 'Cantidad de Autos'
							from clientes as c
							left join autos a 
							on a.id_cliente=c.id_cliente
							group by  c.id_cliente , c.run , c.nombre_completo , c.telefono ,'Cantidad de Autos'  order by c.id_cliente desc
	
";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['run']))
{
	$q=$conexion->real_escape_string($_POST['run']);
	$query="

	
	SELECT   c.id_cliente , c.run , upper(c.nombre_completo) as 'nombre_completo' , c.telefono , (select count(a.id_auto) from autos AS a where a.id_cliente = c.id_cliente) as 'Cantidad de Autos'
							from clientes as c
							left join autos a 
							on a.id_cliente=c.id_cliente
							group by  c.id_cliente , c.run , c.nombre_completo , c.telefono ,'Cantidad de Autos' HAVING c.nombre_completo like '%$q%'  order by c.id_cliente desc

	  ";
}

$buscarRut=$conexion->query($query);
if ($buscarRut->num_rows > 0)
{
	$tabla.= 
	'<table class="table table-hover table-condensed table-bordered" >
				<tr style="font-weight:bold;">
				<td width="15%">RUN</td>
				<td>Nombre Cliente</td>
				<td>Teléfono</td>
				<td width="5%" >N° de Vehiculos registrados</td>
				<td>Opción</td>
				<td>Opción</td>
				<td>Opción</td>
			</tr>	
		';

	while($fila= $buscarRut->fetch_assoc())
	{
		$tabla.=
		'<tr>
			<td>'.$fila['run'].'</td>
			<td>'.$fila['nombre_completo'].'</td>
			<td>'.$fila['telefono'].'</td>
			<td>'.$fila['Cantidad de Autos'].'</td>
			<td><button type="button" class="btn btn-raised btn-warning" data-toggle="modal" data-target="#exampleModal" id="'.$fila['id_cliente'].'" onclick="abrirDetalles(this); detallesClientes(this);">Detalles</button></td>
			<td><button type="button" class="btn btn-raised btn-success" data-toggle="modal" data-target="#modal_registro_vehiculo" id="'.$fila['id_cliente'].'"  onclick="agregarAuto(this);">Agregar Vehiculo</button></td>
			<td><button type="button" class="btn btn-raised btn-secondary" data-toggle="modal" data-target="#modal_registro_servicio" id="'.$fila['id_cliente'].'"  onclick="agregarServicio(this); agregarServicio_sacar_id(this); agregarAuto(this);">Nuevo Servicio</button></td>			
		 </tr>
		';
	}

	$tabla.='</table>';
} else
	{
		$tabla="
		<h1>No hay Resultados.</h1>
		<img src='https://thumbs.gfycat.com/EasyDeliciousKitten-small.gif'>";
	}


echo $tabla;


?>