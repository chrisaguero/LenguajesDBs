$(document).ready(function () {
  $.ajax({
    type: "POST",
    url: "ConsultasDB.php",
    data: {
      DropdownUbicaciones: "DropdownUbicaciones",
    },
    success: function (response) {
      $("#DropdownUbicaciones").html(response);
    },
    error: function (err) {
      alert("Se presentó un error al consulta los datos");
    },
  });
});


function ConsultaInfoPaquete(event) {
  let idUbicacion = document.getElementById("DropdownUbicaciones").value;
  ConsultaFechaS(idUbicacion);

}

function ConsultaFechaS(event) {
      let idUbicacion = document.getElementById("DropdownUbicaciones").value;
    
      $.ajax({
        type: "POST",
        url: "ConsultasDB.php",
        data: {
          ConsultaFechaS: "ConsultaFechaS", //Pramatro para saber a quien llamo
          idUbicacion: idUbicacion, //Parametro de argumento
        },
        success: function (response) {
          document.getElementById("txtFechaS").value = response;
         //  document.getElementById("txtPrecioTotal").value = "0.00";
        //  CalcularReserva();
        },
        error: function (err) {
          alert("Se presentó un error al consulta los datos");
        },
      });
    }

    function ConsultaFechaS(event) {
      let idUbicacion = document.getElementById("DropdownUbicaciones").value;
    
      $.ajax({
        type: "POST",
        url: "ConsultasDB.php",
        data: {
          ConsultaFechaS: "ConsultaFechaS", //Pramatro para saber a quien llamo
          idUbicacion: idUbicacion, //Parametro de argumento
        },
        success: function (response) {
          document.getElementById("txtFechaS").value = response;
         //  document.getElementById("txtPrecioTotal").value = "0.00";
        //  CalcularReserva();
        },
        error: function (err) {
          alert("Se presentó un error al consulta los datos");
        },
      });
    }

    function ConsultaFechaR(event) {
      let idUbicacion = document.getElementById("DropdownUbicaciones").value;
    
      $.ajax({
        type: "POST",
        url: "ConsultasDB.php",
        data: {
          ConsultaFechaR: "ConsultaFechaR", //Pramatro para saber a quien llamo
          idUbicacion: idUbicacion, //Parametro de argumento
        },
        success: function (response) {
          document.getElementById("txtFechaR").value = response;
         //  document.getElementById("txtPrecioTotal").value = "0.00";
        //  CalcularReserva();
        },
        error: function (err) {
          alert("Se presentó un error al consulta los datos");
        },
      });
    }

    function ConsultaIDalojamiento(event) {
      let idUbicacion = document.getElementById("DropdownUbicaciones").value;
    
      $.ajax({
        type: "POST",
        url: "ConsultasDB.php",
        data: {
          ConsultaIDalojamiento: "ConsultaIDalojamiento", //Pramatro para saber a quien llamo
          idUbicacion: idUbicacion, //Parametro de argumento
        },
        success: function (response) {
         // document.getElementById("txtAlojamiento").value = response;
         //  document.getElementById("txtPrecioTotal").value = "0.00";
        CalcularNombreAlojamiento(response);
        },
        error: function (err) {
          alert("Se presentó un error al consulta los datos");
        },
      });
    }

    function CalcularNombreAlojamiento(idAlojamiento) {
    
      $.ajax({
        type: "POST",
        url: "ConsultasDB.php",
        data: {
          CalcularNombreAlojamiento: "CalcularNombreAlojamiento", //Pramatro para saber a quien llamo
          idAlojamiento: idAlojamiento, //Parametro de argumento
        },
        success: function (response) {
          document.getElementById("txtAlojamiento").value = response;
         //  document.getElementById("txtPrecioTotal").value = "0.00";  
        },
        error: function (err) {
          alert("Se presentó un error al consulta los datos");
        },
      });
    }

    function ConsultaPrecio(event) {
      let idUbicacion = document.getElementById("DropdownUbicaciones").value;
    
      $.ajax({
        type: "POST",
        url: "ConsultasDB.php",
        data: {
          ConsultaPrecio: "ConsultaPrecio", //Pramatro para saber a quien llamo
          idUbicacion: idUbicacion, //Parametro de argumento
        },
        success: function (response) {
         // document.getElementById("txtAlojamiento").value = response;
         //  document.getElementById("txtPrecioTotal").value = "0.00";
         let precioSinIva = response;
         document.getElementById("txtPrecioTotal").value = precioSinIva + (precioSinIva * 13/100);
        },
        error: function (err) {
          alert("Se presentó un error al consulta los datos");
        },
      });
    }


    

