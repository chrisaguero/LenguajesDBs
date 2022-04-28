<?php 
    
    include 'ConsultasDB.php';
    $idhotel = $_GET['q'];

    if(isset($idhotel))
    {

        $respuesta = EliminarHotel($idhotel);
        echo $respuesta;
        var_dump($respuesta);

        if ($respuesta == null){
            echo '
                  <script>
                      alert("Hotel Eliminado Correctamente. Refrescando Página.");
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
        if($respuesta == null)
    {
        header("location: registrohotel.php");
    }
     */
    
        
        
    ?>