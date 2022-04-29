<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->

<?php 
    	session_start();
        include 'Menu.php'; 
    include 'ConsultasDB.php';


        if(isset($_POST['CrearPV']))
    {
        $alojam = $_POST["ComboBoxAlojamientos"];
        $fechaInicio = date('Y-m-d', strtotime($_POST["fechaInicio"]));
        $fechaFinal = $_POST["fechaFinal"];
        $lugar = $_POST["ComboBoxAlojamientos"];
        $precio = $_POST["txtpre"];
        $intAlojam = (int) $alojam;
        $intLugar = (int) $lugar;
        $intPrecio = (int) $precio;
        $respuesta = InsertarPaquete($intAlojam, $fechaInicio, $fechaFinal, $intLugar, $intPrecio);
        
    }  
        
        
    
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
        <?php //no es necesario recalcular porque si llegó aqui es porque sí es admin
				MostrarHeaderAdmin(); 
		?>

        <!-- Main -->
        <section id="signUp" class="content">
            <div class="container">
                <header>
                    <h2>
                        <div align="center"> Creando Paquete de Viajes </div>
                    </h2>
                </header>
                <form method="POST">

                    <label for="fechaInicio">Fecha de Inicio</label>
                    <input type="date" id="fechaInicio" name="fechaInicio" value="<?php echo date('d-m-Y'); ?>" />
                    <br>
                    <br>
                    <label for="fechaFinal">Fecha Final</label>
                    <input type="date" id="fechaFinal" name="fechaFinal" value="<?php echo date('d-m-Y'); ?>" />
                    <br>
                    <br>
                    <select id="ComboBoxAlojamientos" name="ComboBoxAlojamientos" class="form-control"
                        required></select>
                    <!--required se puede?-->
                    <br>
                    <select id="ComboBoxUbicaciones" name="ComboBoxUbicaciones" class="form-control" required></select>
                    <br>
                    <input type="text" id="txtpre" name="txtpre" class="form-control" placeholder="Precio" required>
                    <br>

                    <div align="center">
                        <input type="submit" value="Crear Paquete de Viaje" id="CrearPV" name="CrearPV">
                        <a href="ManejoPaquetes.php" class="button">Volver</a>
                    </div>
                    <br>

                </form>
            </div>
        </section>

        <!-- Footer -->
        <footer id="footer">
            <ul class="icons">
                <li><a href="#" class="icon brands alt fa-twitter"><span class="label">Twitter</span></a></li>
                <li><a href="#" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a></li>
                <li><a href="#" class="icon brands alt fa-linkedin-in"><span class="label">LinkedIn</span></a></li>
                <li><a href="#" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>
                <li><a href="#" class="icon brands alt fa-github"><span class="label">GitHub</span></a></li>
                <li><a href="#" class="icon solid alt fa-envelope"><span class="label">Email</span></a></li>
            </ul>
            <ul class="copyright">
                <li>&copy; Turisticos. Todos los derechos reservados.</li>
            </ul>
        </footer>

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
    <script>
    $(document).ready(function() {
        $.ajax({
            type: "POST",
            url: "ConsultasDB.php",
            data: {
                "LlenarComboAlojamientos": "LlenarComboAlojamientos"
            },
            success: function(response) {
                $("#ComboBoxAlojamientos").html(response);
            },
            error: function(err) {
                alert("Se presentó un error al consulta los datos");
            },
        });

        $.ajax({
            type: "POST",
            url: "ConsultasDB.php",
            data: {
                "LlenarComboUbicaciones": "LlenarComboUbicaciones"
            },
            success: function(response) {
                $("#ComboBoxUbicaciones").html(response);
            },
            error: function(err) {
                alert("Se presentó un error al consulta los datos");
            },
        });
    });
    </script>
</body>

</html>