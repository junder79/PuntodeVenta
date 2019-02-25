<?php
  include 'conexion/conexion.php';
  $idmarca = $_POST['idmarca'];

  //function getModelos(){
  $stmt = $conexion->prepare("SELECT auto_modelo_id, nombre FROM auto_modelo WHERE auto_marca_id = ".$idmarca);

  // Especifica el fetch mode antes de llamar a fetch()
  $stmt->setFetchMode(PDO::FETCH_ASSOC);

  $stmt->execute();

  $resultado = '<option value="0">Modelo</option>';

  while ($row = $stmt->fetch()){
     //$select =+ '<option value="'.$row["auto_marca_id"].'">'.$row["nombre"].'</option>';
     $resultado .= "<option value='$row[auto_modelo_id]'>$row[nombre]</option>";
     echo '<option value="'.$row["auto_modelo_id"].'">'.$row["nombre"].'</option>';
   }
   return $resultado;
//}
//echo getModelos();
   //$stmt->closeCursor();
   //$stmt = null;
   //$pdo = null;


 ?>
