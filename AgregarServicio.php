<?php
    include 'conexion.php';
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
        <p class="lead">Registro de nuevo servicio</p>
        <hr>
    </section>
    <section class="cuerpo">
        <div class="container">
            <form class="form-datos" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" role="form">
                <span style="font-weight:bold;color:#000080;">Informacion de registro&nbsp;</span>
                <hr/>
                <label for="nombre" class="col-lg-3 control-label">Nombre de servicio:</label>
                <div class="col-lg-9">
                    <input type="text" placeholder="Nombre" name="name" class="form-control" id="nombre" required><br>
                </div>
                <label class="col-lg-3 control-label">Costo:</label>
                <div class="col-lg-9">
                    <input type="tel" placeholder="Costo" name="costo" class="form-control" id="costo" pattern="^[0-9]+([.][0-9]+)?$" required><br>
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
            $servicio = $_POST["name"];
            $costo = $_POST["costo"];

            $sql = "INSERT INTO tblservicios(nombre_servicio, costo_servicio, status) VALUE('{$servicio}', {$costo},1)";
            $result = mysqli_query($conn, $sql);

            if($result){
                ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.1/jquery.jgrowl.min.css"
    />
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.1/jquery.jgrowl.min.js"></script>
    <script>
        $.jGrowl("EL REGISTRO SE GUARDO CON EXITO!", {
            life: 3000,
            position: 'bottom-right',
            theme: 'test'
        });
    </script>
    <style>
        .test {
            background-color: #31B404;
            width: 300px;
            height: 80px;
            text-align: center;
        }
    </style>
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