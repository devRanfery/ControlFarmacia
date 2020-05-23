<?php 
require("../db/conect_db.php");
$sql=("SELECT * FROM Categorias WHERE Genero = 'DAMA'");
$CatDama=mysqli_query($conexion,$sql);
?>