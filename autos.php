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
//conexion a la bd
include 'conexion.php';

//Obtener los valores del formulario 

$run = $_POST['run'];
$nombre_completo=$_POST['nombre_completo'];
$telefono=$_POST['telefono'];


//Validar que el cliente no exista en la base de datos 
$consultaValidacion=("SELECT * FROM clientes WHERE run ='$run'");
$validarUsuario=mysqli_query($conexion , $consultaValidacion);

if (mysqli_num_rows($validarUsuario)==0)
{

//Insertar datos en la base de datos

$sql="INSERT INTO clientes  (id_cliente ,run ,nombre_completo,telefono) values (null , '$run' , '$nombre_completo' , '$telefono')";

$conexion_consulta =mysqli_query($conexion , $sql);
}
else 
{
  echo '<script language="javascript">';
 echo 'alert("ERROR : Ya está registrado este Cliente")';
 echo '</script>';
 print "<script>window.location='clientes.php';</script>"; 
}

$query = "SELECT auto_marca_id , nombre from auto_marca order by nombre asc";
$resultado =mysqli_query($conexion ,$query);

// verificar el registro de los datos 
// if ($conexion_consulta) 
// {
//     echo '<script language="javascript">';
// 	echo 'alert("Registro exitoso , porfavor ahora registre un vehiculo")';
// 	echo '</script>';
// 	print "<script>window.location='autos.php';</script>";	
// }
// else 
// {
//     echo "---------Error------------ al insertar"; 
// }

?>


<!DOCTYPE html>
<!--Hola-->
<html>
<head>
    <title>Lavame</title>
    <script type="text/javascript" src="js/jquery.js"></script>
    <!--FUNCION QUE NOS TRAE LOS MODELOS -->
    <script type="text/javascript">
    $(document).ready(function(){
        $("#cbx_marca").change(function () {
          $("#cbx_marca option:selected").each(function () {
            auto_marca_id = $(this).val();
            $.post("getModelo.php", { auto_marca_id: auto_marca_id }, function(data){
              $("#cbx_modelo").html(data);
            });            
          });
        })
      });
    </script> 
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

 
</head>
<body>
<?php  include 'navbar.php' ?>
    <div class="container" >
    	<div class="row">
    			<div class="col-sm-6 col-xl-6" >
    			<div class="card mt-2">
    					<div class="card-body">
    						<h5 class="card-title">Datos del Cliente :</h5>
    						<label>Nombre : <?php  echo $nombre_completo; ?></label>
    						<br>
        					<label>Telefono : <?php  echo $telefono; ?></label>
    				</div>
    			</div>
    		</div>
    		<div class="col-sm-6 col-xl-6" >
    			 <div class="card mt-2" style="width: 18rem; width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title">Registro de Auto</h5>
                            <form action="registrar_auto.php" method="POST">
                            <!--INPUT-- Marca AUTO-->   
                            <p>Marca del Vehiculo </p>
                              <select id="cbx_marca" style="width: 100%;" name="marca_auto">
                              <option value="0">Selecione una marca</option>
                              <?php while($fila=mysqli_fetch_assoc($resultado)){ ?>
                                <option  value="<?php echo $fila['auto_marca_id'];?>"><?php echo $fila['nombre'];?></option>
                              <?php } ?>
                              </select>  
                              <!--SELECT MODELO AUTO-->   
                               <div class="mt-2" >Selecciona modelo :<select style="width: 100%;" name="modelo_auto_final" id="cbx_modelo"></select></div>                                        
        	                  <label>RUN Cliente</label>
                               <!--ID A REGISTRAR EL AUTO-->    
                               <select class="mt-2" name="id_cliente" id="cliente"  >
                                	<?php
                                	// include 'conexion.php';
                                 	$query = mysqli_query($conexion , "select * from clientes where run = '$run'");
                                	// var_dump($sql);
                                	while ($fila=mysqli_fetch_assoc($query))
                                	{
                                		echo "<option value='".$fila['id_cliente']."'>".$fila['run']."</option>";

                                	}
                                	?>
                               </select>
                                          
                               <!--INPUT-- PATENTE AUTO-->   
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
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
                                <input type="submit" class="btn btn-raised btn-primary" value="Registrar">              
                            </form>
                    </div>
    		          </div>
    	                   </div>
    	
    </div>
</div>
  
</body>
</html>