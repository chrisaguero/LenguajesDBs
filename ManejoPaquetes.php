<?php 
	session_start();
    include 'Menu.php'; 
?>

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

    <!-- Header -->
    <?php //no es necesario recalcular porque si llegó aqui es porque sí es admin
				MostrarHeaderAdmin(); 
		?>

    <!-- Container  -->
    <section id="ManejoPaquetes" class="content">


        <div class="container-fluid">
            <!-- tabla con paquetes -->
            <header>
                <br>
                <br>
                <br>
                <h2>
                    <div align="center"> Manejo de Paquetes </div>
                </h2>
            </header>
            <div class="row">

                <div class="col-2">
                </div>
                <div class="col-8">
                    <table id="TablaPaquetes" class="table table-bordered table-hover table-dark">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fecha Inicial</th>
                                <th>Fecha Final</th>
                                <th>Hotel</th>
                                <th>Ubicación</th>
                                <th>Precio</th>
                            </tr>
                        </thead>
                        <tbody id="TablaPaquetesBody">
                        </tbody>
                    </table>
                </div>
                <div class="col-2">
                </div>
            </div>
            <div align="center"> 
                <a href="insertarpaquete.php" class="button">Crear Paquete de Viaje</a>
            </div>
            <br>
            

        </div>

    </section>


    <!-- Footer -->

    <?php MostrarFooter(); ?>


    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/jquery.dropotron.min.js"></script>
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/login.js"></script>
    <script>
    $(document).ready(function() {

        $.ajax({
            type: "POST",
            url: "ConsultasDB.php",
            data: {
                "CargarPaquetesAdmin": "CargarPaquetesAdmin"
            },
            success: function(response) {
                $("#TablaPaquetesBody").html(response);
            },
            error: function(err) {
                alert("Se presentó un error al consultar los datos de usuarios.");
            },
        });
    });
    </script>



</body>



</html>