<?php

require_once("conexion.php");

if($_SERVER['REQUEST_METHOD']==='POST'){
    //array de errores
    $errores = [];

    $usuario=$_POST['usuario'];
    $contraseña=$_POST['contraseña'];

    if(empty($usuario)){
        $errores['usuario']="<br>"."El Nombre de usuario es obligatorio"; 
        echo $usuario['usuario'];
    }
 
    if(empty($contraseña)){
        $errores['contraseña']="<br>"."El campo Contraseña es obligatorio";
        echo $contraseña['contraseña'];
    }


    //a este if solo se accede cuando se está registrando un usuario
    if(isset($_POST['registro'])){
        //se verifica primero si el elemento 'registro' existe antes de ejecutar cualquier accion
        $nombre = $_POST['nombre'];
        if(empty($nombre)){
            $errores['nombre']="<br>"."El campo Nombre es obligatorio";
            echo $errores['nombre'];
        }
        
        $apellido = $_POST['apellido'];
        if(empty($apellido)){
            $errores['apellido']="<br>"."El campo Apellido es obligatorio";
            echo $errores['apellido'];
        }
    
        $email = $_POST['correo'];
        if(empty($email)){
            $errores['correo']="<br>"."El campo Correo es obligatorio";
            echo $errores['correo'];
        }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            //compruba si el email es valido o no
            $errores['correo']="<br>"."El campo Correo no tiene un formato valido";
            echo $errores['correo'];
        }
    
        $telefono = $_POST['telefono'];
        if(empty($telefono)){
            $errores['telefono']="<br>"."El campo Telefono es obligatorio";
            echo $errores['telefono'];
        }elseif (!preg_match('/^[0-9]{9}$/',$telefono)) {
            //comprueba que el telefono tiene 9 cifras del 0 al 9
            $errores['telefono']="<br>"."El campo Telefono no tiene un formato valido";
            echo $errores['telefono'];
        }

        $q = mysqli_query($conexion,"SELECT usuario FROM datos WHERE usuario='$usuario'"); 
        //se hace una consulta a la base de datos y se comprueba si el nombre de usuario ya existe
        if (mysqli_num_rows($q) != 0) { 
            //si ya existe se lanza un mensaje
            $errores['usuario'] = "<br>"."El nombre de usuario ya existe"; 
            echo $errores['usuario'];
        }
    }

        if(count($errores)===0){
            //una vez no hay ningun error se hace lo siguiente: 
            $hash=password_hash($contraseña,PASSWORD_DEFAULT);
            //la variable $contraseña contiene la contraseña sin encriptar
            //la funcion password_hash() se utiliza para generar el hash de la contraseña
            //el parametro PASSWORD_DEFAULT indica que se debe utilizar el algoritmo de hashing predeterminado de PHP
            

            if(isset($_POST['registro'])){
                //si estamos haciendo un registro, se insertan los datos en la base
               $sql="INSERT INTO datos(usuario,contraseña,nombre,apellido,correo,telefono)VALUES ('$usuario','$hash','$nombre','$apellido','$email','$telefono')";
            }

            if(isset($_POST['registro'])){
               $resultado=mysqli_query($conexion,$sql);
               //la variable $resultado guarda el resultado de la conexion con la base de datos
               if(!$resultado) {
                   die("Error al ejecutar la consulta: " . mysqli_error());
               }else{
                   echo "<br>"."Datos insertados correctamente"."<br>";
               }
            }
            if(isset($_POST['login'])){
                //los datos del usuario se mostrarán unicamente cuando estemos en el login
                include('Datos.php');
            }
            
        }
        

    //    if (password_verify($password, $hash)) {
            // La contraseña coincide con el hash
    //    } else {
            // La contraseña no coincide con el hash
    //    }
 
        $conexion->close();
    }

?>