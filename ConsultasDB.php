<?php
include 'ConexionBD.php';

if (isset($_POST["CargarUsuarios"])) {
    CargarUsuarios();
}
if (isset($_POST["DropdownUbicaciones"])) {
    DropdownUbicaciones();
}
if (isset($_POST["ConsultaFechaS"])) {
    ConsultaFechaS($_POST["idUbicacion"]);
}
if (isset($_POST["ConsultaFechaR"])) {
    ConsultaFechaR($_POST["idUbicacion"]);
}
if (isset($_POST["ConsultaIDalojamiento"])) {
    ConsultaIDalojamiento($_POST["idUbicacion"]);
}
if (isset($_POST["CalcularNombreAlojamiento"])) {
    CalcularNombreAlojamiento($_POST["idAlojamiento"]);
}
if (isset($_POST["ConsultaPrecio"])) {
    ConsultaPrecio($_POST["idUbicacion"]);
}

if(isset($_POST["CargarHoteles"]))
{
    CargarHoteles();
}

if(isset($_POST["CargarUbicaciones"]))
{
    CargarUbicaciones();
}

if(isset($_POST["CargarPaquetesAdmin"]))
{
    CargarPaquetesAdmin();
}

if(isset($_POST["CargarPaquetes"]))
{
    CargarPaquetes();
}

//Index - Llena la tabla con ubicaciones
function CargarUbicaciones()
{
    $enlace = ConectarBaseDatos();
    $sentencia = "CALL CargarUbicaciones();";
    $listaUsuarios = $enlace -> query($sentencia);

    while($item = mysqli_fetch_array($listaUsuarios))
    {
      echo "<tr>";
      echo "<td>" . $item["NOMBRE_LUGAR"] . "</td>";
      echo "</tr>";
    }

    CerrarBaseDatos($enlace);
}

if(isset($_POST["LlenarComboAlojamientos"]))
{
    LlenarComboAlojamientos();
}

if(isset($_POST["LlenarComboUbicaciones"]))
{
    LlenarComboUbicaciones();
}

//Llena combobox alojamientos/hoteles
function LlenarComboUbicaciones()
{
    $enlace = ConectarBaseDatos();
    $sentencia = "CALL LlenarComboUbicaciones();";
    $listaProductos = $enlace -> query($sentencia);
    echo '<option value=0>Seleccione Ubicación</option>';
    while($item = mysqli_fetch_array($listaProductos))
    {
        echo '<option value="' . $item["IDUBICACION"] . '">' . $item["NOMBRE_LUGAR"] . '</option>';
    }

    CerrarBaseDatos($enlace);
}

//Llena combobox alojamientos/hoteles
function LlenarComboAlojamientos()
{
    $enlace = ConectarBaseDatos();
    $sentencia = "CALL llenarComboBoxAlojamientos();";
    $listaProductos = $enlace -> query($sentencia);
    echo '<option value=0>Seleccione Hotel</option>';
    while($item = mysqli_fetch_array($listaProductos))
    {
        echo '<option value="' . $item["IDHOTEL"] . '">' . $item["NOMBRE_HOTEL"] . '</option>';
    }

    CerrarBaseDatos($enlace);
}

//Index - Llena la tabla con hoteles
function CargarHoteles()
{
    $enlace = ConectarBaseDatos();
    $sentencia = "CALL CargarHoteles();";
    $listaUsuarios = $enlace -> query($sentencia);

    while($item = mysqli_fetch_array($listaUsuarios))
    {
      echo "<tr>";
      echo "<td>" . $item["NOMBRE_HOTEL"] . "</td>";
      echo "</tr>";
    }

    CerrarBaseDatos($enlace);
}

//Index - Llena la tabla con usuarios
function CargarUsuarios()
{
    $enlace = ConectarBaseDatos();
    $sentencia = "CALL ConsultarUsuarios();";
    $listaUsuarios = $enlace -> query($sentencia);

    while($item = mysqli_fetch_array($listaUsuarios))
    {
      echo "<tr>";
      echo "<td>" . $item["NOMBRE_USUARIO"] . "</td>";
      echo "<td>" . $item["NOMBRE_COMPLETO"] . "</td>"; 
      echo "<td>" . $item["IDROL"] . "</td>";
      echo "<td>" . $item["CORREO"] . "</td>";
      echo "<td>" . $item["TELEFONO"] . "</td>";
      if ($item["IDROL"] == '0'){
        echo '<td><a href="EditarUsuarios.php?HacerAdmin=' . $item["IDUSUARIO"] . '" class="btn btn-info">Hacer Administrador</a></td>'; //aun no es admin
      }
      if ($item["IDROL"] == '999' && $item["IDUSUARIO"] != '777'){//es admin pero no es el admin principal
        echo '<td><a href="EditarUsuarios.php?QuitarAdmin=' . $item["IDUSUARIO"] . '" class="btn btn-info">Remover Rol Administrador</a></td>'; 
      }
      if ($item["IDUSUARIO"] != '777'){//valida si este es el usuario admin principal si lo es entonces no se puede eliminar
        echo '<td><a href="EditarUsuarios.php?EliminarUsuario=' . $item["IDUSUARIO"] . '" class="btn btn-info">Eliminar Usuario</a></td>';  
      }
      echo "</tr>";
    }

    CerrarBaseDatos($enlace);
}

function ConsultarUsuario($user,$pass){

    $enlace = ConectarBaseDatos();

    $sentencia = "CALL ValidarUsuario('$user','$pass');";
    $usuario = $enlace -> query($sentencia);
    CerrarBaseDatos($enlace);
    return mysqli_fetch_array($usuario);
}

function CrearUsuario($pass,$mail,$name,$username,$phone){

    $respuesta = "";
    try {
            $enlace = ConectarBaseDatos();
            $sentencia = "CALL CrearUsuario('$pass','$mail','$name','$username',$phone);";
            $enlace -> query($sentencia);
            return 200;
    }
    catch(Exception $ex)
    {
        $respuesta = $ex -> getMessage();
        return 505;
    }
        CerrarBaseDatos($enlace);
    
    
}

//nueva funcion luego de cambios en la tabla
function CargarPaquetes()
{
    
     $enlace = ConectarBaseDatos();

     $sentencia = "CALL ConsultarPaquetes();";
     $listaPaquetes = $enlace -> query($sentencia);

     while($item = mysqli_fetch_array($listaPaquetes))
      {
       echo "<tr>";
       echo "<td>" . $item["id"] . "</td>";
       echo "<td>" . $item["FECHA_INICIO"] . "</td>";
       echo "<td>" . $item["FECHA_FINAL"] . "</td>";
       echo "<td>" . $item["4"] . "</td>"; // Por alguna razon no desplegaba cuando se usa el nombre del array pero si el index
       echo "<td>" . $item["NOMBRE_LUGAR"] . "</td>";
       echo "<td>" . "$".$item["precio"] . "</td>";
       echo "</tr>";
         }

     CerrarBaseDatos($enlace);
}

//nueva funcion luego de cambios en la tabla
function CargarPaquetesAdmin()
{
    
     $enlace = ConectarBaseDatos();

     $sentencia = "CALL ConsultarPaquetes();";
     $listaPaquetes = $enlace -> query($sentencia);

     while($item = mysqli_fetch_array($listaPaquetes))
      {
       echo "<tr>";
       echo "<td>" . $item["id"] . "</td>";
       echo "<td>" . $item["FECHA_INICIO"] . "</td>";
       echo "<td>" . $item["FECHA_FINAL"] . "</td>";
       echo "<td>" . $item["4"] . "</td>"; // Por alguna razon no desplegaba cuando se usa el nombre del array pero si el index
       echo "<td>" . $item["NOMBRE_LUGAR"] . "</td>";
       echo "<td>" . "$".$item["precio"] . "</td>";
       echo '<td><a href="Editarpaquete.php?q=' . $item["id"] . '" class="button">Editar</a></td>';
       echo '<td><a href="Eliminar.php?q=' . $item["id"] . '" class="button">Eliminar</a></td>';
       echo "</tr>";
         }

     CerrarBaseDatos($enlace);
}

//anterior funcion antes de cambios en la tabla
function ConsultarPaquetes()
{
    

     $enlace = ConectarBaseDatos();

     $sentencia = "CALL ConsultarPaquetes();";
     $listaPaquetes = $enlace -> query($sentencia);

     while($item = mysqli_fetch_array($listaPaquetes))
      {
       echo "<tr>";
       echo "<td>" . $item["id"] . "</td>";
       echo "<td>" . $item["lugar"] . "</td>";
       echo "<td>" . $item["alojamiento"] . "</td>";
       echo "<td>" . "$".$item["precio"] . "</td>";
       echo '<td><a href="Editarpaquete.php?q=' . $item["id"] . '" class="button">Editar</a></td>';
       echo '<td><a href="Eliminar.php?q=' . $item["id"] . '" class="button">Eliminar</a></td>';
       echo "</tr>";
         }

     CerrarBaseDatos($enlace);
}

function ConsultarHoteles()
{


     $enlace = ConectarBaseDatos();

     $sentencia = "CALL ConsultarHoteles();";
     $listaHoteles = $enlace -> query($sentencia);

     while($item = mysqli_fetch_array($listaHoteles))
      {
       echo "<tr>";
       echo "<td>" . $item["IDHOTEL"] . "</td>";
       echo "<td>" . $item["NOMBRE_HOTEL"] . "</td>";
       echo '<td><a href="Editarhotel.php?q=' . $item["IDHOTEL"] . '" class="button">Editar</a></td>';
       echo '<td><a href="Eliminarhotel.php?q=' . $item["IDHOTEL"] . '" class="button">Eliminar</a></td>';
       echo "</tr>";
         }

     CerrarBaseDatos($enlace);
}

function ModificarHotel($idhotel, $nombreh)
{
    $respuesta = "";

    try
    {
        $enlace = ConectarBaseDatos();
        $sentencia = "CALL ModificarHotel($idhotel, '$nombreh');";
        $enlace -> query($sentencia);
    }
    catch(Exception $ex)
    {
        $respuesta = $ex -> getMessage();
    }

    CerrarBaseDatos($enlace);
    return $respuesta;
}

function ConsultarHotel($ident)
{
    $enlace = ConectarBaseDatos();
    $sentencia = "CALL ConsultarHotel($ident);";
    $hotel = $enlace -> query($sentencia);
    CerrarBaseDatos($enlace);

    return mysqli_fetch_array($hotel);
}
function EliminarHotel($idhotel)
{
    $respuesta = "";

    try
    {
        $enlace = ConectarBaseDatos();
        $sentencia = "CALL Eliminarhotel($idhotel);";
        $enlace -> query($sentencia);
    }
    catch(Exception $ex)
    {
        $respuesta = $ex -> getMessage();
    }

    CerrarBaseDatos($enlace);
    return $respuesta;
}

function InsertarHotel( $nombreh)
{
    $respuesta = "";
try {
        $enlace = ConectarBaseDatos();
        $sentencia = "CALL InsertarHotel( '$nombreh');";
        $enlace -> query($sentencia);
}
catch(Exception $ex)
{
    $respuesta = $ex -> getMessage();
}
    CerrarBaseDatos($enlace);
}

function ConsultarUbicaciones()
{


     $enlace = ConectarBaseDatos();

     $sentencia = "CALL ConsultarUbicaciones();";
     $listaUbicaciones = $enlace -> query($sentencia);

     while($item = mysqli_fetch_array($listaUbicaciones))
      {
       echo "<tr>";
       echo "<td>" . $item["IDUBICACION"] . "</td>";
       echo "<td>" . $item["NOMBRE_LUGAR"] . "</td>";
       echo '<td><a href="Editarubicacion.php?q=' . $item["IDUBICACION"] . '" class="button">Editar</a></td>';
       echo '<td><a href="Eliminarubicacion.php?q=' . $item["IDUBICACION"] . '" class="button">Eliminar</a></td>';
       echo "</tr>";
         }

     CerrarBaseDatos($enlace);
}

function ModificarUbicacion($idubi, $nombreu)
{
    $respuesta = "";

    try
    {
        $enlace = ConectarBaseDatos();
        $sentencia = "CALL ModificarUbicacion($idubi, '$nombreu');";
        $enlace -> query($sentencia);
    }
    catch(Exception $ex)
    {
        $respuesta = $ex -> getMessage();
    }

    CerrarBaseDatos($enlace);
    return $respuesta;
}

function ConsultarUbicacion($idubi)
{
    $enlace = ConectarBaseDatos();
    $sentencia = "CALL ConsultarUbicacion($idubi);";
    $hotel = $enlace -> query($sentencia);
    CerrarBaseDatos($enlace);

    return mysqli_fetch_array($hotel);
}

function EliminarUbicacion($idubi)
{
    $respuesta = "";

    try
    {
        $enlace = ConectarBaseDatos();
        $sentencia = "CALL EliminarUbicacion($idubi);";
        $enlace -> query($sentencia);
    }
    catch(Exception $ex)
    {
        $respuesta = $ex -> getMessage();
    }

    CerrarBaseDatos($enlace);
    return $respuesta;
}


function InsertarUbicacion( $nombrubi)
{
    $respuesta = "";
try {
        $enlace = ConectarBaseDatos();
        $sentencia = "CALL InsertarUbicacion( '$nombrubi');";
        $enlace -> query($sentencia);
}
catch(Exception $ex)
{
    $respuesta = $ex -> getMessage();
}
    CerrarBaseDatos($enlace);
}

function ConsultarPaquete($identific)
{
    $enlace = ConectarBaseDatos();
    $sentencia = "CALL ConsultarPaquete($identific);";
    $paquete = $enlace -> query($sentencia);
    CerrarBaseDatos($enlace);
    
    return mysqli_fetch_array($paquete);
}


function InsertarPaquete($alojam, $fechaInicio, $fechaFinal, $lugar, $precio)
{
    $respuesta = "";
try {
        $enlace = ConectarBaseDatos();
        $sentencia = "CALL InsertarPaquete($alojam, '$fechaInicio', '$fechaFinal', $lugar,$precio);";
        
        $enlace -> query($sentencia);
}
catch(Exception $ex)
{
    $respuesta = $ex -> getMessage();
}
    CerrarBaseDatos($enlace);
}

function EliminarPaquete($iden)
{
    $respuesta = "";
    
    try
    {
        $enlace = ConectarBaseDatos();
        $sentencia = "CALL EliminarPaquete($iden);";
        $enlace -> query($sentencia);
    }
    catch(Exception $ex)
    {
        $respuesta = $ex -> getMessage();
    }

    CerrarBaseDatos($enlace);
    return $respuesta;
}

function ModificarPaquete($alojamiento, $FECHA_FINAL, $FECHA_INICIO, $lugar, $precio,$id)
{
    $respuesta = "";
    
    try
    {
        $enlace = ConectarBaseDatos();
        $sentencia = "CALL ModificarPaquete($alojamiento, '$FECHA_FINAL', '$FECHA_INICIO', $lugar,$precio,$id);";

        $enlace -> query($sentencia);
    }
    catch(Exception $ex)
    {
        $respuesta = $ex -> getMessage();
    }

    CerrarBaseDatos($enlace);
    return $respuesta;
}

function DropdownUbicaciones()
{

    $enlace = ConectarBaseDatos();
    $sentencia = "CALL ConsultarUbicacionesDropdown();";
    $listaUbicaciones = $enlace->query($sentencia);

    echo "<option value=0>Seleccione</option>";

    while ($item = mysqli_fetch_array($listaUbicaciones)) {
        echo "<option value=" . $item["IDUBICACION"] . ">" . $item["NOMBRE_LUGAR"] .  "</option>";
    }

    CerrarBaseDatos($enlace);
}

function ConvertirFecha($fecha)
{
    if ($fecha !== null) {
        $fecha = date("d/m/Y", strtotime($fecha));
    } else {
        $fecha = null;
    }
    return $fecha;
}

function ConsultaFechaS($idUbicacion)
{
    $respuesta = "";
    try {
        $enlace = ConectarBaseDatos($idUbicacion);
        $sentencia = "CALL ConsultarPaqueteConLugar($idUbicacion);";
        $paquete = $enlace->query($sentencia);
    } catch (Exception $ex) {
        $respuesta = $ex->getMessage();
        CerrarBaseDatos($enlace);
        return $respuesta;
    }
    $paqueteEncontrado = mysqli_fetch_array($paquete);
    if ($paqueteEncontrado != null) {
        $fechaS = ConvertirFecha($paqueteEncontrado["FECHA_INICIO"]);
        echo $fechaS;
    } else {
        echo "Sin paquete";
    }
}

function ConsultaFechaR($idUbicacion)
{
    $respuesta = "";
    try {
        $enlace = ConectarBaseDatos($idUbicacion);
        $sentencia = "CALL ConsultarPaqueteConLugar($idUbicacion);";
        $paquete = $enlace->query($sentencia);
    } catch (Exception $ex) {
        $respuesta = $ex->getMessage();
        CerrarBaseDatos($enlace);
        return $respuesta;
    }
    $paqueteEncontrado = mysqli_fetch_array($paquete);
    if ($paqueteEncontrado != null) {
        $fechaR = ConvertirFecha($paqueteEncontrado["FECHA_FINAL"]);
        echo $fechaR;
    } else {
        echo "Sin paquete";
    }
}

function ConsultaIDalojamiento($idUbicacion)
{
    $respuesta = "";
    try {
        $enlace = ConectarBaseDatos($idUbicacion);
        $sentencia = "CALL ConsultarPaqueteConLugar($idUbicacion);";
        $paquete = $enlace->query($sentencia);
    } catch (Exception $ex) {
        $respuesta = $ex->getMessage();
        CerrarBaseDatos($enlace);
        return $respuesta;
    }
    $paqueteEncontrado = mysqli_fetch_array($paquete);
    if ($paqueteEncontrado != null) {
        $alojamientoID = $paqueteEncontrado["alojamiento"];
        echo $alojamientoID;
    } else {
        echo "Sin paquete";
    }
}

function CalcularNombreAlojamiento($idAlojamiento)
{
    $respuesta = "";
    try {
        $enlace = ConectarBaseDatos($idAlojamiento);
        $sentencia = "CALL ConsultarHotel($idAlojamiento);";
        $paquete = $enlace->query($sentencia);
    } catch (Exception $ex) {
        $respuesta = $ex->getMessage();
        CerrarBaseDatos($enlace);
        return $respuesta;
    }
    $paqueteEncontrado = mysqli_fetch_array($paquete);
    if ($paqueteEncontrado != null) {
        $NombreAlojamiento = $paqueteEncontrado["NOMBRE_HOTEL"];
        echo $NombreAlojamiento;
    } else {
        echo "Sin paquete";
    }
}

function ConsultaPrecio($idUbicacion)
{
    $respuesta = "";
    try {
        $enlace = ConectarBaseDatos($idUbicacion);
        $sentencia = "CALL ConsultarPaqueteConLugar($idUbicacion);";
        $paquete = $enlace->query($sentencia);
    } catch (Exception $ex) {
        $respuesta = $ex->getMessage();
        CerrarBaseDatos($enlace);
        return $respuesta;
    }
    $paqueteEncontrado = mysqli_fetch_array($paquete);
    if ($paqueteEncontrado != null) {
        $precio = $paqueteEncontrado["precio"];
        echo $precio;
    } else {
        echo "0.00";
    }
}

function ReservarPaquete($idPaquete, $UserID, $totalReserva)
{
    $respuesta = "";
    try {
        $enlace = ConectarBaseDatos($idPaquete, $UserID, $totalReserva);
        $sentencia = "CALL ReservarPaquete($idPaquete, $UserID, $totalReserva);";
        $enlace->query($sentencia);
    } catch (Exception $ex) {
        $respuesta = $ex->getMessage();
    }

    CerrarBaseDatos($enlace);
    return $respuesta;
}


?>
