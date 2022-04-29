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

    try {
        $enlace = oci_connect("turisticos","turisticos","localhost/orcl");            
        $sentencia = oci_parse("begin CargarUbicaciones(); end;");
        $respuesta = oci_execute($sentencia);
        
        while($item = oci_fetch_array($sentencia, OCI_ASSOC+OCI_RETURN_NULLS)){
            echo "<tr>";
            echo "<td>" . $item["NOMBRE_LUGAR"] . "</td>";
            echo "</tr>";
        }
    }
    catch(Exception $ex)
    {
            $respuesta = oci_error();
            
    }
    oci_free_statement($sentencia);
    oci_close($enlace);



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

    try {
        $enlace = oci_connect("turisticos","turisticos","localhost/orcl");            
        $sentencia = oci_parse("begin LlenarComboUbicaciones(); end;");
        $respuesta = oci_execute($sentencia);
        echo '<option value=0>Seleccione Ubicación</option>';
        while($item = oci_fetch_array($sentencia, OCI_ASSOC+OCI_RETURN_NULLS)){
            echo '<option value="' . $item["IDUBICACION"] . '">' . $item["NOMBRE_LUGAR"] . '</option>';
        }
    }
    catch(Exception $ex)
    {
            $respuesta = oci_error();
            
    }
    oci_free_statement($sentencia);
    oci_close($enlace);


}

//Llena combobox alojamientos/hoteles
function LlenarComboAlojamientos()
{
    try {
        $enlace = oci_connect("turisticos","turisticos","localhost/orcl");            
        $sentencia = oci_parse("begin llenarComboBoxAlojamientos(); end;");
        $respuesta = oci_execute($sentencia);
        echo '<option value=0>Seleccione Hotel</option>';
        while($item = oci_fetch_array($sentencia, OCI_ASSOC+OCI_RETURN_NULLS)){
            echo '<option value="' . $item["IDHOTEL"] . '">' . $item["NOMBRE_HOTEL"] . '</option>';
        }
    }
    catch(Exception $ex)
    {
            $respuesta = oci_error();
            
    }
    oci_free_statement($sentencia);
    oci_close($enlace);


    
}

//Index - Llena la tabla con hoteles
function CargarHoteles()
{
    try {
        $enlace = oci_connect("turisticos","turisticos","localhost/orcl");            
        $sentencia = oci_parse("begin CargarHoteles(); end;");
        $respuesta = oci_execute($sentencia);

        while($item = oci_fetch_array($sentencia, OCI_ASSOC+OCI_RETURN_NULLS)){
      echo "<tr>";
      echo "<td>" . $item["NOMBRE_HOTEL"] . "</td>";
      echo "</tr>";
    }
    }
    catch(Exception $ex)
    {
            $respuesta = oci_error();
            
    }
    oci_free_statement($sentencia);
            oci_close($enlace);


    
}

//Index - Llena la tabla con usuarios
function CargarUsuarios()
{
    try {
        $enlace = oci_connect("turisticos","turisticos","localhost/orcl");            
        $sentencia = oci_parse("begin ConsultarUsuarios(); end;");
        $respuesta = oci_execute($sentencia);

        while($item = oci_fetch_array($sentencia, OCI_ASSOC+OCI_RETURN_NULLS)){
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

        oci_free_statement($sentencia);
        oci_close($enlace);
        if ($respuesta){
            return $respuesta;
        }
    }
    catch(Exception $ex)
    {
            $respuesta = oci_error();
            return 505;
    }
            oci_close($enlace);


}

function ConsultarUsuario($user,$pass){

try {
    $enlace = oci_connect("turisticos","turisticos","localhost/orcl");            
    $sentencia = oci_parse("begin ValidarUsuario(':user',':pass'); end;");
    oci_bind_by_name($sentencia, ':user', $user);
    oci_bind_by_name($sentencia, ':pass', $pass);
    $respuesta = oci_execute($sentencia);
    oci_free_statement($sentencia);
    oci_close($enlace);
    if ($respuesta){
        return $respuesta;
    }
}
catch(Exception $ex)
{
        $respuesta = oci_error();
        return 505;
}
        oci_close($enlace);
}

function CrearUsuario($pass,$mail,$name,$username,$phone){

    $respuesta = "";
    try {
            $enlace = oci_connect("turisticos","turisticos","localhost/orcl");            
            $sentencia = oci_parse($enlace, "begin CrearUsuario(:idrol, :name, :username, :pass, :phone, :mail); end;");

            $rol = 999;
            oci_bind_by_name($sentencia, ':idrol', $rol);
            oci_bind_by_name($sentencia, ':name', $name);
            oci_bind_by_name($sentencia, ':username', $username);
            oci_bind_by_name($sentencia, ':pass', $pass);
            oci_bind_by_name($sentencia, ':phone', $phone);
            oci_bind_by_name($sentencia, ':mail', $mail);

            $respuesta = oci_execute($sentencia);
            oci_free_statement($sentencia);
            oci_close($enlace);
            if ($respuesta){
                return 200;
            }
            
    }
    catch(Exception $ex)
    {
        $respuesta = oci_error();
        return 505;
    }
        oci_close($enlace);

    
}

//nueva funcion luego de cambios en la tabla
function CargarPaquetes()
{
    
    try {
        $enlace = oci_connect("turisticos","turisticos","localhost/orcl");            
        $sentencia = oci_parse("begin ConsultarPaquetes(); end;");
        $respuesta = oci_execute($sentencia);

        while($item = oci_fetch_array($sentencia, OCI_ASSOC+OCI_RETURN_NULLS)){
            echo "<tr>";
            echo "<td>" . $item["id"] . "</td>";
            echo "<td>" . $item["FECHA_INICIO"] . "</td>";
            echo "<td>" . $item["FECHA_FINAL"] . "</td>";
            echo "<td>" . $item["4"] . "</td>"; // Por alguna razon no desplegaba cuando se usa el nombre del array pero si el index
            echo "<td>" . $item["NOMBRE_LUGAR"] . "</td>";
            echo "<td>" . "$".$item["precio"] . "</td>";
            echo "</tr>";
        }

        oci_free_statement($sentencia);
        oci_close($enlace);

    }
    catch(Exception $ex)
    {
            $respuesta = oci_error();
            
    }
            oci_close($enlace);


}

//nueva funcion luego de cambios en la tabla
function CargarPaquetesAdmin()
{
    try {
        $enlace = oci_connect("turisticos","turisticos","localhost/orcl");            
        $sentencia = oci_parse("begin ConsultarPaquetes(); end;");
        $respuesta = oci_execute($sentencia);

        while($item = oci_fetch_array($sentencia, OCI_ASSOC+OCI_RETURN_NULLS)){
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

        oci_free_statement($sentencia);
        oci_close($enlace);

    }
    catch(Exception $ex)
    {
            $respuesta = oci_error();
            
    }
            oci_close($enlace);

}

//anterior funcion antes de cambios en la tabla
function ConsultarPaquetes()
{
    
    

     try {
        $enlace = oci_connect("turisticos","turisticos","localhost/orcl");            
        $sentencia = oci_parse("begin ConsultarPaquetes(); end;");
        $respuesta = oci_execute($sentencia);

        while($item = oci_fetch_array($sentencia, OCI_ASSOC+OCI_RETURN_NULLS)){

            echo "<tr>";
            echo "<td>" . $item["id"] . "</td>";
            echo "<td>" . $item["lugar"] . "</td>";
            echo "<td>" . $item["alojamiento"] . "</td>";
            echo "<td>" . "$".$item["precio"] . "</td>";
            echo '<td><a href="Editarpaquete.php?q=' . $item["id"] . '" class="button">Editar</a></td>';
            echo '<td><a href="Eliminar.php?q=' . $item["id"] . '" class="button">Eliminar</a></td>';
            echo "</tr>";
        }

        oci_free_statement($sentencia);
        oci_close($enlace);

    }
    catch(Exception $ex)
    {
            $respuesta = oci_error();
            
    }
            oci_close($enlace);

}

function ConsultarHoteles()
{

    try {
        $enlace = oci_connect("turisticos","turisticos","localhost/orcl");            
        $sentencia = oci_parse("begin ConsultarHoteles(); end;");
        $respuesta = oci_execute($sentencia);

        while($item = oci_fetch_array($sentencia, OCI_ASSOC+OCI_RETURN_NULLS)){

            echo "<tr>";
            echo "<td>" . $item["IDHOTEL"] . "</td>";
            echo "<td>" . $item["NOMBRE_HOTEL"] . "</td>";
            echo '<td><a href="Editarhotel.php?q=' . $item["IDHOTEL"] . '" class="button">Editar</a></td>';
            echo '<td><a href="Eliminarhotel.php?q=' . $item["IDHOTEL"] . '" class="button">Eliminar</a></td>';
            echo "</tr>";
        }

        oci_free_statement($sentencia);
        oci_close($enlace);

    }
    catch(Exception $ex)
    {
            $respuesta = oci_error();
            
    }
            oci_close($enlace);


}

function ModificarHotel($idhotel, $nombreh)
{
    $respuesta = "";

    try
    {
        $enlace = ConectarBaseDatos();
        $sentencia = "CALL ModificarHotel(:idhotel, :nombreh);";

        oci_bind_by_name($sentencia, ':idhotel', $idhotel);
        oci_bind_by_name($sentencia, ':nombreh', $nombreh);

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

    try {
        $enlace = oci_connect("turisticos","turisticos","localhost/orcl");            
        $sentencia = oci_parse("begin ConsultarHotel(':ident'); end;");
        oci_bind_by_name($sentencia, ':ident', $ident);
        $respuesta = oci_execute($sentencia);
        oci_free_statement($sentencia);
        oci_close($enlace);
        if ($respuesta){
            return $respuesta;
        }
    }
    catch(Exception $ex)
    {
            $respuesta = oci_error();
    }
            oci_close($enlace);
}
function EliminarHotel($idhotel)
{
    $respuesta = "";


    try {
        $enlace = oci_connect("turisticos","turisticos","localhost/orcl");            
        $sentencia = oci_parse("begin Eliminarhotel(':idhotel'); end;");
        oci_bind_by_name($sentencia, ':idhotel', $idhotel);
        $respuesta = oci_execute($sentencia);
        oci_free_statement($sentencia);
        oci_close($enlace);

    }
    catch(Exception $ex)
    {
            $respuesta = oci_error();
    }
            oci_close($enlace);
}

function InsertarHotel( $nombreh)
{
    $respuesta = "";


    try {
        $enlace = oci_connect("turisticos","turisticos","localhost/orcl");            
        $sentencia = oci_parse("begin InsertarHotel(':nombreh'); end;");
        oci_bind_by_name($sentencia, ':nombreh', $nombreh);
        $respuesta = oci_execute($sentencia);
        oci_free_statement($sentencia);
        oci_close($enlace);

    }
    catch(Exception $ex)
    {
            $respuesta = oci_error();
    }
            oci_close($enlace);
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function ConsultarUbicaciones()
{
    try {
        $enlace = oci_connect("turisticos","turisticos","localhost/orcl");            
        $sentencia = oci_parse("begin ConsultarUbicaciones(); end;");
        $respuesta = oci_execute($sentencia);

        while($item = oci_fetch_array($sentencia, OCI_ASSOC+OCI_RETURN_NULLS)){
            echo "<tr>";
            echo "<td>" . $item["IDUBICACION"] . "</td>";
            echo "<td>" . $item["NOMBRE_LUGAR"] . "</td>";
            echo '<td><a href="Editarubicacion.php?q=' . $item["IDUBICACION"] . '" class="button">Editar</a></td>';
            echo '<td><a href="Eliminarubicacion.php?q=' . $item["IDUBICACION"] . '" class="button">Eliminar</a></td>';
            echo "</tr>";
        }

        oci_free_statement($sentencia);
        oci_close($enlace);

    }
    catch(Exception $ex)
    {
            $respuesta = oci_error();
            
    }
            oci_close($enlace);


}

function ModificarUbicacion($idubi, $nombreu)
{


        $respuesta = "";


    try {
        $enlace = oci_connect("turisticos","turisticos","localhost/orcl");            
        $sentencia = oci_parse("begin ModificarUbicacion(':idubi',':nombreu'); end;");
        oci_bind_by_name($sentencia, ':idubi', $idubi);
        oci_bind_by_name($sentencia, ':nombreu', $nombreu);
        $respuesta = oci_execute($sentencia);
        oci_free_statement($sentencia);
        oci_close($enlace);
        return $respuesta;
    }
    catch(Exception $ex)
    {
            $respuesta = oci_error();
    }
            oci_close($enlace);
}

function ConsultarUbicacion($idubi)
{


    try {
        $enlace = oci_connect("turisticos","turisticos","localhost/orcl");            
        $sentencia = oci_parse("begin ConsultarUbicacion(':idubi'); end;");
        oci_bind_by_name($sentencia, ':idubi', $idubi);
        $respuesta = oci_execute($sentencia);

        return $respuesta;
        oci_free_statement($sentencia);
        oci_close($enlace);

    }
    catch(Exception $ex)
    {
            $respuesta = oci_error();
            
    }
            oci_close($enlace);
}

function EliminarUbicacion($idubi)
{


    try {
        $enlace = oci_connect("turisticos","turisticos","localhost/orcl");            
        $sentencia = oci_parse("begin EliminarUbicacion(':idubi'); end;");
        oci_bind_by_name($sentencia, ':idubi', $idubi);
        $respuesta = oci_execute($sentencia);

        return $respuesta;
        oci_free_statement($sentencia);
        oci_close($enlace);

    }
    catch(Exception $ex)
    {
            $respuesta = oci_error();
            
    }
            oci_close($enlace);
}


function InsertarUbicacion( $nombrubi)
{
    $respuesta = "";

    try {
        $enlace = oci_connect("turisticos","turisticos","localhost/orcl");            
        $sentencia = oci_parse("begin InsertarUbicacion(':nombrubi'); end;");
        oci_bind_by_name($sentencia, ':nombrubi', $nombrubi);
        $respuesta = oci_execute($sentencia);

        return $respuesta;
        oci_free_statement($sentencia);
        oci_close($enlace);

    }
    catch(Exception $ex)
    {
            $respuesta = oci_error();
            
    }
            oci_close($enlace);
    
}

function ConsultarPaquete($identific)
{

    $respuesta = "";

    try {
        $enlace = oci_connect("turisticos","turisticos","localhost/orcl");            
        $sentencia = oci_parse("begin ConsultarPaquete(':identific'); end;");
        oci_bind_by_name($sentencia, ':identific', $identific);
        $respuesta = oci_execute($sentencia);

        return $respuesta;
        oci_free_statement($sentencia);
        oci_close($enlace);

    }
    catch(Exception $ex)
    {
            $respuesta = oci_error();
            
    }
            oci_close($enlace);
}


function InsertarPaquete($alojam, $fechaInicio, $fechaFinal, $lugar, $precio)
{


    $respuesta = "";

    try {
        $enlace = oci_connect("turisticos","turisticos","localhost/orcl");            
        $sentencia = oci_parse("begin InsertarPaquete(':alojam',':fechaInicio',':fechaFinal',':lugar',':precio'); end;");
        oci_bind_by_name($sentencia, ':alojam', $alojam);
        oci_bind_by_name($sentencia, ':fechaInicio', $fechaInicio);
        oci_bind_by_name($sentencia, ':fechaFinal', $fechaFinal);
        oci_bind_by_name($sentencia, ':lugar', $lugar);
        oci_bind_by_name($sentencia, ':precio', $precio);
        $respuesta = oci_execute($sentencia);

        oci_free_statement($sentencia);
        oci_close($enlace);

    }
    catch(Exception $ex)
    {
            $respuesta = oci_error();
            
    }
            oci_close($enlace);
}

function EliminarPaquete($iden)
{

    
    $respuesta = "";

    try {
        $enlace = oci_connect("turisticos","turisticos","localhost/orcl");            
        $sentencia = oci_parse("begin EliminarPaquete(':iden'); end;");
        oci_bind_by_name($sentencia, ':iden', $iden);
        $respuesta = oci_execute($sentencia);

        oci_free_statement($sentencia);
        oci_close($enlace);

    }
    catch(Exception $ex)
    {
            $respuesta = oci_error();
            
    }
            oci_close($enlace);


}

function ModificarPaquete($alojamiento, $FECHA_FINAL, $FECHA_INICIO, $lugar, $precio,$id)
{
    $respuesta = "";


    try {
        $enlace = oci_connect("turisticos","turisticos","localhost/orcl");            
        $sentencia = oci_parse("begin ModificarPaquete(':alojamiento',':FECHA_FINAL',':FECHA_INICIO',':lugar',':precio',':id'); end;");
        oci_bind_by_name($sentencia, ':alojamiento', $alojamiento);
        oci_bind_by_name($sentencia, ':FECHA_FINAL', $FECHA_FINAL);
        oci_bind_by_name($sentencia, ':FECHA_INICIO', $FECHA_INICIO);
        oci_bind_by_name($sentencia, ':lugar', $lugar);
        oci_bind_by_name($sentencia, ':precio', $precio);
        oci_bind_by_name($sentencia, ':id', $id);
        $respuesta = oci_execute($sentencia);

        oci_free_statement($sentencia);
        oci_close($enlace);

    }
    catch(Exception $ex)
    {
            $respuesta = oci_error();
            
    }
            oci_close($enlace);
}

function DropdownUbicaciones()
{


    try {
        $enlace = oci_connect("turisticos","turisticos","localhost/orcl");            
        $sentencia = oci_parse("begin ConsultarUbicacionesDropdown(); end;");
        $respuesta = oci_execute($sentencia);
        echo "<option value=0>Seleccione</option>";
        while($item = oci_fetch_array($sentencia, OCI_ASSOC+OCI_RETURN_NULLS)){
            echo "<option value=" . $item["IDUBICACION"] . ">" . $item["NOMBRE_LUGAR"] .  "</option>";
        }

        oci_free_statement($sentencia);
        oci_close($enlace);

    }
    catch(Exception $ex)
    {
            $respuesta = oci_error();
            
    }
            oci_close($enlace);
    
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
        $enlace = oci_connect("turisticos","turisticos","localhost/orcl");            
        $sentencia = oci_parse("begin ConsultarPaqueteConLugar(':idUbicacion'); end;");
        oci_bind_by_name($sentencia, ':idUbicacion', $idUbicacion);
        $paquete = oci_execute($sentencia);

    } catch (Exception $ex) {
        $respuesta = $ex->getMessage();
        oci_close($enlace);
        return $paquete;
    }
    $paqueteEncontrado = oci_fetch_array($paquete, OCI_ASSOC+OCI_RETURN_NULLS);
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
        $enlace = oci_connect("turisticos","turisticos","localhost/orcl");            
        $sentencia = oci_parse("begin ConsultarPaqueteConLugar(':idUbicacion'); end;");
        oci_bind_by_name($sentencia, ':idUbicacion', $idUbicacion);
        $paquete = oci_execute($sentencia);
        
    } catch (Exception $ex) {
        $respuesta = $ex->getMessage();
        oci_close($enlace);
        return $respuesta;
    }
    $paqueteEncontrado = oci_fetch_array($paquete, OCI_ASSOC+OCI_RETURN_NULLS);
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
        $enlace = oci_connect("turisticos","turisticos","localhost/orcl");            
        $sentencia = oci_parse("begin ConsultarPaqueteConLugar(':idUbicacion'); end;");
        oci_bind_by_name($sentencia, ':idUbicacion', $idUbicacion);
        $paquete = oci_execute($sentencia);
        
    } catch (Exception $ex) {
        $respuesta = $ex->getMessage();
        oci_close($enlace);
        return $respuesta;
    }
    $paqueteEncontrado = oci_fetch_array($paquete, OCI_ASSOC+OCI_RETURN_NULLS);
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
        $enlace = oci_connect("turisticos","turisticos","localhost/orcl");            
        $sentencia = oci_parse("begin ConsultarHotel(':idUbicacion'); end;");
        oci_bind_by_name($sentencia, ':idUbicacion', $idUbicacion);
        $paquete = oci_execute($sentencia);

    } catch (Exception $ex) {
        $respuesta = $ex->getMessage();
        oci_close($enlace);
        return $respuesta;
    }
    $paqueteEncontrado = oci_fetch_array($paquete, OCI_ASSOC+OCI_RETURN_NULLS);
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
        $enlace = oci_connect("turisticos","turisticos","localhost/orcl");            
        $sentencia = oci_parse("begin ConsultarPaqueteConLugar(':idUbicacion'); end;");
        oci_bind_by_name($sentencia, ':idUbicacion', $idUbicacion);
        $paquete = oci_execute($sentencia);
    } catch (Exception $ex) {
        $respuesta = $ex->getMessage();
        oci_close($enlace);
        return $respuesta;
    }
    $paqueteEncontrado = oci_fetch_array($paquete, OCI_ASSOC+OCI_RETURN_NULLS);
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
        $enlace = oci_connect("turisticos","turisticos","localhost/orcl");            
        $sentencia = oci_parse("begin ReservarPaquete(':idPaquete',':UserID',':totalReserva'); end;");
        oci_bind_by_name($sentencia, ':idPaquete', $idPaquete);
        oci_bind_by_name($sentencia, ':UserID', $UserID);
        oci_bind_by_name($sentencia, ':totalReserva', $totalReserva);
        $paquete = oci_execute($sentencia);

    } catch (Exception $ex) {
        $respuesta = $ex->getMessage();
    }

    oci_close($enlace);
    return $respuesta;
}


?>
