<?php

function ConectarBaseDatos()
{
    $servidor = "localhost";
    $baseDatos = "id18851198_pubticoautoscrbd";
    $usuario = "id18851198_pubuser";
    $clave = "8/nNznVURsp-IWqj";

    return mysqli_connect($servidor, $usuario, $clave, $baseDatos);
}

function CerrarBaseDatos($enlace)
{
    mysqli_close($enlace);
}

?>