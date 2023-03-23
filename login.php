<?php
error_reporting(E_ALL^E_NOTICE);
var_dump($_POST);

if(isset($_POST["user"])){
    $user=$_POST['user'];
    echo "El nombre de usuario es: ",$user;
}
if(isset($_POST['contraseña'])){
    $contraseña=$_POST['contraseña'];
    echo "<br> La contraseña del usuario es: ",$contraseña;
}

?>