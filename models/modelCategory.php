<?php

include_once('../db/conect_db.php');

class categoryModel extends Connection{

private $conexion;

public function __construct(){
$DB = new Connection();
$this->conexion = $DB->Conexion();
// $this->db=Connection::Conexion();
}

/*FUNCION PARA MOSTRAR NUESTRAS CATEGORIAS DISPONIBLES */
public function GetAllCategory(){
  $sql = "CALL GetAllCategory";

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

// public function GetAllProductsForId($id){
//     $conex = new Connection();
//   $conex = $conex->Conexion();

//     $sql = "CALL GetAllProductForId ('$id')";
    
//     $result = mysqli_query($conex, $sql);

//     $tabla = [];
//     $i = 0;
//       while ($fila = mysqli_fetch_array($result)) {
//         $tabla[$i] = $fila;
//         $i++;
//       }
//     // return $tabla;
//     return json_encode($tabla);
// }
    

public function SaveorUpdateCategory($data){
  $conex = new Connection();
  $conex = $conex->Conexion();

  $id = (int)$data['id'];
  $descripcion = (string)$data['descripcion'];
  $estado = (boolean)$data['estado'];


  // $sql= " CALL saveOrUpdateUser ('$id','$descripcion','$estado')";
  $sql = "CALL saveOrUpdateCategory ('$id', '$descripcion','$estado')";
  $result = mysqli_query($conex, $sql);

  return $result;
}


}
?>