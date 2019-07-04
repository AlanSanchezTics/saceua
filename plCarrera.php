<?php
include 'conexion.php';

$query="SELECT * from tblcarrera where EliminarL=1";
$result = mysqli_query($conn, $query);
       

while (($fila = mysqli_fetch_array($result)) != NULL) {
    echo '<option value="'.$fila['IdCarrera'].'">'.$fila['NomCarrera'].' '.$fila['ModeloEstudio'].'</option>';
}
// Liberar resultados
mysqli_free_result($result);

// Cerrar la conexi��n


?>