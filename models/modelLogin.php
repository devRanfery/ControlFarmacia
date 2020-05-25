<?php

session_start();
	require_once("../db/conect_db.php");

	$con = new Connection();
	$conexion = $con->Conexion();

	$usuario=$_POST['usuario'];
	$pass=$_POST['password'];


	//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	$sql2=mysqli_query($conexion,"SELECT * FROM empleado WHERE usuario='$usuario'");
	
	if($f2 = mysqli_fetch_assoc($sql2)){
		echo $f2['user'];
		echo $f2['rol'];
		if(($f2['tipoUsuario'] == "admin" && $f2['Estado'] == "1")){
			$_SESSION['id']=$f2['id'];
			$_SESSION['user']=$f2['usuario'];
			$_SESSION['rol']=$f2['tipoUsuario'];
			$_SESSION['name']=$f2['nombre'];
			$_SESSION['lastName']=$f2['apellido'];

			echo '<script>alert("BIENVENIDO ADMINISTRADOR")</script> ';
			header("Location: ../views/index.php");
		
		}elseif (($f2['tipoUsuario'] = 'cajero' && $f2['Estado'] == "1" )) {
			session_start();
			$_SESSION['id']=$f2['id'];
			$_SESSION['user']=$f2['usuario'];
			$_SESSION['rol']=$f2['tipoUsuario'];
			$_SESSION['name']=$f2['nombre'];
			$_SESSION['lastName']=$f2['apellido'];


			header("Location: ../cajero/index.php");
			
		}else{
			echo '<script>alert("CONTRASEÑA INCORRECTA O USUARIO NO ESTA ACTIVO")</script> ';
		
			echo "<script>location.href='../views/login.php'</script>";
		}
	}

?>