<?php
include_once('../../db/conect_db.php');
include_once('../../controllers/ventasController.php');

session_start();

$producto = json_decode($_POST['json']);
//$producto = $_POST['json'];
$TotalCuenta = $producto->{"orderTotal"};
$cuenta = print_r($_SESSION['Id_Cuenta']);


// $con = new Connection();
// $oConBD = $con->Conexion();

//   $sql2 = "CALL UpdateTotalCuenta ('$TotalCuenta','$cuenta');"
//   $resultado = mysqli_query($oConBD, $sql2);

//   if($resultado){
//       echo "LISTO";
//   }else{
//       echo "ERROR";
//   }


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

    var_dump($product);
   
    $instVentas = ventasController::SaveorUpdateVentas($product);
    
    // $stmt = sqlsrv_prepare($conn, $query, $producto);
    // $resultado = sqlsrv_execute($stmt); 
    // if( $resultado === false) {
    //     die( print_r( sqlsrv_errors(), true) );
    // }
}


// echo $cuenta;


unset($_SESSION['Id_Cuenta']);

// $Cuenta = $producto[7][0];