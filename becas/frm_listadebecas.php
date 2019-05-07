<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<?php		
$mysqli = new mysqli("www.ceuarkos.edu.mx:3306","ceuarkos","C3u4rk@s2018","ceuarkos_saceua_caja");   
$consulta = "SELECT tblbecas.idbeca,tblalumno.NombreAlu,tblbecas.porcentaje,tblperiodo.NombrePeriodo,tblperiodo.ano FROM tblbecas,tblalumno,tblperiodo where tblbecas.idAlumno=tblalumno.IdAlumno and tblbecas.idPeriodo=tblperiodo.IdPeriodo and tblbecas.status=1;";
$resultado = mysqli_query( $mysqli, $consulta );
echo "
<table class='table table-hover'>
  <thead class='thead-dark'>
    <tr>
      <th scope='col'># Beca</th>
      <th scope='col'>Nombre Alumno</th>
      <th scope='col'>Porcentaje</th>
      <th scope='col'>Periodo</th>
      <th scope='col'>Año</th>
    </tr>
  </thead>
  <tbody> 
  ";
while($columna = mysqli_fetch_array( $resultado )){
	echo "
		<tr>
            <td>".$columna[0]."</td>
            <td>".$columna[1]."</td>
            <td>".$columna[2]."</td>
            <td>".$columna[3]."</td>
            <td>".$columna[4]."</td>
		</tr>";
}
echo "</tbody>
</table>";
?>
</body>
</html>