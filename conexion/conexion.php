<?php

//Conexion a la base de datos 
$host="mysql.lavameapp.com";
$user="rodrigodev";
$password="lvmWebapp2019";
$database="lavame";



$conexion =mysqli_connect($host , $user , $password , $database);

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