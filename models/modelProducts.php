<?php

include_once('../db/conect_db.php');

class productosModel extends Connection{

private $conexion;

public function __construct(){
$DB = new Connection();
$this->conexion = $DB->Conexion();
}

//Funcion para mostrar con el procedimiento almacenado "GetAllProducts"
//todos los productos de la base de datos
public function GetAllProducts(){
  $sql = "CALL GetAllProducts";

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

public function GetAllProductsForId($id){
    $conex = new Connection();
  $conex = $conex->Conexion();

    $sql = "CALL GetAllProductForId ('$id')";
    
    $result = mysqli_query($conex, $sql);

    $tabla = [];
    $i = 0;
      while ($fila = mysqli_fetch_array($result)) {
        $tabla[$i] = $fila;
        $i++;
      }
    // return $tabla;
    return json_encode($tabla);
}
    
//Para guardar o actualizar algun producto utilizamos el metodo
//SaveorUpdateProducts el cual nos permite conseguir todos los datos
//de entrada de un formulario para posteriormente con ayuda de un 
//procedimiento almacenado de la base de datos verifica si el producto 
//existe, si es asi lo actualiza y si solo inserta
public function SaveorUpdateProducts($data){
  $conex = new Connection();
  $conex = $conex->Conexion();

  $id = (int)$data['id'];
  $descripcion = $data['descripcion'];
  $precio = (float) $data['precio'];
  $cantidad = (int) $data['cantidad'];
  $imagen = $data['imagen'];
  $estatus = (boolean) $data['estatus'];
  $categoria = (int) $data['categoria'];


  $sql = "CALL saveOrUpdateProduct ('$id','$descripcion', '$precio', $cantidad,'$imagen', $estatus,$categoria)";
  $result = mysqli_query($conex, $sql);

  return $result;
}


}
?>