<?php

session_start();
$var=$_SESSION['admin'];
if ($var==null || $var = '')
{
  echo '<script language="javascript">';
  echo 'alert("Inicie Sesión")';
  echo '</script>';
  print "<script>window.location='index.php';</script>";    
  die();
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>ventas Realizadas</title>
		<script type="text/javascript" src="js/jquery.js"></script>	
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  <!--SELECT 2 -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  <!--FONT AWESOME-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

</head>
<body>
<?php 
include 'navbar.php';
// include 'conexion.php';
// $query=("

// select s.id_servicio, s.id_tipo_s ,ts.nombre , ts.valor ,s.fecha, c.nombre_completo , a.id_cliente from servicios s
// join tipo_servicio ts 
// on s.id_tipo_s=ts.id_servicio
// join clientes c 
// on s.id_cliente=c.id_cliente
// join autos a 
// on a.id_cliente=c.id_cliente
// GROUP by s.id_tipo_s ,ts.nombre , ts.valor , c.nombre_completo , a.id_cliente , s.id_servicio


// 	");
// $consulta_realizada=mysqli_query($conexion , $query);

?>

<div class="container">
	<h1 style="font-weight:normal;" class="animated fadeIn">Buscar por Fecha</h1>

<form method="POST" action="php/excel.php">
<div class="row">
	<div class="col-lg-4">
<label>Desde :</label> <input  required="" type="date" name="f-desde" id="f-desde"/>
</div>
<div class="col-lg-4">
<label>Hasta :</label> <input required=""  type="date" name="f-hasta" id="f-hasta"/>
</div> 
<div class="col-lg-4">
	<input type="submit" name="exportar" id="btn_fecha_excel" disabled="" class="btn btn-primary" style="background-color: #004d40;"  value="Exportar a EXCEL">
</div>
	
</div>

</form>

<script type="text/javascript">


	$('#f-hasta').on('change', function() {
 	var hasta = document.getElementById('f-hasta').value;
 	console.log(hasta);
 	if(!hasta=='')
 	{
 		 document.getElementById("btn_fecha_excel").disabled = false;
 	}
 		else 
 	{
 		 document.getElementById("btn_fecha_excel").disabled = false;
 	}	
});
</script>


<div class="registros" id="agrega-registros" ></div>
<!-- <div class="row">
	<p  style="font-size: 35px; float: right;">Total Ventas :$  </p>
</div> -->

</div>

<!--     <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody> -->
  <script type="text/javascript">
  	
$(document).ready(function(){
		$('#f-desde').on('change', function(){
		var desde = $('#f-desde').val();
		var hasta = $('#f-hasta').val();
		var url = 'php/buscar_ventas_fecha.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'desde='+desde+'&hasta='+hasta,
		success: function(datos){
			$('#agrega-registros').html(datos);
		}
	});
	return false;
	});
	
	$('#f-hasta').on('change', function(){
		var desde = $('#f-desde').val();
		var hasta = $('#f-hasta').val();
		var url = 'php/buscar_ventas_fecha.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'desde='+desde+'&hasta='+hasta,
		success: function(datos){
			$('#agrega-registros').html(datos);
		}
	});
	return false;
	});
});
  </script>
</div>



</body>
</html>


<!--Nicolas Cisterna-->