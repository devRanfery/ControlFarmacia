<?php

include_once('../db/conect_db.php');

class SelectTotal extends Connection{

public function TotalUsuarios(){
  $conex = new Connection();
  $conex = $conex->Conexion();
  
  $sql = "SELECT count(*) AS Total from empleado where Estado = true";
  $result = mysqli_query($conex, $sql);

  while ($fila = $result->fetch_assoc()) {
    $Total = $fila['Total'];
  }
  return $Total;
}

public function TotalCuentas(){
  $conex = new Connection();
  $conex = $conex->Conexion();

  $sql = "SELECT COUNT(*) AS Total FROM cuentas WHERE estatus = true";
  $result = mysqli_query($conex, $sql);

  while ($fila = $result->fetch_assoc()) {
    $Total = $fila['Total'];
  }
  return $Total;
}

public function TotalVentas(){
    $conex = new Connection();
  $conex = $conex->Conexion();

  $sql = "SELECT COUNT(*) AS Total FROM ventas WHERE estatus = true";
    $result = mysqli_query($conex, $sql);


  while ($fila = $result->fetch_assoc()) {
    $Total = $fila['Total'];
  }
  return $Total;

}

public function TotalCuentasFecha(){
  $conex = new Connection();
  $conex = $conex->Conexion();

  $sql = "SELECT sum(total) AS Total FROM cuentas WHERE fecha = CURDATE()";
  $result = mysqli_query($conex, $sql);

  while ($fila = $result->fetch_assoc()) {
    $Total = $fila['Total'];
  }
  return $Total;
}

}
?>