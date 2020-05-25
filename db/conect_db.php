<?php
    
class Connection{

    public function Conexion(){
        // $oConBD = mysqli_connect("mysql5027.site4now.net", "a61bf9_farma", "ranfery98", "db_a61bf9_farma");
         $oConBD = mysqli_connect("localhost", "root", "", "controlfarmacia");
        return $oConBD; 
    }
       
    }
    // SELECT	V.idventas, V.fecha 'Fecha', 
	// 		v.producto_FK, p.descripcion,
	// 		v.cantidad, 
	// 		v.precio, 
	// 		v.total 'TotalVenta', v.cuenta_FK 'Id_Cuenta', c.cuenta, 
	// 		c.subtotal, C.descuento, C.total, C.comentario, c.empleado_FK 'IdEmpleado',
	// 		E.nombre + ' ' + E.apellidot AS 'Empleado'
	// FROM ventas V
	// INNER JOIN productos P ON P.idproductos = V.producto_FK
	// INNER JOIN cuentas C ON C.idcuentas = V.cuenta_FK
	// INNER JOIN empleado E ON E.id = C.empleado_FK
	// WHERE v.cuenta_FK =  and v.estatus = 1
	// ORDER BY V.producto_FK asc
?>