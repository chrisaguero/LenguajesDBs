<?php
session_start();
include 'Menu.php';
include 'ConsultasDB.php';

if (isset($_POST['btnReservar'])) //Si le dio click al botón, lo reconoce por "name="
{
    $idPaquete = $_POST["DropdownUbicaciones"];
    $UserID = $_SESSION["loggedUserID"];
    $totalReserva = $_POST["txtPrecioTotal"];
    $UserIDint = (int) $UserID;
    $idPaqueteint = (int) $idPaquete;
    $totalReservaint = (int) $totalReserva;
    $correo = $_SESSION["emailRegistered"];
    $nombreUsuario = $_SESSION["nombreUsuario"];

    $respuesta = ReservarPaquete($idPaqueteint, $UserIDint, $totalReservaint); //revisa si la respuesta a la base de datos fue exitosa o hubo error

    if ($respuesta == "") //si la respuesta del try / catch es vacio, mande un correo y devuelva al index
    {
        SendEmailReservacion($correo,"Confirmación de Reserva", "
        Estimado(a) .$nombreUsuario.
		Su reservación ha sido exitosa" );
    }
}
?>

<!DOCTYPE HTML>

<html>

<head>
    <title>TurísTicos</title>
    <link rel="shortcut icon" href="images/TurisTicos.png" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <noscript>
        <link rel="stylesheet" href="assets/css/noscript.css" />
    </noscript>
</head>

<body class="is-preload">
    <div id="page-wrapper">

        <!-- Header -->
        <?php //Carga header especifico basado en rol de usuario 
        if ($_SESSION["rol"] == '999') {
            MostrarHeaderAdmin();
        } elseif ($_SESSION["rol"] == '0') {
            MostrarHeaderCliente();
        }
        ?>


        <!-- Main -->
        <div id="main" class="wrapper style1">
        <form action="" method="POST">
            <div class="container">
                <header class="major">
                    <h2>Reservaciones</h2>
                    <p>¿Sabia usted que se se encuentra más cerca de su próxima <b>experiencia</b>?</p>

                    <hr />

                    <p>Ayudanos a elegir tu destino y te daremos los detalles</p>
                </header>

                <nav class="navbar navbar-expand-lg navbar-light bg-light">

                    <div class="col-4">


                        <select class="btn btn-secondary" id="DropdownUbicaciones" name="DropdownUbicaciones" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onchange="ConsultaFechaS(event), ConsultaFechaR(event), ConsultaIDalojamiento(event), ConsultaPrecio(event); "> </select>

                    </div>


            </div>
            <br></br>
            <div class="container ">

                <div class="col-2">
                </div>
                <div class="col-8">
                    <p> <b>Fechas disponibles</b></p>
                    <div class="row">
                        <div class="col-4">
                            <label for="formGroupExampleInput">Fecha de salida</label>
                            <input type="text" id="txtFechaS" name="txtFechaS" class="form-control" placeholder=" / / " readonly>

                        </div>
                        <div class="col-4">
                            <label for="formGroupExampleInput">Fecha de regreso</label>
                            <input type="text" id="txtFechaR" name="txtFechaR" class="form-control" placeholder=" / / " readonly>

                        </div>


                    </div>
                    <br></br>
                    <div class="col-4">
                        <label for="formGroupExampleInput">Hospedandose en</label>
                        <input type="text" id="txtAlojamiento" name="txtAlojamiento" class="form-control" placeholder=" " readonly>



                    </div>
                    <br></br>
                    <div class="row">
                        <div class="col-4">
                            <label for="formGroupExampleInput">Precio + IVA</label>
                            <input type="text" id="txtPrecioTotal" name="txtPrecioTotal" class="form-control" placeholder="0.00" readonly>

                        </div>
                    </div>
                    <br></br>
                    <div class="col-8">
                        <p>¿<b>Le gustó</b>?</p>
                        <input type="submit" class="primary" value="Click para Reservar" id="btnReservar" name="btnReservar">
                    </div>
                </div>
                <div class="col-2">

                </div>
            </div>

            <div class="container ">

                <hr />

            </div>
        </form>
        </div>

    </div>
    </div>

    <!-- Footer -->
    <?php MostrarFooter(); ?>

    </div>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/jquery.dropotron.min.js"></script>
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/reservaciones.js"></script>


</body>

</html>