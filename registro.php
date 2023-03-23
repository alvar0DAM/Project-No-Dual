<?php
error_reporting(E_ALL^E_NOTICE);

if(isset($_POST["user"])){
    $user=$_POST['user'];
    echo "El nombre de usuario es: ",$user;
}
if(isset($_POST['contraseña'])){
    $contraseña=$_POST['contraseña'];
    echo "<br> La contraseña del usuario es: ",$contraseña;
}
if(isset($_POST['nombre'])){
    $nombre=$_POST['nombre'];
    echo "<br> El nombre es: ",$nombre;
}
if(isset($_POST['apellido'])){
    $apellido=$_POST['apellido'];
    echo "<br> El apellido es: ",$apellido;
}
if(isset($_POST['telefono'])){
    $telefono=$_POST['telefono'];
    echo "<br> El telefono es: ",$telefono;
}
if(isset($_POST['correo'])){
    $correo=$_POST['correo'];
    echo "<br> El correo es: ",$correo;
}

?>