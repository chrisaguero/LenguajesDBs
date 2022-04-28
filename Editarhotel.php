
<?php 
    
    include 'ConsultasDB.php';
    $idhotel = $_GET['q'];

    if(isset($_POST['btnEditar']))
    {
        $nombreh = $_POST["txtlug"];

        $respuesta = ModificarHotel($idhotel, $nombreh);

        if ($respuesta == null){
            echo '
                  <script>
                      alert("Hotel Editado Correctamente. Refrescando Página.");
                      window.location = "hoteles.php";
                  </script>
                  ';
            exit;
          }else{
            echo '
                  <script>
                      alert("Ha ocurrido un error, valide los datos o intente más tarde.");
                      window.location = "hoteles.php";
                  </script>
                  ';
                  exit;
          }
    } 
    
/*
    $hotel = ConsultarHotel($idhotel);
    if($hotel == null)
    {
        header("location: index.php");
    }*/
        
        
    
    ?>

<html>

<head>
    <title>Editar Hotel</title>
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
        <header id="header">
            <nav id="nav">
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li>
                    </li>
                    <li><a href="registrohotel.php">Registro Hotel</a></li>
                    <li><a href="insertarhotel.php">Insertar Hotel</a></li>
                </ul>
            </nav>
        </header>

        <!-- Main -->


                <!-- Content -->
                
                        
                    
                <form method="POST">
                            <div class="row">
                                <div class="col-6 col-12-small">
                                <span class="input-group-text" id="basic-addon1">Nombre de Hotel</span>
                                    <input type="text" id="txtlug" name="txtlug" class="form-control"placeholder="Lugar"
                                    required value="<?php echo $hotel["NOMBRE_HOTEL"] ?>">
                                    </div>
                                </div>
                                
                            </div>
                            <br/>
                            <div class="row">
                    <div class="col-4">
                        <input type="submit" value="Editar" id="btnEditar" name="btnEditar">
                    </div>

                        </div>
                        </form>
    
        
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
    ,<script
    >function Revisar(evt)
{
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode < 48 || charCode > 57)
        return false;

    return true;
}
    </script>

</body>

</html>