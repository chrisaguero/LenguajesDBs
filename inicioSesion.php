<?php
	include 'consultas.php';
	session_start();
	error_reporting(0);
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

          			<!-- Container Login -->
	<section id="login" class="content">
		<div class="container">
			<header>
				<h2>Iniciar Sesión</h2>
				
			</header>
			<form method="POST" id="formularioLogin" class="cta">
				<h:commandButton value="Iniciar Sesión" id="login" styleClass="login"/>
				
				<input type="text" styleClass="user" id="xuser" placeholder="Nombre de usuario" required="">
				<br>
				<input type="password" styleClass="password" id="xpass" placeholder="Contraseña" required="">
				<br>
				<div class="col-4 col-12-xsmall"><input type="submit"  value="Log In" class="fit primary"  onclick="loginOracle2()"/></div>
				<br>
				<div class="registrarse">
					¿No tiene cuenta? <a href="http://localhost:8080/ProyectoMuebleria-1.0/faces/registro.xhtml">Registrese</a>
					<i class="pi pi-chevron-left" onclick="history.go(-1)"></i>
				</div>
			</form>
		</div>
	</section>


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
