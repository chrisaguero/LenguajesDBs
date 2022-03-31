<?php
include 'conBD.php';

    
    $user = isset($_POST['user']) ? $_POST['user'] : '';
    $pass = isset($_POST['pass']) ? $_POST['pass'] : '';

    $enlace = ConectarBaseDatos();

    $sentencia = "CALL ValidarUsuario('$user','$pass');";
    $usuarioRolID = $enlace -> query($sentencia);
    
    if (!empty($usuarioRolID)){
        echo "ok";
        return true;
    }else{
        echo "no ok";
        return false;

    }
    

    CerrarBaseDatos($enlace);


?>