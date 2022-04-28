<?php 
	session_start();
    include 'Menu.php'; 

	if (isset($_POST['btnSuscribir'])) 
{

	$email = $_POST["txtemailSuscrip"];

        SendEmailSuscibir($email,"Activación suscripción a Turisticos", "
		Estimado(a) 
		Hemos recibido su solicitud de suscripción");

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

<body class="is-preload landing">
    <div id="page-wrapper">

        <!-- Header -->
        <?php //Carga header especifico basado en rol de usuario 
			if ($_SESSION["rol"] == '999'){
				MostrarHeaderAdmin(); 
			}elseif($_SESSION["rol"] == '0'){
				MostrarHeaderCliente();
			}
		?>

        <!-- Banner -->
        <section id="banner">
            <div class="content">
                <header>
                    <h2>TurísTicos S.A.</h2>
                    <p>Tu próxima experiencia a un click de distancia.</p>
                </header>
                <span class="image"><img src="images/pic01.jpg" alt="" /></span>


                <div class="container">
                    <div class="lbl-menu">
                        <label for="radio1">Hoteles Disponibles</label>
                        <label for="radio2">Ubicaciones Disponibles</label>
                    </div>

                    <div class="content-01">
                        <input type="radio" name="radio" id="radio1">
                        <div class="tab1">
                            <!--tabla para cargar hoteles desde la DB-->
                            <table id="TablaHotel" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            <span class="input-group-text" id="basic-addon1">Nombre Hotel</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="TablaHotelBody">
                                </tbody>
                            </table>
                        </div>

                        <input type="radio" name="radio" id="radio2">
                        <div class="tab2">
                            <table id="TablaUbicaciones" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            <span class="input-group-text" id="basic-addon1">Nombre Ubicación</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="TablaUbicacionesBody">
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <a href="#one" class="goto-next scrolly">Next</a>

        </section>


        <!-- One -->
        <section id="one" class="spotlight style1 bottom">
            <span class="image fit main"><img src="images/pic02.jpg" alt="" /></span>
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-4 col-12-medium">
                            <header>
                                <h2>Objetivo de empresa turística</h2>
                                <p>La empresa brinda una herramienta profesional a todos aquellos que necesiten un
                                    servicio de viaje. </p>
                            </header>
                        </div>
                        <div class="col-4 col-12-medium">
                            <p>Crecer económicamente como empresa turística a través de
                                las ventas de servicios o productos de los más altos estándares
                                de calidad y manteniendo la confiabilidad y fidelidad de nuestros clientes.
                            </p>
                        </div>
                        <div class="col-4 col-12-medium">
                            <p>Llegar ser una Agencia de Viajes reconocida en Costa Rica,
                                por la confianza y seguridad que le ofrecemos a nuestros clientes,
                                presentando el mejor servicio y asegurando una actividad turística estable,
                                promoviendo un buen ambiente y obteniendo la mayor satisfacción de nuestros clientes.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#two" class="goto-next scrolly">Next</a>
        </section>

        <!-- Two -->
        <section id="two" class="spotlight style2 right">
            <span class="image fit main"><img src="images/pic03.jpg" alt="" /></span>
            <div class="content">
                <header>
                    <h2>Nuestros paquetes de viaje</h2>
                    <p>Nos especializamos en crear lo mejores paquetes de viaje para nuestros clientes</p>
                </header>
                <p>Los mejores paquetes de viajes creados por la empresa turistica Turisticos los podrás encontrar aquí,
                    estos cuentan con ubicaciones varias playa o montaña, con las habitaciones según requiera el
                    cliente, transporte y con una serie de actividades.</p>
                <ul class="actions">
                    <li><a href="#" class="button">Learn More</a></li>
                </ul>
            </div>
            <a href="#three" class="goto-next scrolly">Next</a>
        </section>

        <!-- Three -->
        <section id="three" class="spotlight style3 left">
            <span class="image fit main bottom"><img src="images/pic04.jpg" alt="" /></span>
            <div class="content">
                <header>
                    <h2>Realice sus reservaciones en Turisticos</h2>
                    <p>Acá en Turisticos te asesoramos de la mejor manera para que planear tus vacaciones</p>
                </header>
                <p>Contamos con amplia variedad de ubicaciones para realice sus reservaciones en una amplia cartera de
                    hoteles a lo largo del territorio Nacional e Internacional, para que pueda disfrutar de unas
                    vacaciones lujosas y de calidad excepcional.</p>
                <ul class="actions">
                    <li><a href="#" class="button">Learn More</a></li>
                </ul>
            </div>
            <a href="#four" class="goto-next scrolly">Next</a>
        </section>

        <!-- Four -->
        <section id="four" class="wrapper style1 special fade-up">
            <div class="container">
                <header class="major">
                    <h2>Te explicamos por qué somos tu mejor opción</h2>
                    <p></p>
                </header>
                <div class="box alt">
                    <div class="row gtr-uniform">

                        <section class="col-3 col-6-medium col-12-xsmall">
                            <span class="icon solid alt major fa-comment"></span>
                            <h3>Accesible</h3>
                            <p>Promociones y ofertas seleccionadas para ti.</p>
                        </section>
                        <section class="col-3 col-6-medium col-12-xsmall">
                            <span class="icon solid alt major fa-flask"></span>
                            <h3>Rápido y sencillo</h3>
                            <p>Reserva tu viaje de forma rápida y sencilla desde cualquier dispositivo</p>
                        </section>
                        <section class="col-3 col-6-medium col-12-xsmall">
                            <span class="icon solid alt major fa-paper-plane"></span>
                            <h3>Cuenta con nosotros</h3>
                            <p>Agentes especializados te ayudarán a elegir y planificar tus vacaciones para tu disfrute
                            </p>
                        </section>
                        <section class="col-3 col-6-medium col-12-xsmall">
                            <span class="icon solid alt major fa-file"></span>
                            <h3>Soporte</h3>
                            <p>Viaja tranquilo: te ofrecemos gratis asistencia 24 horas en destino los 365 días del año
                            </p>
                        </section>
                    </div>
                </div>
                <footer class="major">
                    <ul class="actions special">
                        <li><a href="#" class="button">Reservar</a></li>
                    </ul>
                </footer>
            </div>
        </section>

        <!-- Five -->
        <form action="" method="POST">
            <section id="five" class="wrapper style2 special fade">
                <div class="container">
                    <header>
                        <h2>Quiero recibir ofertas</h2>
                        <p>Recibiré semanalmente ofertas y promociones pensadas exclusivamente para mi</p>
                    </header>
                    <form method="post" action="#" class="cta">
                        <div class="row gtr-uniform gtr-50">
                            <div class="col-8 col-12-xsmall"><input type="text" name="txtemailSuscrip"
                                    id="txtemailSuscrip" placeholder="Introduce tu e-mail" /></div>
                            <div class="col-4 col-12-xsmall"><input type="submit" value="Suscribirme"
                                    class="fit primary" id="btnSuscribir" name="btnSuscribir" /></div>
                        </div>
                    </form>
                </div>
            </section>
        </form>

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
        <script>
        $(document).ready(function() {

            $.ajax({
                type: "POST",
                url: "ConsultasDB.php",
                data: {
                    "CargarHoteles": "CargarHoteles"
                },
                success: function(response) {
                    $("#TablaHotelBody").html(response);
                },
                error: function(err) {
                    alert("Se presentó un error al consultar los datos de usuarios.");
                },
            });

			$.ajax({
                type: "POST",
                url: "ConsultasDB.php",
                data: {
                    "CargarUbicaciones": "CargarUbicaciones"
                },
                success: function(response) {
                    $("#TablaUbicacionesBody").html(response);
                },
                error: function(err) {
                    alert("Se presentó un error al consultar los datos de usuarios.");
                },
            });
        });
        </script>
</body>

</html>