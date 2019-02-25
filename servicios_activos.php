<?php 
  session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Servicios Activos</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script type="text/javascript" src="js/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript">
	$(document).ready(function(){
	$('#tabla_info').load('php/tabla_servicios_activos.php');
	});
	</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>	
<!--Jquery Table UI -->
<!-- <script type="text/javascript" src="js/jquery.tabledit.js"></script>	 -->
</head>
<body>
<?php include 'navbar.php';  ?>
<div class="container">

<h1>Servicios Activos</h1>	
<div id="tabla_info"></div>
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button> -->
<!-- <button onclick=" alertaModificar();" id="hola">Hola</button> -->
<!-- Modal EDITAR SERVICIO -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="modal_editar_servicio" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Cerrar Servicio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
 	<form  method="POST" action="modificar_servicio_activo.php">
      	<input type="hidden" readonly="readonly" class="form-control" id="id_servicio_numero" name="id_servicio_numero">
      	<br>
     <!--VALOR TOTAL SERVICIO Y FORMA DE PAGO-->
        <div class="mt-2" id="forma_pago"></div> <br>
        <span style="font-weight: bold;">N° de LLave</span>

        <div class="row">
          <div class="col-lg-4">
            <div id="llave_info"></div>
          </div>
        </div>
        <br>
        <span style="font-weight: bold;">Estado del Vehiculo : </span>
        <!-- <input type="radio" value="0" name="estado_vehiculo">DENTRO DE LA SUCURSAL -->
        <input class="mt-2" type="checkbox"  value="1" name="estado_vehiculo"> RETIRAR
        <br>
 <button type="submit"  id="btn_guardar_cambios" class="mt-4 btn btn-primary" data-toggle="tooltip" data-placement="top" title="El Servicio no puede quedar en PENDIENTE">Guardar Cambios</button>
 	</form>
      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>


<!-- Modal Ver Más Servicio -->
<div class="modal fade" id="modal_vermas_servicio" tabindex="-1" role="dialog" aria-labelledby="modal_vermas_servicio" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Detalles</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span style="font-weight: bold;" >Servicios Actuales : </span>
        <br>
        <br>
        <div  id="detalles_servicios_activos"></div>
      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>

</div>
<script type="text/javascript">
  
    function editarServicio(button){
    var id_servicio_numero=button.id;
    $.ajax({
      url:"php/datos_tabla_servicios_activos.php",
      method:"GET", 
      data:{"id_servicio_numero":id_servicio_numero},
      success:function(response){
        //datos de vienen de la base de datos
        var datos =JSON.parse(response);
        //mostrando los datos
        // $("#id_cliente").val(datos.id_cliente);
        $("#id_servicio_numero").val(datos.id_servicio_numero);
        // $('#forma_pago').html(response);
        // $("#id_servicio_numero").text(datos.id_servicio_numero);
         // $("#forma_pago").val(datos.forma_pago);
        // $("#modelo_auto").text(datos.modelo_auto);
        // $("#nombre_cliente").text(datos.nombre_completo);
        // $("#run_cliente").text(datos.run);
        // $("#patente_auto").text(datos.patente_auto);
        // $("#color_auto").text(datos.color_auto);
         // alert(response);
      
      }
    });
  }

 function editarServicio_traer_forma_pago(button){
    var id_servicio_numero=button.id;
    $.ajax({
      url:"php/datos_tabla_servicios_activos_fpagos.php",
      method:"GET", 
      data:{"id_servicio_numero":id_servicio_numero},
      success:function(response){
        //datos de vienen de la base de datos
        // var datos =JSON.parse(response);
        //mostrando los datos
        // $("#id_cliente").val(datos.id_cliente);
        // $("#id_servicio_numero").val(datos.id_servicio_numero);
        $('#forma_pago').html(response);
        // $("#id_servicio_numero").text(datos.id_servicio_numero);
         // $("#forma_pago").val(datos.forma_pago);
        // $("#modelo_auto").text(datos.modelo_auto);
        // $("#nombre_cliente").text(datos.nombre_completo);
        // $("#run_cliente").text(datos.run);
        // $("#patente_auto").text(datos.patente_auto);
        // $("#color_auto").text(datos.color_auto);
         // alert(response);
      
      }
    });
  }


 function editarServicio_traer_llave(button){
    var id_servicio_numero=button.id;
    $.ajax({
      url:"php/datos_tabla_servicios_activos_llaves.php",
      method:"GET", 
      data:{"id_servicio_numero":id_servicio_numero},
      success:function(response){
        //datos de vienen de la base de datos
        // var datos =JSON.parse(response);
        //mostrando los datos
        // $("#id_cliente").val(datos.id_cliente);
        // $("#id_servicio_numero").val(datos.id_servicio_numero);
        $('#llave_info').html(response);
        // $("#id_servicio_numero").text(datos.id_servicio_numero);
         // $("#forma_pago").val(datos.forma_pago);
        // $("#modelo_auto").text(datos.modelo_auto);
        // $("#nombre_cliente").text(datos.nombre_completo);
        // $("#run_cliente").text(datos.run);
        // $("#patente_auto").text(datos.patente_auto);
        // $("#color_auto").text(datos.color_auto);
         // alert(response);
      
      }
    });
  }

  function vermasServicio(button){
    var id_servicio_numero=button.id;
    $.ajax({
      url:"php/detalles_servicios.php",
      method:"GET",
      data:{"id_servicio_numero":id_servicio_numero},
      success:function(response){

        $('#detalles_servicios_activos').html(response);

      }
    });
  }

</script>
<script type="text/javascript">
$(document.body).on('hidden.bs.modal', function () {
  $('#exampleModalCenter').removeData('bs.modal')
});


</script>

</body>
</html>