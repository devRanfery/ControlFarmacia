<?php

require_once('../models/modelEmployee.php');

class employeeController{

    public function GetAllEmployee(){
        $resultado = new employeeModel();
        return $resultado->GetAllEmployee();
    }

    public function SaveorUpdateEmployee($data){
        $instEmployee = new employeeModel();
        return $instEmployee->SaveorUpdateEmployee($data);
    }

    // public function GetAllProductsForId($id){
    //     $instProductos = new productosModel();
    //     return $instProductos->GetAllProductsForId($id);
    // }    
}

?>