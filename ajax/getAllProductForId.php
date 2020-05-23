<?php
 require_once('../controllers/productosController.php');
 $id =  $_POST['id'];

        $instProductos = new productosController();
        echo $instProductos->GetAllProductsForId($id);
?>