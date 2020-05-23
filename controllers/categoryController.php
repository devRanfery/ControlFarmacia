<?php

require_once('../models/modelCategory.php');

class categoryController{

    public function GetAllCategory(){
        $resultado = new CategoryModel();
        return $resultado->GetAllCategory();
    }

    public function SaveorUpdateCategory($data){
    $instCategory = new categoryModel();
    return $instCategory->SaveorUpdateCategory($data);
    }
    

    // public function GetAllProductsForId($id){
    //     $instProductos = new productosModel();
    //     return $instProductos->GetAllProductsForId($id);
    // }    
}

?>