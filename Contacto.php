<?php 
	session_start();
    include 'Menu.php'; 
    
	if (isset($_POST['btnContacto'])) 
{

	$email = $_POST["txtemailContacto"];

        SendEmailContacto($email,"Hemos recibido su solicitud", "
		Estimado(a) 
		Hemos recibido su solicitud y pronto estaremos en contacto");
        echo 'alert("Hemos recibido su mensaje y pronto estaremos en contacto")';
}

?>

<!DOCTYPE HTML>

<html>

<head>
    <title>Contacto</title>
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
        <section>
            <div class="container">

                <!-- Form -->
                <section>
                    <h3>Contacto</h3>
                    <form action="" method="POST">
                        <div class="row gtr-uniform gtr-50">
                            <div class="col-6 col-12-xsmall">
                                <input type="text" name="txtnombre" id="txtnombre" value="" placeholder="Nombre" />
                            </div>
                            <div class="col-6 col-12-xsmall">
                                <input type="email" name="txtemailContacto" id="txtemailContacto" value="" placeholder="Correo Electrónico" 
                                required/>
                            </div>
                            <div class="col-12">
                                <select name="category" id="category">
                                    <option value="">- Categoria -</option>
                                    <option value="1">Acceso</option>
                                    <option value="1">Informacion</option>
                                    <option value="1">Administration</option>
                                    <option value="1">Otro</option>
                                </select>
                            </div>


                            <div class="col-12">
                                <textarea name="message" id="message" placeholder="Ingrese su mensaje"
                                    rows="6" required></textarea>
                            </div>
                            <div class="col-12">
                                <ul class="actions">
                                    <li><input type="submit" value="Enviar" class="primary" name="btnContacto" id="btnContacto"/></li>
                                    <li><input type="reset" value="Limpiar" /></li>
                                </ul>
                            </div>
                        </div>
                    </form>
            </div>
        </section>

        <!-- Image -->

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