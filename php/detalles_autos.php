<?php 

include '../conexion/conexion.php';
$id_cliente= $_GET["id_cliente"];
$resultado=mysqli_query($conexion,"
SELECT ma.nombre as 'marca' , mo.nombre 'modelo' ,a.color_auto , a.patente_auto as 'patente_auto'  from auto_modelo mo 
join auto_marca ma 
on ma.auto_marca_id=mo.auto_marca_id
join autos a 
on a.auto_modelo_id = mo.auto_modelo_id where a.id_cliente=$id_cliente")or die(mysqli_error()); 
// $result=mysqli_fetch_array($resultado);

// echo json_encode($result);
?>
<table class="table table-bordered">
  <thead style="background-color: #fff9c4;">
    <tr >
      <th scope="col">Marca</th>
      <th scope="col">Modelo</th>
      <th scope="col">Color</th>
      <th scope="col">Patente</th>
      
    </tr>
  </thead>
  <tbody style="background-color: #fff8e1;">
    <tr>
    <?php

    while ($filas = mysqli_fetch_array($resultado)) {
    	echo '<tr>
				<td style="font-size:14px;">'.$filas["marca"].'</td>
		        <td style="font-size:14px;">'.$filas["modelo"].'</td>
		        <td style="font-size:14px;">'.$filas["color_auto"].'</td>
		        <td style="font-size:14px;">'.$filas["patente_auto"].'</td>';
    }

     ?>
    </tr>
  </tbody>
</table>

