<?php 
    
    include 'ConsultasDB.php';
    $iden = $_GET['q'];

    if(isset($iden))
    {

        $respuesta = EliminarPaquete($iden);
        echo $respuesta;
        var_dump($respuesta);

        if ($respuesta == null){
            echo '
                  <script>
                      alert("Paquete de Viaje Eliminado Correctamente. Refrescando Página.");
                      window.location = "ManejoPaquetes.php";
                  </script>
                  ';
            exit;
          }else{
            echo '
                  <script>
                      alert("Ha ocurrido un error, valide los datos o intente más tarde.");
                      window.location = "ManejoPaquetes.php";
                  </script>
                  ';
                  exit;
          }
     
    } 

    
    
        
        
    ?>