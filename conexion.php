<?php
//Definimos la zona horaria (para las fechas)
date_default_timezone_set('America/Santiago');
//Conexion a la base de datos 
$host="mysql.lavameapp.com";
$user="rodrigodev";
$password="lvmWebapp2019";
$database="lavame";


$conexion =mysqli_connect($host , $user , $password , $database);



//Funcion que nos transforma la fecha de USA a LATINOAMERICA
function fechaNormal($fecha){
		$nfecha = date('d/m/Y',strtotime($fecha));
		return $nfecha;
}

//Comprobar que la conexion sea correcta

if(mysqli_connect_errno()) 
{
    echo "Conexion fallida";
}
else 
{
    
}

// Consulta para configurar la codificacion de caracteres 
 mysqli_query($conexion,"SET NAMES 'utf-8'");


 

?>