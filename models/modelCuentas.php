<?php

include_once('../../db/conect_db.php');

class cuentasModel extends Connection{


public function SaveorUpdateCuentas($data){
  $conex = new Connection();
  $conex = $conex->Conexion();

  $id = (int)$data['id'];
  $cuenta = (string)$data['cuenta'];
  $fecha = (string)$data['fecha'];
  $subtotal = (float)$data['subtotal'];
  $descuento = (float)$data['descuento'];
  $total = (float)$data['total'];
  $comentario = (string)$data['comentario'];
  $estatus = (boolean)$data['estatus'];
  $empleado = (int)$data['empleado'];


  // $sql= " CALL saveOrUpdateUser ('$id','$descripcion','$estado')";
  $sql = "CALL saveOrUpdateCuentas ('$id', '$cuenta','$fecha', '$subtotal', '$descuento', '$total', '$comentario','$estatus', '$empleado')";
  $result = mysqli_query($conex, $sql);

  $tabla = [];
  $i = 0;
  while ($fila = mysqli_fetch_array($result)) {
    $tabla[$i] = $fila;
    $i++;
  }
  return $tabla;
}


}
?>