 application/x-httpd-php Alumno.php ( PHP script text )
<?php
        session_start();
        include "Comprobarinicio.php";
        include '../Inactividad.php';
      ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Bienvenido a SACEUA</title>
    <!-- Bootstrap core CSS -->
    <link href="../Estilos/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="../Estilos/EstilosAgregar.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <?php
          include'Menu.php'; 
       ?>
    <section class="jumbotron">
        <div class="container">
            <h1>SACEUA</h1>
            <p class="lead">Sistema Academico de Centro de Estudio Universitario ARKOS</p><br>
            <p class="lead">Alumnos</p>
        </div>
        <hr>
        <script type="text/javascript">
            $(document).ready(function () {
                (function ($) {
                    $('#FiltrarContenido').keyup(function () {
                        var ValorBusqueda = new RegExp($(this).val(), 'i');
                        $('.BusquedaRapida tr').hide();
                        $('.BusquedaRapida tr').filter(function () {
                            return ValorBusqueda.test($(this).text());
                        }).show();
                    })
                }(jQuery));
            });
        </script>
        <p class="lead">Estado De Los Alumnos</p>
        <div class="row">
            <div class="col-12 col-md-12">
                <hr>
                <form action='' class='navbar-form navbar-center' role='search'>
                    <div class='form-group'>
                        <label for="nombre">Buscador:</label>
                        <input id="FiltrarContenido" type="text" class="form-control" placeholder="Ingrese datos" aria-label="Alumno" aria-describedby="basic-addon1">
                    </div>
                </form>
                <hr>
                <table class="table table-hover">
                    <thead>
                        <tr align='center' class='table table-hover'>
                            <th>Nº control</th>
                            <th>Nombre</th>
                            <th>Carrera</th>
                            <th>Celular</th>
                            <th>Status</th>
                            <th>Fecha de nacimiento</th>
                            <th>Ciudad</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody class="BusquedaRapida">
                        <?php
            include 'conexion.php';
        $mysql = new conexion();
        $con = $mysql->_ObtenerConexion();
        if(!$con)
        {
            die('error de conexion de servidor:'.mysql_error());
        }
            $consulta = "SELECT  m.IdAlumno,m.NombreAlu,m.numcontrol,c.NomCarrera,m.TelefonoPersonal,m.status,m.FechaNacimiento,m.Ciudad,m.Estado,m.IdUsuario
          	from tblalumno as m 
          	 LEFT JOIN tblcarrera as c
  ON m.IdCarrera=c.IdCarrera
   WHERE m.EliminarL=1";
            $resultado = mysqli_query($con , $consulta);
            $contador=0;

            while($misdatos = mysqli_fetch_assoc($resultado)){ $contador++;?>
                        <tr>
                            <td>
                                <?php echo $misdatos["numcontrol"]; ?>
                            </td>
                            <td>
                                <?php echo $misdatos["NombreAlu"]; ?>
                            </td>
                            <td>
                                <?php echo $misdatos["NomCarrera"]; ?>
                            </td>
                            <td>
                                <?php echo $misdatos["TelefonoPersonal"]; ?>
                            </td>
                            <td>
                                <?php echo $misdatos["status"]; ?>
                            </td>
                            <td>
                                <?php echo $misdatos["FechaNacimiento"]; ?>
                            </td>
                            <td>
                                <?php echo $misdatos["Ciudad"]; ?>
                            </td>
                            <td>
                                <?php echo $misdatos["Estado"]; ?>
                            </td>
                            <td>
                                <?php echo "<a style='margin:3px' class='btn btn-primary' href=EliminaAlumno.php?id=".$misdatos["IdAlumno"]." data-confirm='¿Está seguro de que desea eliminar el alumno seleccionado?'><font color='#ffffff'>Eliminar</font></a>" ?>
                            </td>
                            <td>
                                <?php echo "<a style='margin:3px' class='btn btn-primary' href=EditarAlumno.php?id=".$misdatos["IdAlumno"]."&IdUsuario=".$misdatos["IdUsuario"]."><font color='#ffffff'>Editar</font></a>" ?>
                            </td>
                            <td>
                                <?php echo "<a style='margin:3px' class='btn btn-primary' href=ConsultaAlumno.php?id=".$misdatos["IdAlumno"]."&IdUsuario=".$misdatos["IdUsuario"]."><font color='#ffffff'>Consultar</font></a>" ?>
                            </td>
                        </tr>

                        <?php }?>

                    </tbody>
                </table>
                <!-- Fin Contenido -->
            </div>
        </div>
        <script>
            $(document).ready(function () {
                $('a[data-confirm]').click(function (ev) {
                    var href = $(this).attr('href');
                    if (!$('#confirm-delete').length) {
                        $('body').append('<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header bg-danger text-white">ELIMINAR ALUMNO<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">¿Está seguro de que desea eliminar el alumno seleccionado?</div><div class="modal-footer"><button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button><a class="btn btn-danger text-white" id="dataComfirmOK">Eliminar alumno</a></div></div></div></div>');
                    }
                    $('#dataComfirmOK').attr('href', href);
                    $('#confirm-delete').modal({ show: true });
                    return false;

                });
            });
        </script>
    </section>
    <section class="cuerpo">
        <div class="container">
            <center>
                <a href="AgregarAlumno.php" align="center">
                    <button type="submit" class="btn btn-nuevo">Agregar Alumno </button>
                </a>
            </center>
        </div>

    </section>
    <footer>
        <div class="contenedor">
            <p>Copyright &copy; BCB</p>
        </div>
    </footer>
    <!-- Bootstrap core JavaScript -->
    <script src="../Estilos/dist/js/jquery.js"></script>
    <script src="../Estilos/dist/js/bootstrap.min.js"></script>
</body>

</html>