<?php
 require_once('../models/modelProducts.php');

  $datos = [
      "id"=>trim($_POST['idProduct']),
      "descripcion"=> trim($_POST['input-descripcion']),
      "precio"=>trim($_POST['input-precio']),
      "cantidad"=>trim($_POST['input-cantidad']),
      "imagen"=>$_FILES['file-imagen']['name'],
      "estatus"=>trim($_POST['select-estado']),
      "categoria"=>trim($_POST['select-categoria'])
  ];

        $guardarProducto = productosModel::SaveorUpdateProducts($datos);

        if ($guardarProducto) {
           echo "<script>alert('Se agrego correctamente!')</script>";
           header("Location: ../views/product.php");
        }else{
           echo "<script>alert('Ocurrio un errror!')</script>";
           header("Location: ../views/product.php");
        }
?>