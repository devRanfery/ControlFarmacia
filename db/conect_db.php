<?php
    
class Connection{

    public function Conexion(){
        // $oConBD = mysqli_connect("mysql5027.site4now.net", "a61bf9_farma", "ranfery98", "db_a61bf9_farma");
         $oConBD = mysqli_connect("localhost", "root", "", "cfarmacia");
        return $oConBD; 
    }
       
	}
?>