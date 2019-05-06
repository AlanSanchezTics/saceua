<?php
echo 'lista de becas';

		
	$mysqli = new mysqli("www.ceuarkos.edu.mx:3306","ceuarkos","C3u4rk@s2018","ceuarkos_saceua_caja");	
	if (!$mysqli) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";
    
   
$consulta = "SELECT *FROM tblalumno";
    $resultado = mysqli_query( $mysqli, $consulta );
while ($columna = mysqli_fetch_array( $resultado ))
{
 echo $columna['NombreAlu'];
}
  

?>