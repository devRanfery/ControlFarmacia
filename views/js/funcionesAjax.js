/*Para actualizar nuestros datos se ejecuta la siguiente funcion
la cual por medio de una consulta ajax llama a nuestra funcion
de la clase ProdutosController para actualizar nuestros valores
ingresados en el formulario de actualizacion */
$(function () {
  $(document).ready(function () {
    $('.update').on('click', function (e) {
      e.preventDefault()
      var id = $(this).attr('id')
      // alert(id)
      // $('#UpdateProducts').modal('show');
      var dataS = 'id=' + id;
      $.ajax({
        type: "POST",
        url: "../ajax/getAllProductForId.php",
        data: dataS,
        success: function (response) {
          console.log(response)
          data = $.parseJSON(response);
          console.log(data)

          if (data.length > 0) {
            $('#idProduct').val(data[0]['idproductos']);
            $('#descripcion').val(data[0]['descripcion']);
            $('#precio').val(data[0]['precio']);
            $('#cantidad').val(data[0]['cantidad']);
            $('#imagen').val(data[0]['imagen']);
            $('#estatus').val(data[0]['estatus']);
            $('#categoria').val(data[0]['categoria_FK']);
            //$('#imagen').val(data[0]['Imagen']);
          }
        }

      });
    });
  });
});

// [{
//   "0": "2",
//   "idproductos": "2",
//   "1": "toallas sanitarias",
//   "descripcion": "toallas sanitarias",
//   "2": "100.88",
//   "precio": "100.88",
//   "3": "200",
//   "cantidad": "200",
//   "4": null,
//   "imagen": null,
//   "5": "1",
//   "estatus": "1",
//   "6": "2",
//   "categoria_FK": "2"
// }]

// [{ 
// "Id": 1, 
// "Descripcion": "Tacos de Comal",
//  "Precio": "10.00", 
//  "Imagen": "Tacos de Comal.jpg",
//   "Estatus": 1, 
//   "Categoria": 1 }]