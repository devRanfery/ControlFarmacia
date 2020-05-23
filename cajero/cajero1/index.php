<?php
// $cuenta=($_GET['cuenta']);
// echo '<div class="text-success idCuenta" id="'.$cuenta.'"></div>';
session_start();
// print_r($_SESSION);

if (!isset($_SESSION['Id_Cuenta'])) {
    $fecha = date("Y-m-d");
    $idUser = $_SESSION['id'];
    // echo $idUser;
   
    $dataCuenta = array(
    "id" => '',
    "cuenta" => "Cuenta",
    "fecha" => "$fecha",
    "subtotal" => "0.00",
    "descuento" => "0.00",
    "total" => "0.00",
    "comentario" => "",
    "estatus" => "1",
    "empleado" => "$idUser"
    );

    include_once('../../controllers/cuentasController.php');
    $instCuentas = new cuentasController();
    $cuentas = $instCuentas->SaveorUpdateCuentas($dataCuenta);

    $_SESSION['Id_Cuenta'] = $cuentas[0][0];

}else{
    
}
?>

<!DOCTYPE html>
<html lang="es">

<div class=text-success></div>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://kit.fontawesome.com/585801ee80.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">

  <title>Farmacia || Cajero</title>
</head>

<body class="pb-5">
  <nav class="navbar navbar-dark bg-nav" style="display:flex; justify-content: space-between;">
    <div class="logo" style="display:flex; line-height: 70px;">
      <img src="img/logo/logo-1.webp" class="logo" alt="" style="width:100px;">
      <span class="navbar-brand" style="padding-top:0px;">Farmacia</span>
    </div>
    <div class="sesion">
      <a href="../../ajax/CerrarSesion.php" class="btn btn-primary">Cerrar Sesion</a>
    </div>

  </nav>

  <div class="container-fluid products-wrapper">
    <div class="row">
      <div class="card-footer listProduct col-md-6" id="ticket">
        <div class="card m-2">
          <div class="card-body" style="display:flex; justify-content: space-between;">
            <h3>Lista de Productos</h3>
            <h3>Cuenta: <span id="Id_Cuenta"><?php print_r($_SESSION['Id_Cuenta']);?></span></h3>
          </div>
        </div>
        <div class="card-footer listaProductos m-2">
          <p>Total de productos:
            <span id="adicionados"></span>
          </p>
          <div class="order"></div>
          <table id="mytable" class="table table-bordered table-hover ">
            <tr>
              <th style="float:left;">Descripcion</th>
              <th class="text-center">Cantidad</th>
              <th class="text-center">Precio</th>
              <th class="text-center">Total</th>
            </tr>
            <tfoot>
              <tr>
                <th colspan="3" style="text-align:left;">
                  Total:
                </th>
                <th>
                  <h5 style="text-align:center;"><span id="totalCuenta"></span> </h5>
                </th>
              </tr>
            </tfoot>
          </table>
          <div class="card-footer" style="text-align: right;">

          </div>
        </div><br>
        <div class="card-footer" style="">
          <p style="margin:0px;">Cajero: <span><?php echo $_SESSION['name'] , " ", $_SESSION['lastName'];?></span></p>
          <p style="margin:0px;" class="divfecha"></p>
          <p style="margin:0px;">Direccion:
            <span>Simon Bolívar 16 <br> Ejido Arroyo del Maiz Poza Rica, Ver.</span></p>
          <p style="margin:0px;">Telefono: 2291870114 <span></span></p>
          <h5 class="card-footer">¡GRACIAS POR TU PREFERENCIAS!</h5>
        </div>
      </div>
      <!-- ASIDE -->
      <div class="asideCaja col-md-6">
        <div class="text-dark" style="width:100%; height:100%;">
          <div class="card-header" style="display:flex; justify-content:space-between;">
            <div class="text"><span>Cajero: </span><?php echo $_SESSION['name'] , " ", $_SESSION['lastName'];?></div>
            <div class="divfecha"></div>
          </div>
          <div class="card-body">
            <h5>Bienvenido</h5>
            <div class="search text-center">
              <form class="form-inline p-3" style="display:center; justify-content:flex-end;">
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar producto" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
              </form>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Estado</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Picosend 11 ml tbo </td>
                    <td>$46.40</td>
                    <td>Dermatológicos</td>
                    <td>Disponible</td>

                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Caladryl Calamina 180 ml</td>
                    <td>$112.00</td>
                    <td>Musculares y desinflamatorios</td>
                    <td>Disponible</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Fucicort 2% crema con 15 gr</td>
                    <td>$235.00</td>
                    <td>Estomacales</td>
                    <td>Disponible</td>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td>Daivobet 5 mg/ 50 mg Gel con 30 gr</td>
                    <td>$819.00</td>
                    <td>Dermatológicos</td>
                    <td>Disponible</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="p-3 total">
              <form>
                <div class="form-group row">
                  <div class="col-md-12">
                    <form class="form-inline">
                      <div class="form-row">
                        <div class="form-group col-md-10 mb-4">
                          <label for="cobBarras" class="sr-only">Codigo:</label>
                          <input class="form-control mr-sm-2" type="text" id="cod_barras" placeholder="Codigo de barras"
                            aria-label="search">
                        </div>
                        <div class="form-group col-md-2">
                          <button type="button" id="adicionar" class="btn btn-primary mb-2">Scannear</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- <div class="col-md-6" style="display: flex; justify-content: center; align-items: center;">
                    <h2>Total: <span id="totalCuenta"></span> </h2>
                  </div> -->
                </div>
              </form>
            </div>
            <!-- PRUEBA DE CAJA -->
            <!-- <form style="display:none;">
              <div class="form-group">
                <p>
                  <label>Id producto:</label> <br>
                  <input id="id" class="form-control" type="text"><br>
                </p>
                <p>
                  <label>Descripcion:</label> <br>
                  <input id="descripcion" class="form-control" type="text"><br>
                </p>
                <p>
                  <label>Precio:</label> <br>
                  <input id="precio" class="form-control" type="text"> <br>
                </p>
                <p>
                  <label>Cantidad:</label> <br>
                  <input id="cantidad" class="form-control" type="text"> <br>
                </p>
                <p>
                  <label>Imagen:</label> <br>
                  <input id="imagen" class="form-control" type="text"> <br>
                </p>
                <p>
                  <label>Estado:</label> <br>
                  <input id="estado" class="form-control" type="text"> <br>
                </p>
                <p>
                  <label>Categoria:</label> <br>
                  <input id="categoria" class="form-control" type="text"> <br>
                </p>
                <button id="adicion" class="btn btn-success" type="button">Adicionar a la tabla</button>
              </div>
            </form> -->
            <!-- END PRUEBA DE CAJA -->
          </div>
        </div>

      </div>
    </div>
  </div>

  <footer class="p-3 w-100 fixed-bottom text-white bg-nav d-flex justify-content-end">
    <div class="footer-btn" style="display:flex;">
      <div id="submit-order" class="btn btn-success w-100">Pagar</div>
    </div>
  </footer>

  <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script> -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>
  <script src="js/main.js"></script>


</body>

</html>