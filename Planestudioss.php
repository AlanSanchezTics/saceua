<?php
include 'conexion.php';

$query="SELECT `IdPlanEst`, `Vigencia` FROM `tblplanestudio` WHERE IdCarrera=".$_REQUEST["pais"]." ORDER BY Vigencia";
$result = mysqli_query($conn, $query);        


while (($fila = mysqli_fetch_array($result)) != NULL) {
    echo '<option value="'.$fila["IdPlanEst"].'">'.$fila["Vigencia"].'</option>';
}
// Liberar resultados
mysqli_free_result($result);

// Cerrar la conexión


?>
