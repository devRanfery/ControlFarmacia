<?php 
require("../db/conect_db.php");
$sql=("SELECT * FROM Categorias WHERE Genero ='CABALLERO'");
$CatHombre=mysqli_query($conexion,$sql);
?>