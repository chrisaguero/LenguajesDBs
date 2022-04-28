<?php
session_start();
include "ConsultasDB.php";
include 'Menu.php'; 
?>

<html>

<head>
    <title>Registro Ubicacion</title>
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

        <!-- Main -->
        <div class="container">
            <table id="TablaUbicacion" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ubicacion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
        ConsultarUbicaciones();
      ?>
                </tbody>
            </table>
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

</body>

</html>