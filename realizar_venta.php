<?php 
  session_start();
include 'conexion.php';
$query = "SELECT auto_marca_id , nombre from auto_marca ";
$resultado =mysqli_query($conexion ,$query);

$query_1=("SELECT * FROM tipo_servicio");
$resultado_tipo_servicio=mysqli_query($conexion , $query_1);

$consulta=("SELECT id_servicio_numero from servicios order by id_servicio_numero desc limit 1");
$resultado_obten=mysqli_query($conexion,$consulta);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Realizar Venta</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    $('#tabla').load('componentes/tabla.php');
    $('#buscador').load('componentes/buscador.php');
  });
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
      $("select#id_tipo_servicio").on("keyup",function(){
        var valor=$(this).val();
        $("div#mensaje p ").html(valor);
      });
    });
  </script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<!--BOOSTRAP DATEPICKER -->
  <script type="text/javascript" src="js/moment.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
  <!--SELECT 2 -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/i18n/defaults-*.min.js"></script>
            
</head>
<body>
<?php  include 'navbar.php' ?>
<!--FUNCION PARA REALIZAR EL CÁLCULO DE SERVICIOS AGREGADOS-->
<script>
function selectFunction(e) {
  var type_id = $('select option:selected').map(function() {
      return $(this).attr('data-typeid');
    })
    .get().map(parseFloat).reduce(function(a, b) {
      return a + b
    });
  $("#valor_total").val( type_id );
}
</script>
    <div class="container">
       <div class="row mt-4 mb-4">
        <div class="col-lg-4" >
          <input type="text" name="busqueda" class="form-control" id="busqueda" placeholder="Buscar por Nombre">
        </div>       
     </div>  
    <!-- <div id="buscador"></div> -->
    <!-- <div id="tabla"></div> -->
      <section id="tabla_resultado" style="height:450px; overflow: scroll;">
    <!-- AQUI SE DESPLEGARA NUESTRA TABLA DE CONSULTA -->
    </section>
</div>
          <!--MODAL PARA LA SECCIÓN DE DETALLES-->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Detalles del Cliente :</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Nombre : <span id="nombre_cliente"></span></p>
                  <p>RUN : <span id="run_cliente"></span></p>
<!--                   <p>Marca :<span id="marca_auto"></span> </p>
                  <p>Modelo : <span id="modelo_auto"></span></p> -->
                  <!-- <p>Patentes Registradas :</p> -->
                  <div id="info_auto"></div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-raised btn-warning" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
          </div>

          <!--MODAL PARA REALIZAR UN SERVICIO-->
          <div class="modal fade" id="modal_registro_servicio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog  modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Nuevo Servicio</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                 <!--FORMULARIO DE REGISTRO-->
                 <form method="POST" action="registrar_servicio.php">
                     <div class="row">
                        <div class="col-lg-10">
                            <p style="font-size:16px; font-weight: bold;">Nombre Cliente :<span id="nombre_cliente_servicio"></span></p> </p>
                              </div>
                                <div class="col-lg-2">
                                  <input type="hidden" name="id_cliente_servicio" id="id_cliente_servicio" class="form-control" readonly="readonly"> 
                                  </div>
                                </div>
                  <!-- <p>La ID DEL Clientes es  : <span id="id_cliente_servicio"></span></p> -->
                  <p>Eliga la Patente :</p>
                  <!--PATENTES DISPONIBLES-->
                  <div id='patentes'></div>
                  <!-- <div id='id_auto'></div> -->
                  <!--ELEGIR EL TIPO DE SERVICIO-->
                  <p style="margin-top: 15px;">Eliga tipo de Servicio : </p>
                    <select  name="id_tipo_servicio[]" onchange="selectFunction(event)"  class="selectpicker form-control form-control-sm" data-live-search="true"  required   multiple  >
               <!-- <option value="0"></option> -->
              <?php while($elemento=mysqli_fetch_assoc($resultado_tipo_servicio)){ ?>
              <option   data-typeid="<?php echo $elemento['valor'];?>"  value="<?php echo $elemento['id_servicio'];?>"><?php echo $elemento['nombre'];  echo " / $" ; echo $elemento['valor'];?></option>

                <?php }  ?>
                </select> 
                <div class="row">
                  <div class="col-lg-7 mt-4">
                    <label>Forma de Pago :</label>
                      <select required name="forma_pago"  class="custom-select">
                        <option value="">Seleccione</option>
                        <option value="PENDIENTE">PENDIENTE</option>
                        <option value="EFECTIVO">EFECTIVO</option>
                        <option value="TRANSBANK">TRANSBANK</option>
			<option value="TRANSFERENCIA BANCARIA">TRANSFERENCIA BANCARIA</option>
                        <option value="TICKET BSF">TICKET BSF</option>
                      </select>
                  </div>
                  <div class="col-lg-2">
                    <label>Hr a retirar el vehiculo : </label>
                      <div class="input-group date  " id="datetimepicker3" data-target-input="nearest">
                      <input type="text" name="hora_retiro" required="" class="form-control datetimepicker-input" data-target="#datetimepicker3"/>
                      <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fas fa-clock"></i></div>
                      </div>
                    </div>
                </div>
                <div class="col-lg-2 mt-4">
                  <label>N° Llave</label>
                  <select name="n_llaves" class="custom-select">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                  </select>
                </div>
              </div>
                <div class="row mt-2">
                  <div class="col-lg-2">
                      <label>Precio Total : $</label>
                  </div>
                  <div class="col-lg-2">
                    <input type="number" value="" id="valor_total" class="form-control" disabled="">
                  </div>
                    <div class="col-lg-10">
                    <!-- <input type="number" value="" id="valor_total" class="form-control" disabled=""> -->
                  </div>
                </div>

                <p><?php
                 
                 while($ids=mysqli_fetch_array($resultado_obten))
                 {
                  // echo $ids['id_servicio']+10;
                  // echo '<h1>'.$ids['id_servicio'+10].'<h1>';


                  ?>
                    <input type="hidden" name="id_servicio_registrar" class="form-control" readonly="readonly" value="<?php echo $ids['id_servicio_numero']+1; ?>">

                  <?php } ?>
                  </p>
            <button type="submit" class="btn btn-raised btn-info">Agregar</button>   
            <button type="button" class="btn btn-raised btn-warning" data-dismiss="modal">Cerrar</button>      
                 </form>
                </div>
     <!--            <div class="modal-footer">
                  

                </div> -->
              </div>
            </div>
          </div>
          <!--MODAL PARA AGREGAR UN NUEVO VEHICULO -->
          <div class="modal fade" id="modal_registro_vehiculo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog " role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Añadir Vehiculo</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">      
                    <form method="POST" action="registrar_auto.php">
                          <div class="input-group mb-3" >
                             <div class="row">
                                  <div class="col-lg-11 text-uppercase">
                                    <p style="font-size:16px;font-weight: bold;">Nombre: <span id="nombre_cliente_auto"></span></p>
                                  </div>
                                  <div class="col-lg-1">
                                    <input type="hidden" name="id_cliente" id="id_cliente" class=" form-control" readonly="readonly"> 
                                  </div>
                                </div>
                          </div> 
                  
                      <!-- <label>ID Cliente</label>
                      <input type="text" name="id_cliente" id="id_cliente" readonly="readonly"> -->
                    
                              <div class="row" >
                                <div class="col-lg-4">
                                  <p style="font-size:16px; font-weight: bold;">Run :</p>
                                </div>
                                <div  class=" col-lg-8">
                                       <input  type="text" disabled name="run" id="run"  class=" mb-2 form-control" name="run" placeholder="RUT Cliente" aria-describedby="basic-addon1" required>
                                </div>
                              </div>
                         
                      
                      <!--SELECT MARCA AUTO-->
                        <div class="row">
                          <div class="col-lg-4">
                            <p>Marca :</p>
                          </div>
                          <div class="col-lg-8">
                            <select id="cbx_marca" name="marca_auto" required="" style="width: 100%;">
                                <option value="">Selecione...</option>
                                <?php while($fila=mysqli_fetch_assoc($resultado)){ ?>
                                  <option  value="<?php echo $fila['auto_marca_id'];?>"><?php echo $fila['nombre'];?></option>
                                <?php } ?>
                            </select>   
                          </div>
                        </div>        
                      <!--SELECT MODELO AUTO-->  
                      <div class="row">
                        <div class="col-lg-4">
                          <p>Modelo :</p>
                        </div>
                        <div class="col-lg-8">
                          <select style="width: 100%;" required="" name="modelo_auto_final" id="cbx_modelo"></select>
                        </div>
                      </div>                
                      <!--INPUT-- PATENTE AUTO-->   
                         <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                  <!-- <span class="input-group-text" id="basic-addon1">@</span> -->
                              </div>
                              <input type="text" class="form-control" name="patente_auto" placeholder="Patente del Vehiculo" aria-describedby="basic-addon1" required>
                          </div>     
                      <!--INPUT-- COLOR AUTO-->   
                         <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                  <!-- <span class="input-group-text" id="basic-addon1">@</span> -->
                              </div>
                              <input type="text" class="form-control" name="color_auto" placeholder="Color del Vehiculo" aria-describedby="basic-addon1" required>
                              </div>  
                              
                      <button type="submit" class="btn btn-raised btn-success">Registrar</button>
                    </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-raised btn-warning" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
          </div>  

  <script type="text/javascript">
  $(obtener_registros());

function obtener_registros(run)
{
  $.ajax({
    url : 'buscador.php',
    type : 'POST',
    dataType : 'html',
    data : { run: run },
    })

  .done(function(resultado){
    $("#tabla_resultado").html(resultado);
  })
}

$(document).on('keyup', '#busqueda', function()
{
  var valorBusqueda=$(this).val();
  if (valorBusqueda!="")
  {
    obtener_registros(valorBusqueda);
  }
  else
    {
      obtener_registros();
    }
});

</script> 


      <script type="text/javascript">
            $(function () {
                $('#datetimepicker3').datetimepicker({
                     format: 'HH:mm',
                });
            });
        </script>        
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
    $('.selectpicker').selectpicker({
    
    size: 6
});
</script>
<script type="text/javascript">
  function abrirDetalles(button){
    var id_cliente=button.id;
    $.ajax({
      url:"php/datos.php",
      method:"GET", 
      data:{"id_cliente":id_cliente},
      success:function(response){
        //datos de vienen de la base de datos
        var datos =JSON.parse(response);
        //mostrando los datos
        // $("#marca_auto").text(datos.nombre_auto);
        // $("#modelo_auto").text(datos.modelo_auto);
        $("#nombre_cliente").text(datos.nombre_completo);
        $("#run_cliente").text(datos.run);
        $("#patente_auto").text(datos.patente_auto);
        $("#color_auto").text(datos.color_auto);
         // alert(response);
      
      }
    });
  }
    function agregarAuto(button){
    var id_cliente=button.id;
    $.ajax({
      url:"php/servicio.php",
      method:"GET", 
      data:{"id_cliente":id_cliente},
      success:function(response){
        //datos de vienen de la base de datos
        var datos =JSON.parse(response);
        //mostrando los datos
        $("#run").val(datos.run)
        $("#id_cliente").val(datos.id_cliente);
        $("#nombre_cliente_auto").text(datos.nombre_completo);
        // $("#modelo_auto").text(datos.modelo_auto);
        // $("#patente_auto").text(datos.patente_auto);
        // $("#color_auto").text(datos.color_auto);
        // alert(response);
      
      }
    });
  }

    function agregarServicio(button){
    var id_cliente=button.id;
    $.ajax({
      url:"php/agregarServicio.php",
      method:"GET", 
      data:{"id_cliente":id_cliente},
      success:function(response){
        //Nos traerá la id del auto
          $('#patentes').html(response);
        //datos de vienen de la base de datos
        // var datos =JSON.parse(response);
        // $("#id_cliente_servicio").text(datos.id_cliente);
        //mostrando los datos
    // var=id_cliente=$("#patente_auto_servicio").text(datos.id_cliente);
        // $("#id_cliente").val(datos.id_cliente);
        // $("#modelo_auto").text(datos.modelo_auto);
        // $("#patente_auto").text(datos.patente_auto);
        // $("#color_auto").text(datos.color_auto);
        // alert(response);
        // console.log(response);


      }
    });
  }



    function detallesClientes(button){
    var id_cliente=button.id;
    $.ajax({
      url:"php/detalles_autos.php",
      method:"GET", 
      data:{"id_cliente":id_cliente},
      success:function(response){
        //Nos traerá la id del auto
          $('#info_auto').html(response);
        //datos de vienen de la base de datos
        // var datos =JSON.parse(response);
        // $("#id_cliente_servicio").text(datos.id_cliente);
        //mostrando los datos
    // var=id_cliente=$("#patente_auto_servicio").text(datos.id_cliente);
        // $("#id_cliente").val(datos.id_cliente);
        // $("#modelo_auto").text(datos.modelo_auto);
        // $("#patente_auto").text(datos.patente_auto);
        // $("#color_auto").text(datos.color_auto);
        // alert(response);
        // console.log(response);


      }
    });
  }



     function agregarServicio_sacar_id(button){
    var id_cliente=button.id;
    $.ajax({
      url:"php/agregarServicio_sacar_id.php",
      method:"GET", 
      data:{"id_cliente":id_cliente},
      success:function(response){
        //Nos traerá la id del auto
          // $('#patentes').html(response);
        //datos de vienen de la base de datos
        var datos =JSON.parse(response);
        //Nos trae la id del servicio
        $("#id_cliente_servicio").val(datos.id_cliente);
        $('#nombre_cliente_servicio').text(datos.nombre_completo);  
        //mostrando los datos
    // var=id_cliente=$("#patente_auto_servicio").text(datos.id_cliente);
        // $("#id_cliente").val(datos.id_cliente);
        // $("#modelo_auto").text(datos.modelo_auto);
        // $("#patente_auto").text(datos.patente_auto);
        // $("#color_auto").text(datos.color_auto);
        // alert(response);
        // console.log(response);


      }
    });
  }




    //   function llenaModelosSeleccionado(){
    //     var e = document.getElementById("marca");
    //     var value = e.options[e.selectedIndex].value;
    //     var text = e.options[e.selectedIndex].text;
    // //    alert(value);
    //     var formData = {idmarca:value};
    //     $.ajax({
    //     type: 'POST',
    //     url: 'obtenerModelosSeleccionados.php',
    //     data: formData
    //   })
    //   .done(function(lista_mod){
    //     $('#modelo').html(lista_mod);
    //     //alert(lista_mod);
    //   })
    //   .fail(function(){
    //     alert(value);
    //   });
    // }


    // //Nos traerá los modelo 
    //     $(document).ready(function(){
    //     $("#cbx_marca").change(function () {

    //       // $('#cbx_modelo').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
          
    //       $("#cbx_marca option:selected").each(function () {
    //         id_marca = $(this).val();
    //         $.post("getModelos.php", { id_marca: id_marca }, function(data){
    //           $("#cbx_modelo").html(data);
    //         });            
    //       });
    //     })

</script>

<script type="text/javascript">
function alertaRegistrar()
{
  var resultadoPregunta=alert("No tiene un vehiculo Registrado , ¿Desea registrarlo ahora?");
  if (resultadoPregunta==true)
  {
    alert("segundo alert");
  } else 
  {
    abirModalVehiculo();
  }
}
</script>
<script type="text/javascript">
  function abrirmodal () {
  $("#modal_registro_servicio").modal()
  }
  function abirModalVehiculo()
  {
  $("#modal_registro_vehiculo").modal()
  }
  
</script>

</body>

</html>

<!--Nicolas Cisterna-->