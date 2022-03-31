<?php

function ConectarBaseDatos()
{
    $servidor = "localhost/orcl";
    $usuario = "root";
    $clave = "root";

    return oci_connect($usuario, $clave, $servidor);
}

function CerrarBaseDatos($enlace)
{
    oci_close($enlace);
}

?>