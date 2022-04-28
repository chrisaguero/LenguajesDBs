<?php 
    
    include 'ConsultasDB.php';
    $idubi = $_GET['q'];

    if(isset($idubi))
    {

        $respuesta = EliminarUbicacion($idubi);
        echo $respuesta;
        var_dump($respuesta);

        if ($respuesta == null){
            echo '
                  <script>
                      alert("Ubicacion Eliminada Correctamente. Refrescando Página.");
                      window.location = "ubicaciones.php";
                  </script>
                  ';
            exit;
          }else{
            echo '
                  <script>
                      alert("Ha ocurrido un error, valide los datos o intente más tarde.");
                      window.location = "ubicaciones.php";
                  </script>
                  ';
                  exit;
          }
    } 
    
        
        
    ?>