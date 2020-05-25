<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<?php
  if (isset($_SESSION['user'])) {
    header('./index.php');
    echo "SI HAY";
  }else{
    session_destroy();
    header('../index.php');
  }
?>

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
            // print_r($_SESSION);
            // print_r( $_SESSION );

            require_once('../models/SelectTotal.php');
            $selectTotal = new SelectTotal();
            $TotalUsuarios = $selectTotal->TotalUsuarios();
            $TotalCuentas = $selectTotal->TotalCuentas();
            $TotalVentas = $selectTotal->TotalVentas();
            $TotalGananciasForDate = $selectTotal->TotalCuentasFecha();
            ?>
            <div class="row">
              <div class="col-md-12">
                <div class="overview-wrap">
                  <h2 class="title-1">Visión general</h2>
                </div>
              </div>
            </div>
            <div class="row m-t-25">
              <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c1">
                  <div class="overview__inner">
                    <div class="overview-box clearfix">
                      <div class="icon">
                        <i class="zmdi zmdi-account-o"></i>
                      </div>
                      <div class="text">
                        <h2><?php echo $TotalUsuarios; ?></h2>
                        <span>Usuarios Activos</span>
                      </div>
                    </div>
                    <div class="overview-chart">
                      <canvas id="widgetChart1"></canvas>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c2">
                  <div class="overview__inner">
                    <div class="overview-box clearfix">
                      <div class="icon">
                        <i class="zmdi zmdi-shopping-cart"></i>
                      </div>
                      <div class="text">
                        <h2><?php echo $TotalCuentas; ?></h2>
                        <span>Cuentas Activas</span>
                      </div>
                    </div>
                    <div class="overview-chart">
                      <canvas id="widgetChart2"></canvas>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c3">
                  <div class="overview__inner">
                    <div class="overview-box clearfix">
                      <div class="icon">
                        <i class="zmdi zmdi-calendar-note"></i>
                      </div>
                      <div class="text">
                        <h2><?php echo $TotalVentas; ?></h2>
                        <span>Ventas Totales</span>
                      </div>
                    </div>
                    <div class="overview-chart">
                      <canvas id="widgetChart3"></canvas>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c4">
                  <div class="overview__inner">
                    <div class="overview-box clearfix">
                      <div class="icon">
                        <i class="zmdi zmdi-money"></i>
                      </div>
                      <div class="text">
                        <h2>$<?php echo number_format((float)$TotalGananciasForDate, 2, '.', ''); ?></h2>
                        <span>Ganancias por dia</span>
                      </div>
                    </div>
                    <div class="overview-chart">
                      <canvas id="widgetChart4"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <?php
                  include_once('../controllers/cuentasController.php');
                  $instCuentas = new cuentasController();
                  $listCuentas = $instCuentas->GetAllAccountByDate();
                ?>
                <h2 class="title-1 m-b-25">Cuentas de Hoy</h2>
                <div class="table-responsive table--no-card m-b-40">
                  <table class="table table-borderless table-striped table-earning">
                    <thead>
                      <tr>
                        <th class="text-center">Cuenta</th>
                        <th class="text-center">Fecha</th>
                        <th class="text-center">Subtotal</th>
                        <th class="text-center">Descuento</th>
                        <th class="text-center">Total</th>
                        <th class="text-right">Comentario</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                    foreach($listCuentas as $cuentas){?>
                      <tr>
                        <td class="text-center"><?php echo $cuentas['idcuentas']?></td>
                        <td class="text-center"><?php echo $cuentas['fecha']?></td>
                        <td class="text-center">$<?php echo $cuentas['subtotal']?></td>
                        <td class="text-center">$<?php echo $cuentas['descuento']?></td>
                        <td class="text-center">$<?php echo $cuentas['total']?></td>
                        <td class="text-center"><?php echo $cuentas['comentario']?></td>
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
                  <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a
                      href="https://colorlib.com">Colorlib</a>.</p>
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