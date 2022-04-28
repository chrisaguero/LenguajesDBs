<?php

include 'ConexionBD.php';


if(isset($_GET["EliminarUsuario"])) 
{
    $userID = $_GET["EliminarUsuario"];

    $respuesta = "";
    try {
        $enlace = ConectarBaseDatos();
        $sentencia = "CALL EliminarUsuario($userID);";
        $usuarioRolID = $enlace -> query($sentencia);
        echo '
            <script>
                alert("Usuario eliminado correctamente.");
                window.location = "ManejoUsuarios.php";
            </script>
            ';
    }
    catch(Exception $ex)
    {
        $respuesta = $ex -> getMessage();
        echo '
            <script>
                alert("Ha ocurrido un error, intente de nuevo o mas tarde. $respuesta");
                window.location = "index.php";
            </script>
            ';
            exit;
        
    }
        CerrarBaseDatos($enlace);
}

if(isset($_GET["QuitarAdmin"])) 
{
    $userID = $_GET["QuitarAdmin"];

    $respuesta = "";
    try {
        $enlace = ConectarBaseDatos();
        $sentencia = "CALL QuitarAdmin($userID);";
        $usuarioRolID = $enlace -> query($sentencia);
        echo '
            <script>
                alert("Usuario editado correctamente.");
                window.location = "ManejoUsuarios.php";
            </script>
            ';
    }
    catch(Exception $ex)
    {
        $respuesta = $ex -> getMessage();
        echo '
            <script>
                alert("Ha ocurrido un error, intente de nuevo o mas tarde. $respuesta");
                window.location = "index.php";
            </script>
            ';
            exit;
        
    }
        CerrarBaseDatos($enlace);
}

if(isset($_GET["HacerAdmin"])) 
{
    $userID = $_GET["HacerAdmin"];

    $respuesta = "";
    try {
        $enlace = ConectarBaseDatos();
        $sentencia = "CALL HacerAdmin($userID);";
        $usuarioRolID = $enlace -> query($sentencia);
        echo '
            <script>
                alert("Usuario editado correctamente.");
                window.location = "ManejoUsuarios.php";
            </script>
            ';
    }
    catch(Exception $ex)
    {
        $respuesta = $ex -> getMessage();
        echo '
            <script>
                alert("Ha ocurrido un error, intente de nuevo o mas tarde. $respuesta");
                window.location = "index.php";
            </script>
            ';
            exit;
        
    }
        CerrarBaseDatos($enlace);
}


?>