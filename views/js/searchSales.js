$(buscar_datos());

function buscar_datos(consulta) {
  var dataS = 'consulta=' + consulta;
  $.ajax({
    url: '../models/buscar.php',
    type: 'POST',
    dataType: 'html',
    data: dataS,
  })
    .done(function (respuesta) {
      $("#datos").html(respuesta);
    })
    .fail(function () {
      console.log("error");
    });
}


$(document).on('keyup', '#caja_busqueda', function () {
  var valor = $(this).val();
  if (valor != "") {
    buscar_datos(valor);
  } else {
    buscar_datos();
  }
});