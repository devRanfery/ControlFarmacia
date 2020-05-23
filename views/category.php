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
  <title>Categorias</title>

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
                require_once('../controllers/categoryController.php');
                $category= new categoryController();
                $listCategory = $category->GetAllCategory();
            ?>
            <div class="card-body" style="display: flex; justify-content: space-between;">
              <h2 class="title-1">Categorias</h2>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="card" style="height: 290px;">
                  <div class="card-header">
                    <strong>Agregar</strong> Categoria
                  </div>
                  <div class="card-body card-block">
                    <form action="../ajax/SaveOrUpdateCategory.php" method="post" class="form-horizontal">
                      <div class="row form-group" style="margin-bottom:2rem;">
                        <input type="text" name="idCategory" style="display:none;">
                        <div class="col col-md-3">
                          <label class="form-control-label">Descripcion</label>
                        </div>
                        <div class="col-12 col-md-9">
                          <input type="text" id="hf-desc" name="input-descripcion" class="form-control">
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
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                          <i class="fa fa-dot-circle-o"></i> Agregar
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="table-responsive  m-b-40" style="height: 290px;">
                  <table class="table table-borderless table-striped table-earning">
                    <thead>
                      <tr>
                        <th class="text-center">Descripcion</th>
                        <th class="text-center">Estado</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- TABLA DE CATEGORIAS DE LA BASE DE DATOS -->
                      <?php
                      foreach($listCategory as $categorys){?>
                      <tr>
                        <td class="text-center"><?php echo $categorys['descripcion']?></td>
                        <td class="text-center"><?php echo $categorys['estatus']?></td>
                        <td>
                          <div class="table-data-feature">
                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                              <i class="zmdi zmdi-edit"></i>
                            </button>
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

  <!-- modal medium -->
  <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="mediumModalLabel">Agregar Producto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="">
            <div class="card-body card-block">
              <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
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
                    <label for="password-input" class=" form-control-label">Cantidad</label>
                  </div>
                  <div class="col-12 col-md-9">
                    <input type="text" name="input-cantidad" class="form-control">
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col col-md-3">
                    <label class=" form-control-label">Estado</label>
                  </div>
                  <div class="col col-md-9">
                    <div class="form-check-inline form-check">
                      <label for="inline-radio1" class="form-check-label m-1">
                        <input type="radio" id="inline-radio1" name="input-estado" value="option1"
                          class="form-check-input">
                        Disponible
                      </label>
                      <label for="inline-radio2" class="form-check-label m-1">
                        <input type="radio" id="inline-radio2" name="input-estado" value="option2"
                          class="form-check-input">No
                        Disponible
                      </label>
                    </div>
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
              </form>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary btn-sm m-1">
                <i class="fa fa-dot-circle-o"></i> Aceptar
              </button>
              <button type="reset" class="btn btn-danger btn-sm m-1">
                <i class="fa fa-ban"></i> Cancelar
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end modal medium -->

  <!-- Jquery JS-->
  <script src="vendor/jquery-3.2.1.min.js"></script>
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