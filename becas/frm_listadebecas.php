<?php
echo 'lista de becas';

		
	$mysqli = new mysqli("localhost", "root", "", "ceuarkos_saceua123");	
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