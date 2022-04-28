<?php 
    session_start();
    include "ConsultasDB.php";
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
    <div id="page-wrapper">

        <!-- Header -->
        <?php //Carga header especifico basado en rol de usuario 
			if ($_SESSION["rol"] == '999'){
				MostrarHeaderAdmin(); 
			}elseif($_SESSION["rol"] == '0'){
				MostrarHeaderCliente();
			}
		?>

        <!-- Container Login -->
        <section id="login" class="content">
            <div class="container">
                <header>
                    <h2>
                        <div align="center"> Ubicaciones</div>
                    </h2>
                </header>

                <!-- Tabla Paquetes de Viaje -->
                <div class="container">
                    <table id="Tablaubicaciones" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Ubicacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php ConsultarUbicaciones(); ?>
                        </tbody>
                    </table>
                </div>
                <a href="insertarubicacion.php" class="button primary">Registrar una Nueva Ubicacion</a>
                <br><br>
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




</body>



</html>