<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->

<?php 
    session_start();
    include 'ConsultasDB.php';
    include 'Menu.php';
    $iden = $_GET['q'];

    if(isset($_POST['btnEditar']))
    {
        $id = $_REQUEST["q"];
        $fechaInicio = $_POST["txtFechaInicio"];
        $fechaFinal = $_POST["txtFechaFinal"];
        $idLugar = $_POST["txtLugar"];
        $alojamiento = $_POST["txtAlojamiento"];
        $precio = $_POST["txtPrecio"];
        
        $alojamientoInt = (int) $alojamiento;
        $idLugarInt = (int) $idLugar;
        $precioInt = (int) $precio;
        $idInt = (int) $id;

        $respuesta = ModificarPaquete($alojamientoInt, $fechaFinal, $fechaInicio, $idLugarInt, $precioInt, $idInt);
    } 
    

    $paquete = ConsultarPaquete($iden);
    if($paquete == null)
    {
        header("location: index.php");
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
        <?php //Carga header especifico basado en rol de usuario 
			    if ($_SESSION["rol"] == '999'){
				    MostrarHeaderAdmin(); 
			    }elseif($_SESSION["rol"] == '0'){
				    MostrarHeaderCliente();
			    }
		    ?>

        <!-- Main -->


        <!-- Content -->



        <form method="POST">
            <div class="row">
                <div class="col-6 col-12-small">
                    <span class="input-group-text" id="basic-addon1">ID</span>
                    <input type="text" id="txtID" name="txtID" class="form-control" placeholder="ID" required
                        value="<?php echo $paquete["id"] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-12-small">
                    <span class="input-group-text" id="basic-addon1">Fecha de Inicio (yyyy-mm-dd)</span>
                    <input type="text" id="txtFechaInicio" name="txtFechaInicio" class="form-control"
                        placeholder="Fecha Inicio" required value="<?php echo $paquete["FECHA_INICIO"] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-12-small">
                    <span class="input-group-text" id="basic-addon1">Fecha Finalización (yyyy-mm-dd)</span>
                    <input type="text" id="txtFechaFinal" name="txtFechaFinal" class="form-control" placeholder="Fecha Final" required
                        value="<?php echo $paquete["FECHA_FINAL"] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-12-small">
                    <span class="input-group-text" id="basic-addon1">ID Lugar</span>
                    <input type="text" id="txtLugar" name="txtLugar" class="form-control" placeholder="Lugar" required
                        value="<?php echo $paquete["lugar"] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-12-small">
                    <span class="input-group-text" id="basic-addon1">ID Alojamiento</span>
                    <input type="text" id="txtAlojamiento" name="txtAlojamiento" class="form-control" placeholder="Alojamiento" required
                        value="<?php echo $paquete["alojamiento"] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-12-small">
                    <span class="input-group-text" id="basic-addon1">Precio</span>
                    <input type="text" id="txtPrecio" name="txtPrecio" class="form-control" placeholder="Precio" required
                        value="<?php echo $paquete["precio"] ?>">
                </div>
            </div>
  
            <br />
            <div class="row">
                <div class="col-4">
                    <input type="submit" value="Editar" id="btnEditar" name="btnEditar">
                </div>

            </div>
        </form>


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
    ,<script>
    function Revisar(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode < 48 || charCode > 57)
            return false;

        return true;
    }
    </script>

</body>

</html>