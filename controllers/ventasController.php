<?php

require_once('../../models/modelVentas.php');

class ventasController{

    // public function GetAllCategory(){
    //     $resultado = new CategoryModel();
    //     return $resultado->GetAllCategory();
    // }

    public function SaveorUpdateVentas($data){
    $instVentas = new ventasModel();
    return $instVentas->SaveorUpdateVentas($data);
    }
    

    // public function GetAllProductsForId($id){
    //     $instProductos = new productosModel();
    //     return $instProductos->GetAllProductsForId($id);
    // }    
}

?>