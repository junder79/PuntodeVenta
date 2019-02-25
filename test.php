
<?php 
include 'conexion.php';
$query = "SELECT auto_marca_id , nombre from auto_marca order by nombre asc";
$resultado =mysqli_query($conexion ,$query);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
				$("#cbx_marca").change(function () {

					// $('#cbx_localidad').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					
					$("#cbx_marca option:selected").each(function () {
						auto_marca_id = $(this).val();
						$.post("getModelo.php", { auto_marca_id: auto_marca_id }, function(data){
							$("#cbx_modelo").html(data);
						});            
					});
				})
			});
</script>

</head>
<body>

       <form method="POST">
       	   <div>
  			<p>Seleccione una marca de vehiculo</p>
            <select id="cbx_marca" name="cbx_marca">
              <option value="0">Selecione una marca</option>
              <?php while($fila=mysqli_fetch_assoc($resultado)){ ?>
                <option value="<?php echo $fila['auto_marca_id'];?>"><?php echo $fila['nombre'];?></option>
              <?php } ?>
            </select>
          </div>

		<div>Selecciona modelo :<select name="cbx_modelo" id="cbx_modelo"></select></div>
       </form>




</body>
</html>