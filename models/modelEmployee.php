<?php

include_once('../db/conect_db.php');

class employeeModel extends Connection{

private $conexion;

public function __construct(){
$DB = new Connection();
$this->conexion = $DB->Conexion();
// $this->db=Connection::Conexion();
}

/**Funcion para consulta por medio de un procedimiento almacenado
 * todos los empleados que se encuentran en el sistema, en su estado
 * activo o inactivo
 */
public function GetAllEmployee(){

  $sql = "CALL GetAllEmployee";

  $result = mysqli_query($this->conexion, $sql);

  if (!$result) {
    die('Consulta no válida: ' . mysql_error());
  }else{
    // echo "funciona";
    $tabla = [];
    $i = 0;
      while ($fila = mysqli_fetch_array($result)) {
        $tabla[$i] = $fila;
        $i++;
      }
      return $tabla;
  }
}


public function SaveorUpdateEmployee($data){
  $conexi = new Connection();
  $conex = $conexi->Conexion();

  $id = (int)$data['id'];
  $usuario = (string)$data['usuario'];
  $contrasena = (string)$data['contrasena'];
  $nombre = (string) $data['nombre'];
  $apellido = (string) $data['apellido'];
  $estado = (boolean)$data['estado'];
  $tipo = (string) $data['tipo'];


  $sql= " CALL saveOrUpdateUser ('$id','$nombre','$apellido','$usuario','$contrasena', '$tipo', '$estado')";
  $result = mysqli_query($conex, $sql);

  return $result;
}


}
?>