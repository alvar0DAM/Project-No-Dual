<?php

require_once("conexion.php");

if($_SERVER['REQUEST_METHOD']==='POST'){
    $usuario=$_POST['usuario'];
    $contraseña=$_POST['contraseña'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['correo'];
    $telefono = $_POST['telefono'];

    $errores = [];

    if(empty($nombre)){
        $errores['nombre']="El campo Nombre es obligatorio";
    }

    if(empty($apellido)){
        $errores['apellido']="El campo Apellido es obligatorio";
    }

    if(empty($email)){
        $errores['correo']="El campo Correo es obligatorio";
    }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $errores['correo']="El campo Correo no tiene un formato valido";
    }

    if(empty($telefono)){
        $errores['telefono']="El campo Telefono es obligatorio";
    }elseif (!preg_match('/^[0-9]{9}$/',$telefono)) {
        $errores['telefono']="El campo Telefono no tiene un formato valido";
    }

    if(count($errores)===0){
        //insertamos los datos del registro en la tabla
        $sql="INSERT INTO datos(usuario,contraseña,nombre,apellido,correo,telefono)VALUES ('$usuario','$contraseña','$nombre','$apellido','$email','$telefono')";
        $resultado=mysqli_query($conexion,$sql) or trigger_error("Query Failed! SQL- Error: ".mysqli_error($conexion), E_USER_ERROR);
    }

    $conexion->close();
}

?>
