<?php
include_once('../db/conect_db.php');
include_once('../controllers/ventasController.php');

session_start();

$producto = json_decode($_POST['json']);
$TotalCuenta = $producto->{"orderTotal"};
$cuenta = $_SESSION['Id_Cuenta'];

//RECORREMOS EL JSON QUE CONTIENE CADA UNO DE LOS 
//PRODUCTOS EN LA CUENTA Y GUARDAMOS UNO POR UNO
foreach($producto->{"customerOrder"} as $productos){
    $product = [
        "idVenta"=>trim($productos->{"idVenta"}),
        "fecha" =>$productos->{"fecha"},
        "cantidad"=>trim($productos->{"cantidad"}),
        "precio"=>trim($productos->{"precio"}),
        "totalVenta"=>trim($productos->{"totalVenta"}),
        "estado"=>trim($productos->{"estado"}),
        "id_pro"=>trim($productos->{"id_pro"}),
        "idCuenta"=>trim($productos->{"idCuenta"})
    ];
    //IMPRIMIR CADA PRODUCTO QUE SE INSERTA EN LA BASE DE DATOS.
    //QUITAR EL COMENTARIO 
    // var_dump($product); 
    $instVentas = ventasController::SaveorUpdateVentas($product);
}

    //ANTES DE BORRAR VARIABLE ID_CUENTA ACTUALIZAMOS EL VALOR
    //TOTAL DE LA TABLA CUENTAS
    $con = new Connection();
    $oConBD = $con->Conexion();
    $query = "CALL UpdateTotalCuenta ('$TotalCuenta','$cuenta')";
    $resultado = mysqli_query($oConBD, $query);

    unset($_SESSION['Id_Cuenta']);