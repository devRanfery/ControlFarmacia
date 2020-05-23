<?php

include_once('prueba.php');
$IdCuenta = $_POST['IdCuentas'];
//echo $IdCuenta;
$insPrueba = new prueba();

echo $insPrueba->GetAllProductos($IdCuenta);
//echo  $insPrueba->GetAllProductos();




