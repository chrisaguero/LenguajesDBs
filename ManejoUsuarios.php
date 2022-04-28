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
    <section id="ManejoUsuarios" class="content">


        <div class="container-fluid">
            <!-- tabla con usuarios -->
            <header>
                <br>
                <br>
                <br>
                <h2>
                    <div align="center"> Manejo de Usuarios </div>
                </h2>
            </header>
            <div class="row">

                <div class="col-2">
                </div>
                <div class="col-8">
                    <table id="TablaUsuarios" class="table table-bordered table-hover table-dark">
                        <thead>
                            <tr>
                                <th>Nombre de Usuario</th>
                                <th>Nombre Completo</th>
                                <th>Rol ID</th>
                                <th>Correo</th>
                                <th>Teléfono</th>
                            </tr>
                        </thead>
                        <tbody id="BodyUsuarios">
                        </tbody>
                    </table>
                </div>
                <div class="col-2">
                </div>
            </div>

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
                "CargarUsuarios": "CargarUsuarios"
            },
            success: function(response) {
                $("#BodyUsuarios").html(response);
            },
            error: function(err) {
                alert("Se presentó un error al consultar los datos de usuarios.");
            },
        });
    });
    </script>



</body>



</html>