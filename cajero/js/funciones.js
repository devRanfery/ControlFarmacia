//FUNCION PARA AUMENTAR CANTIDAD DE PRODUCTOS EN EL MENU
$(function() {
    var a = 0
    $(document).ready(function() {
        $('.aumentaCantidad').on('click', function(e) {
            e.preventDefault()
            var id = $(this).attr('id')
            var idproducto = 'cantidad' + id
            var cantidad = document.getElementById(idproducto).value
            if (cantidad == 0) {
                document.getElementById(idproducto).value = 1
            } else {
                a = parseInt(cantidad)
                a = a + 1
                document.getElementById(idproducto).value = a;
            }
        });
    });
});

//FUNCION PARA DISMINUIR LA CANTIDAD DE PRODUCTOS EN EL MENU
$(function() {
    var a = 0
    $(document).ready(function() {
        $('.disminuirCantidad').on('click', function(e) {
            e.preventDefault()
            var id = $(this).attr('id')
            var idproducto = 'cantidad' + id
            var cantidad = document.getElementById(idproducto).value
            if (cantidad > 0) {
                a = parseInt(cantidad)
                a = a - 1
                document.getElementById(idproducto).value = a;
            } else {
                document.getElementById(idproducto).value = 0
            }
        });
    });
});

//FUNTION CATEGORIES
    var cboCategoria = document.getElementById("cboCategoria")
    var cComplemento = document.getElementsByClassName('categoria1')
    var cComal = document.getElementsByClassName('categoria2')
    var cParrila = document.getElementsByClassName('categoria3')
    var cBebidas = document.getElementsByClassName('categoria4')
//document.getElementsByClassName('categoria1').css("display","none")
    $(function() {
        $(document).ready(function() {
            $('#catComplemento').on('click', function(e) {
                e.preventDefault()
                //var id = $(this).attr('id')
                //alert(id)
                $('.categria1').css("display", "none")
                //cComal.hide()
                //cParrila.css("display", "none")
                //cBebidas.css("display", "none")
                //hide(cComal)
                //hide(cParrila)
                //hide(cBebidas)
            });
        });
    });


//MANDAR PRODUCTOS AL CARRITO

$(function() {
    var a = 0
    $(document).ready(function() {
        $('.aumentaCantidad').on('click', function(e) {
            e.preventDefault()
            var id = $(this).attr('id')
            var idproducto = 'cantidad' + id
            var pedidoid = 'pedido' + id
            var cantidad = document.getElementById(idproducto).value
            var arreglo = [pedidoid, cantidad, id];
            alert (arreglo)
            return arreglo
            // alert("Su pedido es: "+ pedidoid + " Usted pidio: "+ cantidad + " del producto num: " + id)  
        });
    });
});
//MOSTRAR FECHA ACTUAL

//var d = new Date();
//alert(d.toISOString());



var miFechaActual = new Date();
dia = miFechaActual.getDate() 
mes = parseInt(miFechaActual.getMonth()) + 1 
ano = miFechaActual.getFullYear()
var hora = miFechaActual.getHours() + ':' + miFechaActual.getMinutes() + ':' + miFechaActual.getSeconds() + ':' + miFechaActual.getMilliseconds()

var fechaHoy = ano + '-' + mes + '-' + dia + ' ' + hora
$('.fecha_modal').val(fechaHoy);





