<?php

    $hostname="localhost";
	$username="root";
	$password="";
	$dbname="ceuarkos_saceua123";
		
	mysql_connect($hostname,$username, $password);
	mysql_select_db($dbname);
	
	
	$query = “SELECT *FROM tbl_alumno”;	
	$result = mysql_query($query);
	
	si($result){
		while($row = mysql_fetch_array($result)){
			$name = $row["NombreAlu"];
			echo "Nombre: ".$name."br/>";
		}
	}

?>