
<?php 
	session_start();
	include '../conexion.php';

?>
<div class="row">
	<div class="col-sm-12" style="height:450px; overflow: scroll;">
		<table class="table table-hover table-condensed table-bordered" >
		<caption>
		</caption>
			<tr>
				<td>RUN</td>
				<td>Nombre Cliente</td>
				<td>Teléfono</td>
				<td>N° de Vehiculos registrados</td>
				<td>Opción</td>
				<td>Opción</td>
				<td>Opción</td>
			</tr>

			<?php 

				if(isset($_SESSION['consulta'])){
					if($_SESSION['consulta'] > 0){
						$idp=$_SESSION['consulta'];
						$sql="SELECT   c.id_cliente , c.run , upper(c.nombre_completo) as 'nombre_completo' , c.telefono , (select count(a.id_auto) from autos AS a where a.id_cliente = c.id_cliente) as 'Cantidad de Autos'
							from clientes as c
							left join autos a 
							on a.id_cliente=c.id_cliente
							group by  c.id_cliente , c.run , c.nombre_completo , c.telefono ,'Cantidad de Autos' HAVING c.run='$idp'  order by c.id_cliente desc  ";
					}else{
						$sql="SELECT   c.id_cliente , c.run , upper(c.nombre_completo) as 'nombre_completo' , c.telefono , (select count(a.id_auto) from autos AS a where a.id_cliente = c.id_cliente) as 'Cantidad de Autos'
							from clientes as c
							left join autos a 
							on a.id_cliente=c.id_cliente
							group by  c.id_cliente , c.run , c.nombre_completo , c.telefono ,'Cantidad de Autos'  order by c.id_cliente desc";
					}
				}else{
					$sql="SELECT   c.id_cliente , c.run , upper(c.nombre_completo) as 'nombre_completo' , c.telefono , (select count(a.id_auto) from autos AS a where a.id_cliente = c.id_cliente) as 'Cantidad de Autos'
						from clientes as c
						left join autos a 
						on a.id_cliente=c.id_cliente
						group by  c.id_cliente , c.run , c.nombre_completo , c.telefono ,'Cantidad de Autos'  order by c.id_cliente desc";
				}

				$result=mysqli_query($conexion,$sql);
				while($ver=mysqli_fetch_array($result)){ 

					$datos=$ver["run"]."||".
						   $ver["nombre_completo"]."||".
						   $ver["telefono"]."||".
						   $ver["Cantidad de Autos"]."||".
						   $ver[4];
			 ?>

			<tr>
				<td ><?php echo $ver["run"] ?></td>
				<td ><?php echo $ver["nombre_completo"] ?></td>
				<td ><?php echo $ver["telefono"] ?></td>
				<?php if ( $ver["Cantidad de Autos"] == 0) {
					?>
					<td onclick="alertaRegistrar();">
					<?php echo $ver["Cantidad de Autos"] ?>
					</td>
					<?php }  else { ?> 
							<td ">
					<?php echo $ver["Cantidad de Autos"] ?>
					</td>
					<?php } ?>	
					<?php if ($ver["Cantidad de Autos"]==0) {
					?>
					<td></td>
					<?php } else { ?>
				<td><button type="button" class="btn btn-raised btn-warning" data-toggle="modal" data-target="#exampleModal" id="<?php echo $ver['id_cliente'] ?>" onclick="abrirDetalles(this); detallesClientes(this);">Detalles</button></td>
				<?php } ?> 

				

				<td><button type="button" class="btn btn-raised btn-success" data-toggle="modal" data-target="#modal_registro_vehiculo" id="<?php echo $ver['id_cliente'] ?>" onclick="agregarAuto(this);">Agregar Vehiculo</button></td>
				<td><button type="button" class="btn btn-raised btn-secondary" data-toggle="modal" data-target="#modal_registro_servicio"  id="<?php echo $ver['id_cliente'] ?>"onclick="agregarServicio(this); agregarServicio_sacar_id(this); agregarAuto(this);">Nuevo Servicio</button></td>
			</tr>
			<?php 
		}
			 ?>
		</table>
	</div>
</div>




<!--Nicolas Cisterna-->