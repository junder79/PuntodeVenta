<?php 
session_start();
	include '../conexion.php';
	$sql="SELECT  c.run , c.nombre_completo , c.telefono , (select count(a.id_auto) from autos AS a where a.id_cliente = c.id_cliente) as 'Cantidad de Autos'
		from clientes as c
		left join autos a 
		on a.id_cliente=c.id_cliente
		group by  c.id_cliente , c.run , c.nombre_completo , c.telefono ,'Cantidad de Autos' order by c.nombre_completo asc;
		";
				$result=mysqli_query($conexion,$sql);

 ?>
<br><br>
<div class="row mb-2">
	<div class="col-sm-8"></div>
	<div class="col-sm-4">
		<label>Buscador : </label>
		<select id="buscadorvivo" class="form-control input-sm">
			<option value="0">Busqueda por RUT</option>
			<?php
				while($ver=mysqli_fetch_row($result)): 
			 ?>
				<option value="<?php echo $ver[0]; ?>">
					<?php echo $ver[0] ?>
				</option>

			<?php endwhile; ?>

		</select>
	</div>
</div>


	<script type="text/javascript">
		$(document).ready(function(){
			$('#buscadorvivo').select2();

			$('#buscadorvivo').change(function(){
				$.ajax({
					type:"post",
					data:'valor=' + $('#buscadorvivo').val(),
					url:'php/crearsession.php',
					success:function(r){
						$('#tabla').load('componentes/tabla.php');
					}
				});
			});
		});
	</script>