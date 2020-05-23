<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
    //print_r ($_SESSION);
    require_once('../core/configGeneral.php');
}
if($_SESSION['usuario'] == null)
{
    header("Location: ../index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Meseros</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/585801ee80.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="<?php echo SERVERURL;?>meseros/css/styles.css">
</head>

<body>

    <?php
        $peticionAjax = true;
        require_once('../controllers/meserosController.php');
        $filas = meserosController::GetAllCuentasAbiertas();
        $meseros = meserosController::GetAllMeseros();
    ?>
    <!-- Just an image -->
    <nav class="navbar navbar-light bg-nav">
        <div class="texto-logo" style="display: flex; align-items: center;">
            <a class="navbar-brand" href="#">
                <img src="../vista/img/logo/parrilla14.png" width="50" height="50" alt="">
            </a>
            <h4>Parrilla14</h4>
        </div>
        <ul style="list-style:none;">
            <li class="nav-item">
                <a class="nav-link btn btn-danger" href="../controllers/logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Cerrar Sesión</span></a>
            </li>
        </ul>
    </nav>

    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <?php foreach($filas as $cuentas){?>
            <div class="col-xs-12 col-sm-3 card <?php echo $cuentas['Color']?> card-products">
                <a class="btn" href="Meseros14/index.php?cuenta=<?php echo $cuentas['Id']?>">
                    <?php echo $cuentas['Cuenta']."<br />"; echo $cuentas['Total'];?>
                </a>
            </div>
            <?php } ?>
        </div>
    </div>

    <footer class="p-2 w-100 fixed-bottom text-white bg-nav d-flex justify-content-end">
        <div class="footer-btn" style="display:flex;">
            <a href="#" class="btn btn-success btn-nueva-cuenta" data-toggle="modal" data-target="#modalCuenta">
                <i class="fas fa-plus"></i>
            </a>
        </div>
    </footer>

    <!-- Modal -->
    <div class="modal fade" id="modalCuenta" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nueva Venta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="RespuestaAjax"></div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" id="formulariox"
                        action="<?php echo SERVERURL;?>ajax/nuevaCuentaAjax.php" method="POST" data-form="save"
                        class="FormularioAjax">
                        <input type="text" class="form-control" value="0" name="idCuenta" required="" style="display:none;">
                        <div class="form-group">
                            <label>Cuenta</label>
                            <input type="text" class="form-control" id="nombreCuenta" name="nombreC" required="">
                        </div>
                        <div class="form-group" style="display:none;">
                            <label>Subtotal</label>
                            <input type="text" value="00.00" class="form-control subTotalN" name="subTotal" required="">
                        </div>
                        <div class="form-group" style="display:none;">
                            <label>Descuento</label>
                            <input type="text" value="00.00" class="form-control descuentoN" name="descuento"
                                required="">
                        </div>
                        <div class="form-group" style="display:none;">
                            <label>Total</label>
                            <input type="text" value="00.00" class="form-control totalN" name="total" required="">
                        </div>
                        <div class="form-group" style="display:none;">
                            <label>Estado</label>
                            <input type="text" value="1" class="form-control estadoN" name="estado" required="">
                        </div>
                        <div class="form-group" style="display:none;">
                            <label>Fecha</label>
                            <input class="form-control fecha_modal" type="text" name="fecha">
                        </div>
                        <div class="form-group">
                            <label>Mesero</label>
                            <select class="form-control" name="mesero">
                                <option style="height: 20px;">Seleccionar</option>
                                <?php foreach($meseros as $mesero){?>
                                <option value="<?php echo $mesero['Id']?>"><?php echo $mesero['Nombre']?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Comentario</label>
                            <input type="text" class="form-control" name="comentario">
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script type="text/javascript">
    $(function() {
        $(document).ready(function() {
            $('.btn-nueva-cuenta').on('click', function(e) {
                e.preventDefault();
                var Cuenta = 'cuenta';
                var dataString = 'cuenta=' + Cuenta;
                $.ajax({
                    type: "POST",
                    url: "../ajax/nombreCuenta.php",
                    data: dataString,
                    success: function(data) {
                        //console.log(data)
                        $('#nombreCuenta').val(data)

                    }
                });
            });
        });
    });
    </script>

    <script src="<?php echo SERVERURL;?>vista/js/main.js"></script>
    <script src="<?php echo SERVERURL;?>meseros/js/funciones.js"></script>
    <script src="js/funciones.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


</body>

</html>