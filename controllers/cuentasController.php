<?php

require_once('../../models/modelCuentas.php');

class cuentasController{

    // public function GetAllCategory(){
    //     $resultado = new CategoryModel();
    //     return $resultado->GetAllCategory();
    // }

    public function SaveorUpdateCuentas($data){
    $instCuentas = new cuentasModel();
    return $instCuentas->SaveorUpdateCuentas($data);
    }
    

    // public function GetAllProductsForId($id){
    //     $instProductos = new productosModel();
    //     return $instProductos->GetAllProductsForId($id);
    // }    
}

?>