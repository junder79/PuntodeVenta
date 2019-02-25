<?php 
  session_start();
include '../conexion/conexion.php';
$id_servicio_numero=$_GET["id_servicio_numero"];
$resultado_llaves=mysqli_query($conexion, "SELECT n_llaves from servicios where estado_vehiculo=0 and id_servicio_numero=$id_servicio_numero ");
// $result=mysqli_fetch_array($resultado_llaves);

// echo json_encode($result);
?>
<select name="n_llave_mod" id="n_llav" class="form-control" required style="width: 100%;">
	<?php while ($row=mysqli_fetch_assoc($resultado_llaves)) { ?>
		<option  value="<?php echo $row['n_llaves'];  ?>"><?php echo $row['n_llaves']; if($row['n_llaves']==1){


			echo '<option value="2">2</option>';
			echo '<option value="3">3</option>';
			echo '<option value="4">4</option>';
			echo '<option value="5">5</option>';
			echo '<option value="6">6</option>';
			echo '<option value="7">7</option>';
			echo '<option value="8">8</option>';
			echo '<option value="9">9</option>';
			echo '<option value="10">10</option>';
			echo '<option value="11">11</option>';
			echo '<option value="12">12</option>';
			echo '<option value="13">13</option>';
			echo '<option value="14">14</option>';
			echo '<option value="15">15</option>';
			echo '<option value="16">16</option>';
			echo '<option value="17">17</option>';
			echo '<option value="18">18</option>';
			echo '<option value="19">19</option>';
			echo '<option value="20">20</option>';
	} if($row['n_llaves']==2){

			echo '<option value="1">1</option>';
			echo '<option value="3">3</option>';
			echo '<option value="4">4</option>';
			echo '<option value="5">5</option>';
			echo '<option value="6">6</option>';
			echo '<option value="7">7</option>';
			echo '<option value="8">8</option>';
			echo '<option value="9">9</option>';
			echo '<option value="10">10</option>';
			echo '<option value="11">11</option>';
			echo '<option value="12">12</option>';
			echo '<option value="13">13</option>';
			echo '<option value="14">14</option>';
			echo '<option value="15">15</option>';
			echo '<option value="16">16</option>';
			echo '<option value="17">17</option>';
			echo '<option value="18">18</option>';
			echo '<option value="19">19</option>';
			echo '<option value="20">20</option>';
	} if($row['n_llaves']==3){
			echo '<option value="1">1</option>';
			echo '<option value="2">2</option>';
			echo '<option value="4">4</option>';
			echo '<option value="5">5</option>';
			echo '<option value="6">6</option>';
			echo '<option value="7">7</option>';
			echo '<option value="8">8</option>';
			echo '<option value="9">9</option>';
			echo '<option value="10">10</option>';
			echo '<option value="11">11</option>';
			echo '<option value="12">12</option>';
			echo '<option value="13">13</option>';
			echo '<option value="14">14</option>';
			echo '<option value="15">15</option>';
			echo '<option value="16">16</option>';
			echo '<option value="17">17</option>';
			echo '<option value="18">18</option>';
			echo '<option value="19">19</option>';
			echo '<option value="20">20</option>';
	} if($row['n_llaves']==4){
			echo '<option value="1">1</option>';
			echo '<option value="2">2</option>';
			echo '<option value="3">3</option>';
			echo '<option value="5">5</option>';
			echo '<option value="6">6</option>';
			echo '<option value="7">7</option>';
			echo '<option value="8">8</option>';
			echo '<option value="9">9</option>';
			echo '<option value="10">10</option>';
			echo '<option value="11">11</option>';
			echo '<option value="12">12</option>';
			echo '<option value="13">13</option>';
			echo '<option value="14">14</option>';
			echo '<option value="15">15</option>';
			echo '<option value="16">16</option>';
			echo '<option value="17">17</option>';
			echo '<option value="18">18</option>';
			echo '<option value="19">19</option>';
			echo '<option value="20">20</option>';
	} if($row['n_llaves']==5){
		echo '<option value="1">1</option>';
			echo '<option value="2">2</option>';
			echo '<option value="3">3</option>';
			echo '<option value="4">4</option>';
			echo '<option value="6">6</option>';
			echo '<option value="7">7</option>';
			echo '<option value="8">8</option>';
			echo '<option value="9">9</option>';
			echo '<option value="10">10</option>';
			echo '<option value="11">11</option>';
			echo '<option value="12">12</option>';
			echo '<option value="13">13</option>';
			echo '<option value="14">14</option>';
			echo '<option value="15">15</option>';
			echo '<option value="16">16</option>';
			echo '<option value="17">17</option>';
			echo '<option value="18">18</option>';
			echo '<option value="19">19</option>';
			echo '<option value="20">20</option>';
	} if($row['n_llaves']==6){

			echo '<option value="1">1</option>';
			echo '<option value="2">2</option>';
			echo '<option value="3">3</option>';
			echo '<option value="4">4</option>';
			echo '<option value="5">5</option>';
			echo '<option value="7">7</option>';
			echo '<option value="8">8</option>';
			echo '<option value="9">9</option>';
			echo '<option value="10">10</option>';
			echo '<option value="11">11</option>';
			echo '<option value="12">12</option>';
			echo '<option value="13">13</option>';
			echo '<option value="14">14</option>';
			echo '<option value="15">15</option>';
			echo '<option value="16">16</option>';
			echo '<option value="17">17</option>';
			echo '<option value="18">18</option>';
			echo '<option value="19">19</option>';
			echo '<option value="20">20</option>';
	} 

	if($row['n_llaves']==7){

			echo '<option value="1">1</option>';
			echo '<option value="2">2</option>';
			echo '<option value="3">3</option>';
			echo '<option value="4">4</option>';
			echo '<option value="5">5</option>';
			echo '<option value="6">6</option>';
			echo '<option value="8">8</option>';
			echo '<option value="9">9</option>';
			echo '<option value="10">10</option>';
			echo '<option value="11">11</option>';
			echo '<option value="12">12</option>';
			echo '<option value="13">13</option>';
			echo '<option value="14">14</option>';
			echo '<option value="15">15</option>';
			echo '<option value="16">16</option>';
			echo '<option value="17">17</option>';
			echo '<option value="18">18</option>';
			echo '<option value="19">19</option>';
			echo '<option value="20">20</option>';
	} 

	if($row['n_llaves']==8){

			echo '<option value="1">1</option>';
			echo '<option value="2">2</option>';
			echo '<option value="3">3</option>';
			echo '<option value="4">4</option>';
			echo '<option value="5">5</option>';
			echo '<option value="6">6</option>';
			echo '<option value="7">7</option>';
			echo '<option value="9">9</option>';
			echo '<option value="10">10</option>';
			echo '<option value="11">11</option>';
			echo '<option value="12">12</option>';
			echo '<option value="13">13</option>';
			echo '<option value="14">14</option>';
			echo '<option value="15">15</option>';
			echo '<option value="16">16</option>';
			echo '<option value="17">17</option>';
			echo '<option value="18">18</option>';
			echo '<option value="19">19</option>';
			echo '<option value="20">20</option>';
	} 

	if($row['n_llaves']==9){

			echo '<option value="1">1</option>';
			echo '<option value="2">2</option>';
			echo '<option value="3">3</option>';
			echo '<option value="4">4</option>';
			echo '<option value="5">5</option>';
			echo '<option value="6">6</option>';
			echo '<option value="7">7</option>';
			echo '<option value="8">8</option>';
			echo '<option value="10">10</option>';
			echo '<option value="11">11</option>';
			echo '<option value="12">12</option>';
			echo '<option value="13">13</option>';
			echo '<option value="14">14</option>';
			echo '<option value="15">15</option>';
			echo '<option value="16">16</option>';
			echo '<option value="17">17</option>';
			echo '<option value="18">18</option>';
			echo '<option value="19">19</option>';
			echo '<option value="20">20</option>';
	} 

	if($row['n_llaves']==10){

			echo '<option value="1">1</option>';
			echo '<option value="2">2</option>';
			echo '<option value="3">3</option>';
			echo '<option value="4">4</option>';
			echo '<option value="5">5</option>';
			echo '<option value="6">6</option>';
			echo '<option value="7">7</option>';
			echo '<option value="8">8</option>';
			echo '<option value="9">9</option>';
			echo '<option value="11">11</option>';
			echo '<option value="12">12</option>';
			echo '<option value="13">13</option>';
			echo '<option value="14">14</option>';
			echo '<option value="15">15</option>';
			echo '<option value="16">16</option>';
			echo '<option value="17">17</option>';
			echo '<option value="18">18</option>';
			echo '<option value="19">19</option>';
			echo '<option value="20">20</option>';
	} 

	if($row['n_llaves']==11){

			echo '<option value="1">1</option>';
			echo '<option value="2">2</option>';
			echo '<option value="3">3</option>';
			echo '<option value="4">4</option>';
			echo '<option value="5">5</option>';
			echo '<option value="6">6</option>';
			echo '<option value="7">7</option>';
			echo '<option value="8">8</option>';
			echo '<option value="9">9</option>';
			echo '<option value="10">10</option>';
			echo '<option value="12">12</option>';
			echo '<option value="13">13</option>';
			echo '<option value="14">14</option>';
			echo '<option value="15">15</option>';
			echo '<option value="16">16</option>';
			echo '<option value="17">17</option>';
			echo '<option value="18">18</option>';
			echo '<option value="19">19</option>';
			echo '<option value="20">20</option>';
	} 

	if($row['n_llaves']==12){

			echo '<option value="1">1</option>';
			echo '<option value="2">2</option>';
			echo '<option value="3">3</option>';
			echo '<option value="4">4</option>';
			echo '<option value="5">5</option>';
			echo '<option value="6">6</option>';
			echo '<option value="7">7</option>';
			echo '<option value="8">8</option>';
			echo '<option value="9">9</option>';
			echo '<option value="10">10</option>';
			echo '<option value="11">11</option>';
			echo '<option value="13">13</option>';
			echo '<option value="14">14</option>';
			echo '<option value="15">15</option>';
			echo '<option value="16">16</option>';
			echo '<option value="17">17</option>';
			echo '<option value="18">18</option>';
			echo '<option value="19">19</option>';
			echo '<option value="20">20</option>';
	} 

	if($row['n_llaves']==13){

			echo '<option value="1">1</option>';
			echo '<option value="2">2</option>';
			echo '<option value="3">3</option>';
			echo '<option value="4">4</option>';
			echo '<option value="5">5</option>';
			echo '<option value="6">6</option>';
			echo '<option value="7">7</option>';
			echo '<option value="8">8</option>';
			echo '<option value="9">9</option>';
			echo '<option value="10">10</option>';
			echo '<option value="11">11</option>';
			echo '<option value="12">12</option>';
			echo '<option value="14">14</option>';
			echo '<option value="15">15</option>';
			echo '<option value="16">16</option>';
			echo '<option value="17">17</option>';
			echo '<option value="18">18</option>';
			echo '<option value="19">19</option>';
			echo '<option value="20">20</option>';
	} 

	if($row['n_llaves']==14){

			echo '<option value="1">1</option>';
			echo '<option value="2">2</option>';
			echo '<option value="3">3</option>';
			echo '<option value="4">4</option>';
			echo '<option value="5">5</option>';
			echo '<option value="6">6</option>';
			echo '<option value="7">7</option>';
			echo '<option value="8">8</option>';
			echo '<option value="9">9</option>';
			echo '<option value="10">10</option>';
			echo '<option value="11">11</option>';
			echo '<option value="12">12</option>';
			echo '<option value="13">13</option>';
			echo '<option value="15">15</option>';
			echo '<option value="16">16</option>';
			echo '<option value="17">17</option>';
			echo '<option value="18">18</option>';
			echo '<option value="19">19</option>';
			echo '<option value="20">20</option>';
	} 

	if($row['n_llaves']==15){


			echo '<option value="1">1</option>';
			echo '<option value="2">2</option>';
			echo '<option value="3">3</option>';
			echo '<option value="4">4</option>';
			echo '<option value="5">5</option>';
			echo '<option value="6">6</option>';
			echo '<option value="7">7</option>';
			echo '<option value="8">8</option>';
			echo '<option value="9">9</option>';
			echo '<option value="10">10</option>';
			echo '<option value="11">11</option>';
			echo '<option value="12">12</option>';
			echo '<option value="13">13</option>';
			echo '<option value="14">14</option>';
			echo '<option value="16">16</option>';
			echo '<option value="17">17</option>';
			echo '<option value="18">18</option>';
			echo '<option value="19">19</option>';
			echo '<option value="20">20</option>';
	} 

	if($row['n_llaves']==16){

			echo '<option value="1">1</option>';
			echo '<option value="2">2</option>';
			echo '<option value="3">3</option>';
			echo '<option value="4">4</option>';
			echo '<option value="5">5</option>';
			echo '<option value="6">6</option>';
			echo '<option value="7">7</option>';
			echo '<option value="8">8</option>';
			echo '<option value="9">9</option>';
			echo '<option value="10">10</option>';
			echo '<option value="11">11</option>';
			echo '<option value="12">12</option>';
			echo '<option value="13">13</option>';
			echo '<option value="14">14</option>';
			echo '<option value="15">15</option>';
			echo '<option value="17">17</option>';
			echo '<option value="18">18</option>';
			echo '<option value="19">19</option>';
			echo '<option value="20">20</option>';
	} 
	if($row['n_llaves']==17){

			echo '<option value="1">1</option>';
			echo '<option value="2">2</option>';
			echo '<option value="3">3</option>';
			echo '<option value="4">4</option>';
			echo '<option value="5">5</option>';
			echo '<option value="6">6</option>';
			echo '<option value="7">7</option>';
			echo '<option value="8">8</option>';
			echo '<option value="9">9</option>';
			echo '<option value="10">10</option>';
			echo '<option value="11">11</option>';
			echo '<option value="12">12</option>';
			echo '<option value="13">13</option>';
			echo '<option value="14">14</option>';
			echo '<option value="15">15</option>';
			echo '<option value="16">16</option>';
			echo '<option value="18">18</option>';
			echo '<option value="19">19</option>';
			echo '<option value="20">20</option>';
	} 
	if($row['n_llaves']==18){

			echo '<option value="1">1</option>';
			echo '<option value="2">2</option>';
			echo '<option value="3">3</option>';
			echo '<option value="4">4</option>';
			echo '<option value="5">5</option>';
			echo '<option value="6">6</option>';
			echo '<option value="7">7</option>';
			echo '<option value="8">8</option>';
			echo '<option value="9">9</option>';
			echo '<option value="10">10</option>';
			echo '<option value="11">11</option>';
			echo '<option value="12">12</option>';
			echo '<option value="13">13</option>';
			echo '<option value="14">14</option>';
			echo '<option value="15">15</option>';
			echo '<option value="16">16</option>';
			echo '<option value="17">17</option>';
			echo '<option value="19">19</option>';
			echo '<option value="20">20</option>';
	} 
	if($row['n_llaves']==19){

			echo '<option value="1">1</option>';
			echo '<option value="2">2</option>';
			echo '<option value="3">3</option>';
			echo '<option value="4">4</option>';
			echo '<option value="5">5</option>';
			echo '<option value="6">6</option>';
			echo '<option value="7">7</option>';
			echo '<option value="8">8</option>';
			echo '<option value="9">9</option>';
			echo '<option value="10">10</option>';
			echo '<option value="11">11</option>';
			echo '<option value="12">12</option>';
			echo '<option value="13">13</option>';
			echo '<option value="14">14</option>';
			echo '<option value="15">15</option>';
			echo '<option value="16">16</option>';
			echo '<option value="17">17</option>';
			echo '<option value="18">18</option>';
			echo '<option value="20">20</option>';
	} 
	if($row['n_llaves']==20){

			echo '<option value="1">1</option>';
			echo '<option value="2">2</option>';
			echo '<option value="3">3</option>';
			echo '<option value="4">4</option>';
			echo '<option value="5">5</option>';
			echo '<option value="6">6</option>';
			echo '<option value="7">7</option>';
			echo '<option value="8">8</option>';
			echo '<option value="9">9</option>';
			echo '<option value="10">10</option>';
			echo '<option value="11">11</option>';
			echo '<option value="12">12</option>';
			echo '<option value="13">13</option>';
			echo '<option value="14">14</option>';
			echo '<option value="15">15</option>';
			echo '<option value="16">16</option>';
			echo '<option value="17">17</option>';
			echo '<option value="18">18</option>';
			echo '<option value="19">19</option>';
	} 


















	?></option>
	<!-- <?php	}   ?> -->


}


      ?>
</select>