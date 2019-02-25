<?php 
  session_start();
include '../conexion/conexion.php';
$id_servicio_numero=$_GET["id_servicio_numero"];
$resultado_forma_pago=mysqli_query($conexion, "SELECT forma_pago from servicios where estado_vehiculo=0 and id_servicio_numero=$id_servicio_numero
group by forma_pago")



?>
<?php
//Consulta para obtener el valor total del servicio 

$consulta_valor_total_servicio_cliente=mysqli_query($conexion, "SELECT format(sum(tp.valor),0,'de_DE') as 'valor_total' , s.id_servicio_numero from servicios s
join tipo_servicio tp
on s.id_tipo_s=tp.id_servicio
where  s.id_servicio_numero=$id_servicio_numero")or die(mysqli_error()); 

//Vista para mostrar el total_valor_servicio_cliente
if (mysqli_num_rows($consulta_valor_total_servicio_cliente)>0)
{ 
    while ($filas=mysqli_fetch_array($consulta_valor_total_servicio_cliente))
    {
      
      echo '
    <div class="row">
      <div class="col-lg-12">
        <div class="card" style="background-color: #FFF59D;">
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

<br>
<span style="font-weight: bold;">Forma de Pago : </span>
<select  name="forma_pago" id="forma_pago_test" class="form-control" required style="width: 100%;">
     <!-- <option value="">Selecione...</option> -->
   <?php while($filas=mysqli_fetch_assoc($resultado_forma_pago)){ ?>
 <option  value="<?php echo $filas['forma_pago'];?>"><?php echo $filas['forma_pago'];?></option>

 <?php if ($filas['forma_pago'] == 'PENDIENTE') { 
          echo '<option value="TRANSBANK">TRANSBANK</option>';
          echo '<option value="EFECTIVO">EFECTIVO</option>';
           echo '<option value="TICKET BSF">TICKET BSF</option>';
	echo '<option value="TRANSFERENCIA BANCARIA">TRANSFERENCIA BANCARIA</option>';
      } 
      if ($filas['forma_pago'] == 'TRANSBANK') { 
          echo '<option value="PENDIENTE">PENDIENTE</option>';
          echo '<option value="EFECTIVO">EFECTIVO</option>';
            echo '<option value="TICKET BSF">TICKET BSF</option>';
	echo '<option value="TRANSFERENCIA BANCARIA">TRANSFERENCIA BANCARIA</option>';
      } 
      if ($filas['forma_pago'] == 'EFECTIVO') { 
          echo '<option value="TRANSBANK">TRANSBANK</option>';
          echo '<option value="PENDIENTE">PENDIENTE</option>';
            echo '<option value="TICKET BSF">TICKET BSF</option>';
	echo '<option value="TRANSFERENCIA BANCARIA">TRANSFERENCIA BANCARIA</option>';
      } 
         if ($filas['forma_pago'] == 'TICKET BSF') { 
          echo '<option value="TRANSBANK">TRANSBANK</option>';
          echo '<option value="PENDIENTE">PENDIENTE</option>';
          echo '<option value="EFECTIVO">EFECTIVO</option>';
	echo '<option value="TRANSFERENCIA BANCARIA">TRANSFERENCIA BANCARIA</option>';
      } 
    if ($filas['forma_pago'] == 'TRANSFERENCIA BANCARIA') { 
          echo '<option value="TRANSBANK">TRANSBANK</option>';
          echo '<option value="PENDIENTE">PENDIENTE</option>';
          echo '<option value="EFECTIVO">EFECTIVO</option>';
	 echo '<option value="TICKET BSF">TICKET BSF</option>';
      } 

  } ?>
  
  </select> 

<script type="text/javascript">
  $("#forma_pago_test").change(function(){
  var valor = $(this).val();

    console.log(valor);
if (valor=="PENDIENTE")
{
  document.getElementById("btn_guardar_cambios").disabled = true;

}
else 
{
   document.getElementById("btn_guardar_cambios").disabled = false;
}



});
</script>
