/*const addProducts = () => {
    products.forEach((product, index) => {
        let newProduct = { ...product, img: `https://picsum.photos/id/${index}/300` }
        
    })
}

 <p class="card-text product-description">${value.Descripcion}</p>
*/

//addProducts();

//IMPRIMI LOS PRODUCTOS EN LA VISTA
const printProducts = (productsList) => {
    console.log("printing")
    $(".products-wrapper .row").empty()
    $.each(productsList, (key, value) => {

        $(".products-wrapper .row").append(
            `
                <div class="col-12 col-sm-3">
                    <div class="card product-card mb-3" data-product-key="${value.Id}">
                <div class="text-primary id-venta" style="display:none;">${value.IdVenta}</div>
                    <div class="masCantidad" id="${value.Id}">  
                        <img src="${value.Imagen}" class="card-img-top" alt="img-product">
                    </div>  
                        <div class="card-body">
                            <h5 class="card-title product-name">${value.Descripcion}</h5>
                        
                            <p class="text-primary text-right text-italic"><span class="product-price">${value.Precio}</span></p>
                            <div class="form-group">
                                <label for="">Cantidad</label>
                                <input type="number" class="form-control" value="${value.Cantidad}">
                            </div>
                        </div>
                    </div>
                </div>
            `
        )
    })
}

//FECHA ACTUAL
var cuentanum = $('.idCuenta').attr('id');
var miFechaActual = new Date();
var hora = miFechaActual.getHours() + ':' + miFechaActual.getMinutes() + ':' + miFechaActual.getSeconds() + ':' + miFechaActual.getMilliseconds()

dia = miFechaActual.getDate()
mes = parseInt(miFechaActual.getMonth()) + 1
ano = miFechaActual.getFullYear()

var fechaHora = ano + '-' + mes + '-' + dia + ' ' + hora
// var fecha = ano + '-' + mes + '-' + dia
var fecha = ano + '-' + mes + '-' + dia
$('.divfecha').append("Fecha: " + fecha)




//CONSULTA TODOS LOS PRODUCTOS DE LA BASE DE DATOS PARA IMPRIMIR EN PANTALLA CON LA FUNCION printProducts
const getProducts = () => {
    var IdCuentas = cuentanum
    $.ajax({
        //url: 'https://jquerycrud-ed8dc.firebaseio.com/products/.json',
        url: 'ajaxProducto.php',
        dataType: "json",
        method: 'POST',
        data: { "IdCuentas": IdCuentas },
        success: (response) => {
            console.log(response)
            printProducts(response)
        },
    });
}

getProducts();

//GUARDA CADA UNA DE LA VENTAS POR PRODUCTO EN LA BASE DE DATOS Y ACTUALIZA EL TOTAL DE CUENTA
const saveOrder = (orderObject) => {
    var json = JSON.stringify(orderObject)
    $.ajax({
        //url: 'https://jquerycrud-ed8dc.firebaseio.com/orders/.json',
        url: 'guardar.php',
        method: 'POST',
        data: { "json": json },
        success: (response) => {
            console.log(response);
            alert("Se imprimira su ticket");
            imprSelec('ticket');
            location.reload();
        },
    });
}
//IMPRIMIR TICKET
function imprSelec(nombre) {
    $('#adicionados').css('display:none;')
    var ficha = document.getElementById(nombre);
    var ventimp = window.open(' ', 'popimpr');
    ventimp.document.write(ficha.innerHTML);
    ventimp.document.close();
    ventimp.print();
    ventimp.close();
}

//CREA JSON DE DATOS PARA ENVIARLOS A FUNCION SaveOrder
$("#submit-order").on('click', () => {
    console.log(customerOrder)
    let orderTotal = customerOrder.reduce((sum, i) => {
        console.log(i)
        return sum + (i.precio)
    }, 0)
    console.log('Total a Pagar', parseFloat(orderTotal))
    let orderObject = { customerOrder, orderTotal }
    console.log(orderObject)
    saveOrder(orderObject)
})


//FUNCION PARA AUMENTAR CANTIDAD DE PRODUCTOS EN EL MENU
// $(function () {
//     var a = 0
//     $(document).ready(function () {
//         $('.masCantidad').on('click', function (e) {
//             e.preventDefault()
//             var id = $(this).attr('id')
//             alert(id)
//             var idproducto = 'cantidad' + id
//             var cantidad = document.getElementById(idproducto).value

//             if (cantidad == 0) {
//                 document.getElementById(idproducto).value = 1
//             } else {
//                 a = parseInt(cantidad)
//                 a = a + 1
//                 document.getElementById(idproducto).value = a;
//             }
//         });
//     });
// });




//FUNCION PARA SCANNEAR PRODUTOS Y AGREGARLOS A LA LISTA DE COMPRAS
//arreglo para acomular los productos de una cuenta
let customerOrder = [];
$(document).ready(function () {
    //obtenemos el valor de los input
    $('#adicionar').click(function () {
        var cod = document.getElementById("cod_barras").value;
        var IdPro = cod;
        $.ajax({
            //url: 'https://jquerycrud-ed8dc.firebaseio.com/products/.json',
            url: '../../ajax/getAllProductForId.php',
            dataType: "json",
            method: 'POST',
            data: { "id": IdPro },
            success: (response) => {
                console.log(response)
                //printProducts(response)
                var idVenta = ""
                var cantidad = 1
                var precio = parseFloat(response[0]['precio'])
                var totalVenta = parseFloat(response[0]['precio'])
                var estado = true
                var id_pro = parseInt(response[0]['idproductos'])
                var idCuenta = parseInt($('#Id_Cuenta').text());
                var description = response[0]['descripcion']
                var cantidad = 1
                var i = 1; //contador para asignar id al boton que borrara la fila
                var fila = '<tr class="product-card" id="row' + i + '"><td>' + description + '</td><td style="text-align: center;">' + cantidad + '</td><td style="text-align: center;">' + precio + '</td><td style="text-align: center;">' + cantidad * precio + '</td></tr>'; //esto seria lo que contendria la fila
                // var fila = '<tr class="product-card" id="row' + i + '"><td>' + description + '</td><td>' + cantidad + '</td><td>' + precio + '</td><td>' + cantidad * precio + '</td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">Quitar</button></td></tr>'; 
                i++;

                $('#mytable tr:first').after(fila);
                $("#adicionados").text(""); //esta instruccion limpia el div adicioandos para que no se vayan acumulando
                var nFilas = $("#mytable tr ").length;
                $("#adicionados").append(nFilas - 1);
                //le resto 1 para no contar la fila del header
                // document.getElementById("precio").value = "";
                // document.getElementById("cantidad").value = "";
                // document.getElementById("descripcion").value = "";
                // document.getElementById("id").focus();


                let productObject = { idVenta, fecha, cantidad, precio, totalVenta, estado, id_pro, idCuenta };

                customerOrder.push(productObject);
                console.log(customerOrder)

                let orderTotal = customerOrder.reduce((sum, i) => {
                    console.log(i)
                    return sum + (i.precio)
                }, 0)
                $('#totalCuenta').val("")
                $('#totalCuenta').text(parseFloat(orderTotal.toFixed(2)));
                // $('.order').append(customerOrder)

            },
        });


    });


    $(document).on('click', '.btn_remove', function () {
        var button_id = $(this).attr("id");
        //cuando da click obtenemos el id del boton
        $('#row' + button_id + '').remove(); //borra la fila
        //limpia el para que vuelva a contar las filas de la tabla
        $("#adicionados").text("");
        var nFilas = $("#mytable tr").length;
        $("#adicionados").append(nFilas - 1);
    });



});






