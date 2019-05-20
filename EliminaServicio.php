<?php
    include 'conexion.php';
     if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "UPDATE tblservicios SET status = 0 WHERE idservicio = {$id}";
        if(mysqli_query($conn, $sql) === TRUE){
            header("Location: VistaServicios.php");
        }else{
            echo "Error al eliminar Servicio: ".mysqli_error($conn);
        }
     }else{
         header("Location: VistaServicios.php");
     }
?>