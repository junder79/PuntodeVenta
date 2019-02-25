<?php 

include '../conexion/conexion.php';
$id_cliente= $_GET["id_cliente"];
$resultado=mysqli_query($conexion,"
SELECT a.id_auto , a.id_cliente , a.patente_auto ,ma.nombre as 'marca', mo.nombre as 'modelo'    FROM autos a 
join auto_modelo mo
on mo.auto_modelo_id=a.auto_modelo_id
join auto_marca ma 
on ma.auto_marca_id=mo.auto_marca_id where a.id_cliente=$id_cliente")or die(mysqli_error()); 
// $result=mysqli_fetch_array($resultado);

// echo json_encode($result);
?>
<select  name="id_auto" required style="width: 100%;">
     <option value="">Selecione...</option>
   <?php while($filas=mysqli_fetch_assoc($resultado)){ ?>
 <option  value="<?php echo $filas['id_auto'];?>"><?php echo $filas['patente_auto']; echo " / "; echo $filas['marca']; echo " / "; echo $filas['modelo'];?></option>
 <?php

  } ?>
  </select> 

