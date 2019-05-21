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
    <title>SACEUA | Lista De Numeros Contables Asignados</title>


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
            <p class="lead">Numeros Contables</p>
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
        <p class="lead">Numeros Contables Asignados</p>
        <div class="row">
            <div class="col-12 col-md-12">
                <hr>
                <form action='' class='navbar-form navbar-center' role='search'>
                    <div class='form-group'>
                        <label for="nombre">Buscador:</label>
                        <input id="FiltrarContenido" type="text" class="form-control" placeholder="Ingrese datos" aria-label="Servicio" aria-describedby="basic-addon1">
                    </div>
                </form>
                <hr>
                <table class="table table-hover">
                    <thead>
                        <tr align='center' class='table table-hover'>
                            <th>Número de control</th>
                            <th>Nombre</th>
                            <th>No. Contable</th>
                            <th>Telefono Personal</th>
                            <th>Telefono Celular</th>
                            <th>Carrera</th>
                            <th>Nombre Del Periodo</th>
                            <th>Año</th>
                            <th></th>


                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="BusquedaRapida">
                        <?php
                            include 'conexion.php';

                            $sql = "SELECT tblalumno.numcontrol,tblalumno.NombreAlu,tblnocontables.nocontable,tblalumno.TelefonoPersonal,tblalumno.Cel,
                            tblcarrera.NomCarrera,tblperiodo.NombrePeriodo, tblperiodo.ano FROM tblalumno,tblcarrera,tblperiodo,tblnocontables 
                            where tblalumno.IdCarrera=tblcarrera.IdCarrera and 
                            tblalumno.Periodo=tblperiodo.IdPeriodo and tblalumno.IdAlumno=tblnocontables.idAlumno";

                            $result = mysqli_query($conn, $sql);

                            while ($reg = mysqli_fetch_array($result)) {
                                echo '
                                <tr>
                                    <th scope="row">'.$reg[0].'</th>
                                    <td>'.$reg[1].'</td>
                                    <td> '.$reg[2].'</td>
                                    <td> '.$reg[3].'</td>
                                    <td> '.$reg[4].'</td>
                                    <td> '.$reg[5].'</td>
                                    <td> '.$reg[6].'</td>
                                    <td> '.$reg[7].'</td>
                                    <td><a style="margin:3px" class="btn btn-danger" href=EliminaServicio.php?id='.$reg[0].' data-confirm="¿Está seguro de que desea eliminar el servicio seleccionado?"><font color="#ffffff">Eliminar</font</a></td> 
                                    
                                    
                                </tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                $('a[data-confirm]').click(function (ev) {
                    var href = $(this).attr('href');
                    if (!$('#confirm-delete').length) {
                        $('body').append('<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header bg-danger text-white">ELIMINAR SERVICIO<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">¿Está seguro de que desea eliminar el servicio seleccionado?</div><div class="modal-footer"><button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button><a class="btn btn-danger text-white" id="dataComfirmOK">Eliminar alumno</a></div></div></div></div>');
                    }
                    $('#dataComfirmOK').attr('href', href);
                    $('#confirm-delete').modal({ show: true });
                    return false;

                });
            });
        </script>

    </section>

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