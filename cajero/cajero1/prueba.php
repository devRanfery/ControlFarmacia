<?php
require_once('configApp.php');
class prueba {
    
    public function GetAllProductos($IdCuenta){
        $conn = sqlsrv_connect(SERVER, connectionInfo);

        $sql = "EXEC GetAllProductosAndVenta @IdCuenta=$IdCuenta";

        $consulta = sqlsrv_query($conn, $sql);
        $tabla = [];
        $i = 0;
        
        while ($fila = sqlsrv_fetch_array($consulta, SQLSRV_FETCH_ASSOC)) {
            $tabla[$i] = $fila;
            $i++;
        }

        //var_dump($tabla);
        echo json_encode($tabla, JSON_FORCE_OBJECT);
        
    }
}