<?php 
	require("../db/conect_db.php");

	//OBTENER LOS DATOS DEL FORMULARIO
	$id = $_POST['id'];

	$sql = "SELECT * FROM productos WHERE Id = $id";

	$consulta = mysqli_query($conexion, $sql);

	$tabla=[];
	$i=0;

	while($fila= mysqli_fetch_array($consulta)){
		$tabla[$i]=$fila;
		$i++;
	}

	echo json_encode($tabla);

	
	
 ?>