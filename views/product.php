<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <!-- Required meta tags-->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="au theme template">
  <meta name="author" content="Hau Nguyen">
  <meta name="keywords" content="au theme template">

  <!-- Title Page-->
  <title>Farmacia</title>

  <!-- Fontfaces CSS-->
  <link href="css/font-face.css" rel="stylesheet" media="all">
  <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
  <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
  <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

  <!-- Bootstrap CSS-->
  <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

  <!-- Vendor CSS-->
  <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
  <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
  <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
  <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
  <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
  <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
  <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

  <!-- Main CSS-->
  <link href="css/theme.css" rel="stylesheet" media="all">

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

</head>

<body class="animsition">
  <div class="page-wrapper">
    <!-- HEADER MOBILE-->
    <?php
        include_once('headerMobile.php');
    ?>
    <!-- END HEADER MOBILE-->

    <!-- MENU SIDEBAR-->
    <?php
        include_once('menuSidebar.php');
    ?>
    <!-- END MENU SIDEBAR-->

    <!-- PAGE CONTAINER-->
    <div class="page-container">
      <!-- HEADER DESKTOP-->
      <?php
        include_once('headerDesktop.php');
      ?>
      <!-- HEADER DESKTOP-->

      <!-- MAIN CONTENT-->
      <div class="main-content">
        <div class="section__content section__content--p30">
          <div class="container-fluid">
            <?php
                // Instancia Productos Model
                require_once('../models/modelProducts.php');
                $products = new productosModel();
                $listProduct = $products->GetAllProducts();
            ?>
            <div class="card-body" style="display: flex; justify-content: space-between;">
              <h2 class="title-1">Productos</h2>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#SaveProducts">
                Agregar
              </button>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="table-responsive  m-b-40">
                  <table class="table table-borderless table-striped table-earning">
                    <thead>
                      <tr>
                        <th class="text-center">Descripcion</th>
                        <th class="text-center">Categoria</th>
                        <th class="text-center">Precio</th>
                        <th class="text-center">Cantidad</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Imagen</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- TABLA DE PRODUCTOS DE LA BASE DE DATOS -->
                      <!--Para mostrar nuestros productos instanciamos nuestra controlador
                          para obtener la funcion correspondiente que consulta los datos
                          y por medio de un foreach los vamos mostrando en una tabla -->
                      <?php
                      foreach($listProduct as $producto){?>
                      <tr>
                        <td class="text-center"><?php echo $producto['descripcion']?></td>
                        <td class="text-center"><?php echo $producto['categoria_FK']?></td>
                        <td class="text-center"><?php echo $producto['precio']?></td>
                        <td class="text-center"><?php echo $producto['cantidad']?></td>
                        <td class="text-center"><?php echo $producto['estatus']?></td>
                        <td><img src="images/productos/<?php echo $producto['imagen']?>" alt=""
                            style="width:50px; height:50px;"></td>
                        <td>
                          <div class="table-data-feature">
                            <span class="item update" data-placement="top" title="Edit" data-toggle="modal"
                              data-target="#UpdateProducts" id="<?php echo $producto['idproductos']?>">
                              <i class="zmdi zmdi-edit "></i>
                            </span>
                          </div>
                        </td>
                        <td>
                          <div class="table-data-feature">
                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                              <i class="zmdi zmdi-delete"></i>
                            </button>
                          </div>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="copyright">
                  <p>Copyright © 2020 Ranfery Alvarez. All rights reserved. Template by <a
                      href="https://github.com/devRanfery">DevRanfery</a>.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- END MAIN CONTENT-->
      <!-- END PAGE CONTAINER-->
    </div>
  </div>



  <!-- Save modal medium -->
  <div class="modal fade" id="SaveProducts" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <?php
            // Instancia Categorias Model
            require_once('../controllers/categoryController.php');
            $categorias = new categoryController();
            $listCategorias = $categorias->GetAllCategory();
          ?>
          <h5 class="modal-title" id="mediumModalLabel">Agregar Producto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="">
            <div class="card-body card-block">
              <form action="../ajax/SaveOrUpdateProduct.php" method="post" enctype="multipart/form-data"
                class="form-horizontal">
                <input type="text" name="idProduct" style="display:none;">
                <div class="row form-group">
                  <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Descripcion</label>
                  </div>
                  <div class="col-12 col-md-9">
                    <input type="text" name="input-descripcion" class="form-control">
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col col-md-3">
                    <label for="select" class=" form-control-label">Categoria</label>
                  </div>
                  <div class="col-12 col-md-9">
                    <select name="select-categoria" id="select" class="form-control">
                      <?php
                      foreach($listCategorias as $cat){?>
                      <option value="<?php echo $cat['idcategoria']?>"><?php echo $cat['descripcion']?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Precio</label>
                  </div>
                  <div class="col col-md-9">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fas fa-dollar-sign"></i>
                      </div>
                      <input type="text" name="input-precio" class="form-control">
                      <div class="input-group-addon">.00</div>
                    </div>
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col col-md-3">
                    <label for="cantidad" class=" form-control-label">Cantidad</label>
                  </div>
                  <div class="col-12 col-md-9">
                    <input type="text" name="input-cantidad" class="form-control">
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col col-md-3">
                    <label for="select" class=" form-control-label">Estado</label>
                  </div>
                  <div class="col-12 col-md-9">
                    <select name="select-estado" id="select" class="form-control">
                      <option value="1">Activo</option>
                      <option value="0">Inactivo</option>
                    </select>
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col col-md-3">
                    <label for="file-input" class=" form-control-label">Imagen</label>
                  </div>
                  <div class="col-12 col-md-9">
                    <input type="file" id="file-input" name="file-imagen" class="form-control-file">
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-sm m-1">
                    <i class="fa fa-dot-circle-o"></i> Aceptar
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end  Save modal medium -->

  <!--Update modal medium -->
  <div class="modal fade" id="UpdateProducts" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="mediumModalLabel">Actualizar Producto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="">
            <div class="card-body card-block">
              <form action="../ajax/SaveOrUpdateProduct.php" method="post" enctype="multipart/form-data"
                class="form-horizontal">
                <input type="text" id="idProduct" name="idProduct" style="display:none;">
                <div class="row form-group">
                  <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Descripcion</label>
                  </div>
                  <div class="col-12 col-md-9">
                    <input type="text" id="descripcion" name="input-descripcion" class="form-control">
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col col-md-3">
                    <label for="select" class=" form-control-label">Categoria</label>
                  </div>
                  <div class="col-12 col-md-9">
                    <select name="select-categoria" id="categoria" class="form-control">
                      <option value="1">Pediatrico</option>
                      <option value="2">Infatil</option>
                      <option value="3">Adulto</option>
                    </select>
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Precio</label>
                  </div>
                  <div class="col col-md-9">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fas fa-dollar-sign"></i>
                      </div>
                      <input type="text" id="precio" name="input-precio" class="form-control">
                      <div class="input-group-addon">.00</div>
                    </div>
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col col-md-3">
                    <label for="cantidad" class=" form-control-label">Cantidad</label>
                  </div>
                  <div class="col-12 col-md-9">
                    <input type="text" id="cantidad" name="input-cantidad" class="form-control">
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col col-md-3">
                    <label for="select" class=" form-control-label">Estado</label>
                  </div>
                  <div class="col-12 col-md-9">
                    <select name="select-estado" id="estado" class="form-control">
                      <option value="1">Activo</option>
                      <option value="0">Inactivo</option>
                    </select>
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col col-md-3">
                    <label for="file-input" class=" form-control-label">Imagen</label>
                  </div>
                  <div class="col-12 col-md-9">
                    <input type="file" id="imagen" name="file-imagen" class="form-control-file">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm m-1">
                  <i class="fa fa-dot-circle-o"></i> Actualizar
                </button>
              </form>
            </div>
            <div class="card-footer">
              <button type="reset" class="btn btn-danger btn-sm m-1">
                <i class="fa fa-ban"></i> Cancelar
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end Update modal medium -->

  <script>
  $(function() {
    $(document).ready(function() {
      $('.update').on('click', function(e) {
        e.preventDefault()
        var id = $(this).attr('id')
        // alert(id)
        $('#UpdateProducts').modal('show');
        var dataS = 'id=' + id;
        $.ajax({
          type: "POST",
          url: "../ajax/getAllProductForId.php",
          data: dataS,
          success: function(response) {
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
  </script>

  <!-- Jquery JS-->

  <!-- <script src="vendor/jquery-3.2.1.min.js"></script> -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
  <!-- Bootstrap JS-->
  <script src="vendor/bootstrap-4.1/popper.min.js"></script>
  <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>

  <!-- Vendor JS       -->
  <script src="vendor/slick/slick.min.js">
  </script>
  <script src="vendor/wow/wow.min.js"></script>
  <script src="vendor/animsition/animsition.min.js"></script>
  <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
  </script>
  <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
  <script src="vendor/counter-up/jquery.counterup.min.js">
  </script>
  <script src="vendor/circle-progress/circle-progress.min.js"></script>
  <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="vendor/chartjs/Chart.bundle.min.js"></script>
  <script src="vendor/select2/select2.min.js">
  </script>

  <!-- Main JS-->
  <script src="js/main.js"></script>


</body>

</html>
<!-- end document-->