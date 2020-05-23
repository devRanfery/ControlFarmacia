<?php

require_once('../models/modelProducts.php');

class productosController{

    public function GetAllProductos(){
        $resultado = new productosModel();
        return $resultado->GetAllProductos();
    }

    public function GetAllProductsForId($id){
        $instProductos = new productosModel();
        return $instProductos->GetAllProductsForId($id);
    }    
}

?>