<?php
    include 'conexion.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $result = mysqli_query($conn,"Select * FROM tblconceptos where idconcepto=".$id);
        if(!$result){
                echo "error de consulta: ".mysqli_error();
                exit();
        }else{
            $row = mysqli_fetch_row($result);
        }
    }else{  
        header('Location: VistaServicios.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SACEUA | Lista de servicios</title>


    <!-- Bootstrap core CSS -->
    <link href="./Estilos/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="./Estilos/EstilosAgregar.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <?php
          include 'Menu.php'; 
       ?>
    <section class="jumbotron">
        <div class="container">
            <h1>SACEUA</h1>
            <p class="lead">Sistema Academico de Centro de Estudio Universitario ARKOS</p><br>
        </div>
        <hr>
        <p class="lead">Editar concepto</p>
        <hr>
    </section>
    <section class="cuerpo">
        <div class="container">
            <form class="form-datos" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" role="form">
                <span style="font-weight:bold;color:#000080;">Datos del concepto&nbsp;</span>
                <hr/>
                <label for="nombre" class="col-lg-3 control-label">Nombre de concepto:</label>
                <div class="col-lg-9">
                    <input type="hidden" name="idservicio" value="<?php echo $row[0]; ?>">
                    <input type="text" placeholder="Nombre" name="name" value="<?php echo $row[1]; ?>" class="form-control" id="nombre" required><br>
                </div>


                <div class="[ form-group ]">
            <input type="checkbox" name="fancy-checkbox-primary" id="fancy-checkbox-primary" autocomplete="off" <?php if($row[2]==1){echo "checked";}?>/>
            <div class="[ btn-group ]">
                <label for="fancy-checkbox-primary" class="[ btn btn-primary ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="fancy-checkbox-primary" class="[ btn btn-default active ]">
                    ¿Aplicable A Beca?
                </label>
            </div>
        </div>
                <hr>
                <br><br>
                <input class="btn btn-primary" type="submit" name="enviar" value="Guardar">
                <a class="btn btn-primary" href="VistaServicios.php" role="button">Consultar o Eliminar</a>
            </form>
        </div>
    </section>
    <?php
        if(isset($_POST["enviar"])){
            $idservicio = $_POST["idservicio"];
            $servicio = $_POST["name"];
            if(isset($_POST["fancy-checkbox-primary"])){
                $descontable = $_POST["fancy-checkbox-primary"];
            }       

            if(isset($descontable)){
                $descontable=1;
            }else{
                $descontable=0; 
            }          

            $sql = "UPDATE tblconceptos SET concepto = '{$servicio}', descontable = {$descontable} WHERE idconcepto = {$idservicio}";
            $result = mysqli_query($conn, $sql);

            if($result){
                ?>
    <script>
        alert("Servicio Actualizado con exito.");
        window.location.href='VistaServicios.php';
    </script>
    <?php
            }
        }
    ?>
    <footer>
        <div class="contenedor">
            <p>Copyright &copy; BCB</p>
        </div>
    </footer>
    <!-- Bootstrap core JavaScript -->
    <script src="./Estilos/dist/js/jquery.js"></script>
    <script src="./Estilos/dist/js/bootstrap.min.js"></script>
</body>

</html>