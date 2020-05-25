<?php
    include_once('../db/conect_db.php');

    $conex = new Connection();
    $conn = $conex->Conexion();

    $salida = "";

   

    if (isset($_POST['consulta'])) {
    	$q = $conn->real_escape_string($_POST['consulta']);
      $query = " 
      SELECT	V.idventas, V.fecha 'Fecha', V.producto_FK 'IdProducto', P.descripcion 'Producto',
			V.cantidad, V.precio, V.total 'TotalVenta', V.cuenta_FK as 'IdCuenta', C.cuenta, C.subtotal, C.descuento, 
			C.total, C.comentario, C.empleado_FK 'IdEmpleado', E.nombre 'Empleado'
	    FROM ventas V
	    INNER JOIN productos P ON p.idproductos = V.producto_FK
	    INNER JOIN cuentas C ON C.idcuentas = V.cuenta_FK
	    INNER JOIN empleado E ON E.id= C.empleado_FK
      WHERE V.idventas LIKE '%$q%' OR C.idcuentas LIKE '%$q%'
      ";
    }
  
    $result = $conn->query($query);
  
    if ($result->num_rows>0) {
    	$salida.="<table class='table table-borderless table-striped table-earning tabla_datos'>
    			<thead>
    				<tr id='titulo'>
    					<th class='text-center'>Venta</th>
    					<th class='text-center'>Fecha</th>
    					<th class='text-center'>Producto</th>
    					<th class='text-center'>Cantidad</th>
              <th class='text-center'>Precio</th>
              <th class='text-center'>Total Venta</th>
              <th class='text-center'>Cuenta</th>
              <th class='text-center'>Subtotal</th>
              <th class='text-center'>Descuento</th>
              <th class='text-center'>Total Cuenta</th>
              <th class='text-center'>Empleado</th>
    				</tr>
    			</thead>
    	<tbody>";
    	while ($fila = $result->fetch_assoc()) {
    		$salida.="<tr>
    					<td class='text-center'>".$fila['idventas']."</td>
    					<td class='text-center'>".$fila['Fecha']."</td>
    					<td class='text-center'>".$fila['Producto']."</td>
    					<td class='text-center'>".$fila['cantidad']."</td>
              <td class='text-center'>$".$fila['precio']."</td>
              <td class='text-center'>$".$fila['TotalVenta']."</td>
              <td class='text-center'>".$fila['IdCuenta']."</td>
              <td class='text-center'>$".$fila['subtotal']."</td>
              <td class='text-center'>$".$fila['descuento']."</td>
              <td class='text-center'>$".$fila['total']."</td>
              <td class='text-center'>".$fila['Empleado']."</td>
    				</tr>";
    	}
    	$salida.="</tbody></table>";
    }else{
         $query = "CALL `GetAllVentas`();";  
      $result = $conn->query($query);
 
    	    	$salida.="<table class='table table-borderless table-striped table-earning tabla_datos'>
    			<thead>
    				<tr id='titulo'>
    					<th class='text-center'>Venta</th>
    					<th class='text-center'>Fecha</th>
    					<th class='text-center'>Producto</th>
    					<th class='text-center'>Cantidad</th>
              <th class='text-center'>Precio</th>
              <th class='text-center'>Total Venta</th>
              <th class='text-center'>Cuenta</th>
              <th class='text-center'>Subtotal</th>
              <th class='text-center'>Descuento</th>
              <th class='text-center'>Total Cuenta</th>
              <th class='text-center'>Empleado</th>
    				</tr>
    			</thead>
    	<tbody>";
    	while ($fila = $result->fetch_assoc()) {
    		$salida.="<tr>
    					<td class='text-center'>".$fila['idventas']."</td>
    					<td class='text-center'>".$fila['Fecha']."</td>
    					<td class='text-center'>".$fila['Producto']."</td>
    					<td class='text-center'>".$fila['cantidad']."</td>
              <td class='text-center'>$".$fila['precio']."</td>
              <td class='text-center'>$".$fila['TotalVenta']."</td>
              <td class='text-center'>".$fila['IdCuenta']."</td>
              <td class='text-center'>$".$fila['subtotal']."</td>
              <td class='text-center'>$".$fila['descuento']."</td>
              <td class='text-center'>$".$fila['total']."</td>
              <td class='text-center'>".$fila['Empleado']."</td>
    				</tr>";
    	}
    	$salida.="</tbody></table>";
    }


    echo $salida;

    $conn->close();



?>