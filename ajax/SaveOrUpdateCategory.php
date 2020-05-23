<?php
 require_once('../controllers/categoryController.php');


  $datos = [
      "id"=>trim($_POST['idCategory']),
      "descripcion"=> trim($_POST['input-descripcion']),
      "estado"=>trim($_POST['select-estado']),
  ];

      $Category = new categoryController();
      $InstaCategory = $Category->SaveorUpdateCategory($datos);

        if ($InstaCategory) {
           echo "<script>alert('Se agrego correctamente!')</script>";
           header("Location: ../views/category.php");
        }else{
           echo "<script>alert('Ocurrio un errror!')</script>";
         //   header("Location: ../views/user.php");
        }
?>