<?php
  session_start();
include '../conexion/conexion.php';

$consulta_servicios_activos=("

SELECT  s.id_servicio_numero , s.forma_pago,c.nombre_completo ,c.telefono,ma.nombre as 'marca', am.nombre as 'modelo' ,a.patente_auto,s.n_llaves,s.hora_retiro ,format(sum(ts.valor),0,'de_DE') as 'valor_total' from servicios s
join tipo_servicio ts
on ts.id_servicio=s.id_tipo_s
join clientes c 
on c.id_cliente = s.id_cliente
join autos a 
on a.id_auto = s.id_auto 
join auto_modelo am 
on am.auto_modelo_id =a.auto_modelo_id 
join auto_marca ma 
on ma.auto_marca_id = am.auto_marca_id
where s.estado_vehiculo=0
GROUP by s.id_servicio_numero
order by s.hora_retiro;
  ");

//Resultado de la consulta
$resultado_consulta=mysqli_query($conexion, $consulta_servicios_activos);



?>

<div class="row">
  <!-- <div class="col-sm-12" style="height:480px; overflow: scroll;"> -->
  <div class="col-sm-12">
    <table class="table table-hover table-condensed table-bordered" >
    <caption>
    </caption>
      <tr>
        <td style="font-weight: bold;">N° Servicio</td>
        <td style="font-weight: bold;">Forma de Pago</td>
        <td style="font-weight: bold;">Nombre Completo</td>
        <td style="font-weight: bold;">Teléfono</td>
        <td style="font-weight: bold;">Marca</td>
        <td style="font-weight: bold;">Modelo</td>
        <td style="font-weight: bold;">Patente</td>
        <td style="font-weight: bold;">N° Llave</td>
        <td style="font-weight: bold;">Hora de Salida</td>
        <td style="font-weight: bold;">Valor Total</td>
        <td style="font-weight: bold;">Opción</td>
        <td style="font-weight: bold;">Opción</td>
      </tr>
     <tr>
    <?php  
 while($row = mysqli_fetch_array($resultado_consulta))
{
echo "<tr>";
echo "<td style='font-weight: bold;'>" . $row['id_servicio_numero'] . "</td>";
echo "<td>" . $row['forma_pago'] . "</td>";
echo "<td>" . $row['nombre_completo'] . "</td>";
echo "<td style='font-weight:bold;' >" . $row['telefono'] . "</td>";
echo "<td>" . $row['marca'] . "</td>";
echo "<td>" . $row['modelo'] . "</td>";
echo "<td style='font-weight:bold;'>" . $row['patente_auto'] . "</td>";
echo "<td style='font-weight:bold;'>" . $row['n_llaves'] . "</td>";
echo "<td style='font-weight:bold;'>" . $row['hora_retiro'] . "</td>";
echo "<td style='font-weight:bold; font-size:20px; color:red;  -webkit-text-stroke-width: 0.4px;
-webkit-text-stroke-color:black; '>$" . $row['valor_total'] . "</td>";

?>
<td><button type='button'   class='btn btn-raised btn-warning' data-toggle='modal' data-target='#exampleModalCenter' id="<?php echo $row['id_servicio_numero'];?>"  onclick='editarServicio(this); editarServicio_traer_forma_pago(this); editarServicio_traer_llave(this);' >Cerrar</button></td>
<td><button type='button' class='btn btn-raised btn-info' data-toggle='modal' data-target='#modal_vermas_servicio' id="<?php echo $row['id_servicio_numero'];?>"  onclick='vermasServicio(this);'>Detalles</button></td>

<?php
echo "</tr>";
}
echo "</table>";
?>
</div>