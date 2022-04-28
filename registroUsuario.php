<?php
  include "ConsultasDB.php";
  include 'Menu.php'; 

  if(isset($_POST['SignUp']))
  {
		$pass = $_POST['xpass'];
		$mail = $_POST['xmail'];
		$name = $_POST['xname'];
		$username = $_POST['xusername'];
    $phone = $_POST['xphone'];
		$resultado = CrearUsuario($pass,$mail,$name,$username,$phone);

    if ($resultado == 200){
      echo '
            <script>
                alert("Usuario registrado. Volviendo a página de Log In.");
                window.location = "index.php";
            </script>
            ';
      exit;
    }else{
      echo '
            <script>
                alert("Ha ocurrido un error, valide los datos o intente más tarde.");
            </script>
            ';
            exit;
    }
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

    <?php 
      basicHeader();//solo para mostrar un header xq aun no esta logueado
    ?>

    <section id="signUp" class="content">
        <div class="container">
            <header>
                <h2>
                    <div align="center"> Registrándose </div>
                </h2>
            </header>
            <form method="POST">

                <input type="text" styleClass="user" id="xusername" name="xusername" placeholder="Nombre de usuario" required>
                <br>
                <input type="text" styleClass="nombre" id="xname" name="xname" placeholder="Nombre Completo" required>
                <br>
                <input type="password" styleClass="password" id="xpass" name="xpass" placeholder="Nueva contraseña" required>
                <br>
                <input type="text" styleClass="mail" id="xmail" name="xmail" placeholder="Correo electronico" required>
                <br>
                <input type="text" styleClass="phone" id="xphone" name="xphone" placeholder="Número de Teléfono" required>
                <br>
                
                <div class="col-4 col-12-xsmall">
                    <input type="submit" value="Crear Usuario" id="SignUp" name="SignUp" class="fit primary">
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

</body>

</html>