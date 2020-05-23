<?php

include_once('../db/conect_db.php');

class ventasModel extends Connection{


public function SaveorUpdateVentas($data){
  $conex = new Connection();
  $conex = $conex->Conexion();

  $idVenta = (int)$data['idVenta'];
  $fecha = (string)$data['fecha'];
  $cantidad = (int)$data['cantidad'];
  $precio = (float)$data['precio'];
  $totalVenta = (float)$data['totalVenta'];
  $estado = (boolean)$data['estado'];
  $id_pro = (int)$data['id_pro'];
  $idCuenta = (int)$data['idCuenta'];

  // $sql= " CALL saveOrUpdateUser ('$id','$descripcion','$estado')";
  $sql = "CALL saveOrUpdateVentas ('$idVenta','$fecha','$cantidad','$precio','$totalVenta','$estado','$id_pro','$idCuenta')";
  $result = mysqli_query($conex, $sql);


  return $result;
}

}
?>