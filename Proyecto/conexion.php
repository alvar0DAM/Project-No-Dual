<?php
//validar datos del servidor
$host="localhost";
$user="root";
$pass="DAW1";
$database="formulario";

//conectar a la base de datos
$conexion= new mysqli($host,$user,$pass,$database);

//Comprobar conexion
if($conexion->connect_error){
    die( "No se ha podido conectar con la base de datos "."<br>".$conexion->connect_error);
}else{
    echo "Conexion establecida con exito"."<br>";
}
?>