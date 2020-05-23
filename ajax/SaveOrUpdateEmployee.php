<?php
 require_once('../controllers/employeeController.php');


  $datos = [
      "id"=>trim($_POST['idEmployee']),
      "usuario"=> trim($_POST['input-usuario']),
      "contrasena"=>trim($_POST['input-password']),
      "nombre"=>trim($_POST['input-nombre']),
      "apellido"=>trim($_POST['input-apellido']),
      "estado"=>trim($_POST['select-estado']),
      "tipo"=>trim($_POST['select-tipo'])
  ];

      $employee = new employeeController();
      $InstaEmployee = $employee->SaveorUpdateEmployee($datos);

        if ($InstaEmployee) {
           echo "<script>alert('Se agrego correctamente!')</script>";
           header("Location: ../views/user.php");
        }else{
           echo "<script>alert('Ocurrio un errror!')</script>";
           header("Location: ../views/product.php");
        }
?>