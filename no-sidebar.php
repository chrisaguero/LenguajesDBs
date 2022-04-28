<?php 
session_start();
    include 'Menu.php'; 
  
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
			if ($_SESSION["rol"] == '999'){
				MostrarHeaderAdmin(); 
			}elseif($_SESSION["rol"] == '0'){
				MostrarHeaderCliente();
			}
		?>
			<!-- Main -->
				<div id="main" class="wrapper style1">
					<div class="container">
						<header class="major">
							<h2>¿Por qué es necesario viajar?</h2>
							<p>Desde la perspectiva de una persona promedio.</p>
						</header>

						<!-- Content -->
							<section id="content">
								<a href="#" class="image fit"><img src="images/pic07.jpg" alt="" /></a>
								<h3>Cuando hemos pasado por suficiente pero no nos damos cuenta.</h3>
								<p>Trabajando, estudiando, siendo padre de familia, la vida en general etc. pueden ser circunstancias que nos pueden agotar física y psicologícamente.</p>
								<p>No es hasta que nos sentimos agotados físicamente que decimos que necesitamos un descanso, que usualmente es de unas horas viendo una serie o yendo a comer algo.</p>
								<p>Esto puede llegar a ayudar pero un descanso total para nuestra salud deberia de ser de al menos una semana.</p>
								<h3>Beneficios de estar descansado</h3>
								<p>Entre muchas de las cosas que se sienten de estar descansado física y mentalmente, tambíen no notamos muchas otras entre las cuales están.</p>
								<ul>
									<li>Estamos en un mejor estado de ánimo.</li>
									<li>Realizamos mejor las tareas del día a día.</li>
									<li>Nuestra mente recuerda más facílmente las cosas.</li>
									
								</ul>
							</section>

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