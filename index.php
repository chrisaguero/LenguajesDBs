<?php
    $_SESSION["rol"]='';//limpia rol anterior en caso de haber hecho click en salir en el menu
    session_start();
    include 'Menu.php';
	include 'ConsultasDB.php';
    

	if(isset($_POST['BotonLogIn']))
    {
		
        $user = $_POST['xuser'];
		$pass = $_POST['xpass'];
		$UsuarioLoggueado = ConsultarUsuario($user,$pass);
        
		
		if($UsuarioLoggueado["IDROL"] == 999 || $UsuarioLoggueado["IDROL"] == 0) //999 es admin, 0 es cliente
		{ 
            $_SESSION["loggedUser"]=$_POST['xuser'];
            $_SESSION["loggedUserID"]=$UsuarioLoggueado["IDUSUARIO"];
            $_SESSION["emailRegistered"]=$UsuarioLoggueado["CORREO"];
            $_SESSION["nombreUsuario"]=$UsuarioLoggueado["NOMBRE_USUARIO"];
            $_SESSION["rol"]=$UsuarioLoggueado["IDROL"];

			header("location: principal.php");
        }else{
            echo '
            <script>
                alert("Usuario o contraseña incorrectos, valide los datos.");
                window.location = "index.php";
            </script>
            ';
            exit;
            
        }

       
    }
?>

<html>

<head>
    <title>Iniciar Sesión</title>
    <link rel="shortcut icon" href="images/TurisTicos.png" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <noscript>
        <link rel="stylesheet" href="assets/css/noscript.css" />
    </noscript>
</head>

<body class="is-preload">
   

    <?php 
        basicHeader();
    ?>

    <!-- Container Login -->
    <section id="login" class="content">
        <div class="container">
            <header>
                <h2><div align="center"> Iniciar Sesión </div></h2>
            </header>
            <form method="POST">

                <input type="text" styleClass="user" id="xuser" name="xuser" placeholder="Nombre de usuario" required>
                <br>
                <input type="password" styleClass="password" id="xpass" name="xpass" placeholder="Contraseña" required>
                <br>
                <div class="col-4 col-12-xsmall">
                    <input type="submit" value="Log In" id="BotonLogIn" name="BotonLogIn" class="fit primary">
                </div>
                <br>
                <div class="registrarse"> ¿No tiene cuenta? <a href="registroUsuario.php">Registrese</a>
                </div>
                <br>
            </form>
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
