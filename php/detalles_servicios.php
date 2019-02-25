<?php 

include '../conexion/conexion.php';
$id_servicio_numero= $_GET["id_servicio_numero"];
$resultado=mysqli_query($conexion,"
SELECT tp.nombre, format(tp.valor,0,'de_DE') as 'valor' , s.id_servicio_numero from servicios s
join tipo_servicio tp
on s.id_tipo_s=tp.id_servicio
where  s.id_servicio_numero=$id_servicio_numero")or die(mysqli_error()); 
// $result=mysqli_fetch_array($resultado);

// echo json_encode($result);
?>
<table  class="table table-bordered">
  <thead style="background-color: #bbdefb;">
    <tr>
      <th scope="col">Nombre Servicio</th>
      <th scope="col">Valor</th>
    </tr>
  </thead>
  <tbody style="background-color: #e3f2fd;">
    <tr>
    <?php

    while ($filas = mysqli_fetch_array($resultado)) {
    	echo '<tr>
				<td style="font-size:14px;">'.$filas["nombre"].'</td>
		        <td style="font-size:14px;font-weight:bold; "> $'.$filas["valor"].'</td>';
    }

     ?>
    </tr>
  </tbody>
</table>

<!--CONSULTA PARA OBTENER EL VALOR TOTAL DE LOS SERVICIOS AGENDADOS POR LOS CLIENTES-->
<?php


$consulta_total_servicio_cliente=mysqli_query($conexion, "SELECT  format(sum(tp.valor),0,'de_DE') as 'valor_total' , s.id_servicio_numero from servicios s
join tipo_servicio tp
on s.id_tipo_s=tp.id_servicio
where  s.id_servicio_numero=$id_servicio_numero")or die(mysqli_error()); 

//Vista para mostrar el total_valor_servicio_cliente
if (mysqli_num_rows($consulta_total_servicio_cliente)>0)
{ 
    while ($filas=mysqli_fetch_array($consulta_total_servicio_cliente))
    {
      
      echo '
    <div class="row">
      <div class="col-lg-12">
        <div class="card" style="background-color: #e3f2fd;">
          <div class="card-body">
            <span style="font-weight:bold; ">Valor Total : $'.$filas['valor_total'].'</span>
          </div>
        </div>
      </div>
    </div>
      ';

    }

} else 
{
  echo '<h1>ERROR</h1>'; 
}

?>