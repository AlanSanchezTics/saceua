<?php
    include 'conexion.php';
     if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "UPDATE tblconceptos SET status = 0 WHERE idconcepto = {$id}";
        if(mysqli_query($conn, $sql) === TRUE){
            header("Location: VistaServicios.php");
        }else{
            echo "Error al eliminar el concepto: ".mysqli_error($conn);
        }
     }else{
         header("Location: VistaServicios.php");
     }
?>