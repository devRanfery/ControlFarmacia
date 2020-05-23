<?php
 $peticionAjax = true;
 require_once('../core/configGeneral.php');
 require_once('../controllers/productosController.php');
 $filas = productosController::GetAllProductos();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menu Parrilla 14</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/585801ee80.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="<?php echo SERVERURL;?>meseros/css/menu.css">
</head>

<body>
    <!-- NAV -->
    <div class="container-fluid" style="background-color: #35475E;">
        <div class="col-12 content-logo">
            <img src="../img/logo/parrilla14.png" alt="logo-parrilla14" class="logo img-responsive">
        </div>
    </div>
    <!-- END NAV -->

    <!--CATEGORIES-->
    <div class="container">
            <div class="col-12 section-categorias">
                <ul class="categorias">
                    <li>
                        <a href="#" id=catComplemento>Complementos</a>
                    </li>
                    <li>
                        <a href="#" id="catComal">Comal</a>
                    </li>
                    <li>
                        <a href="#" id="catParrilla">Parrilla</a>
                    </li>
                    <li>
                        <a href="#" id="catBebida">Bebida</a>
                    </li>
                </ul>
            </div>
    </div>
    <!--END CATEGORIES-->

    <!--SECTION PRODUCTS-->
    <div class="container">
        <div class="row">
            <?php foreach($filas as $productos){?>
            <div class="col-md-4 categoria<?php echo $productos['Categoria']?>">
            <form action="">
                <div class="card" style="width:auto;">
                    <div class="img-product">
                        <a href="#" class="aumentaCantidad" id="<?php echo $productos['Id'];?>">
                            <img src="../<?php echo $productos['Imagen'];?>" class="card-img-top img-responsive"
                                alt="img-logo">
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $productos['Descripcion'];?></h5>
                    </div>
                    <span class="price-product"><?php echo $productos['Precio'];?></span>
                    <div class="content-cantidad">
                        <div class=btnCantidad>
                            <a href="#" class="btn btn-danger disminuirCantidad" id="<?php echo $productos['Id'];?>"><i
                                    class="fas fa-angle-down"></i></a>
                            <input type="text" class="form-control cantidad-producto" name="<?php echo $productos['Id']?>"
                                id="cantidad<?php echo $productos['Id']?>">
                        </div>
                      
                    </div>
                </div>
                </form>
            </div>
            <?php } ?>
        </div>
    </div>
    <!--END SECTION PRODUCTS-->

    <script>
    // function mostrarProducto(){
    //     var idproducto = document.getElementsByClassName('cantidad-producto')
    //     alert(idproducto)
    // }
//
    // mostrarProducto();
    </script>




    <!--SCRIPTS NECESARIOS-->
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
    <script src="<?php echo SERVERURL?>meseros/js/funciones.js"></script>

</body>

</html>