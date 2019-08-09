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
    <title>SACEUA | Lista De Numeros Contables No Asignados</title>

    <!-- Bootstrap core CSS -->
    <link href="./Estilos/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="./Estilos/EstilosAgregar.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <script>
    window.addEventListener("load", function() {
  
});

function soloNumeros(e){
  var key = window.event ? e.which : e.keyCode;
  if (key < 48 || key > 57) {
    e.preventDefault();
  }
}


    </script> 



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
        
        <p class="lead">Numeros Contables Asignados</p>
        <div class="row">
            <div class="col-12 col-md-12">
                <hr>
                <form name="miformulario" action='vistaNcontables.php' method='post' class='navbar-form navbar-center' role='search'>
                    <div class='form-group'>
                        <label for="nombre">Buscador:</label>
                        <input id="nocontrol" name= "nocontrol" type="text" class="form-control" placeholder="Numero De Control" aria-label="Servicio" aria-describedby="basic-addon1">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </div>
                </form>
                <hr>
                <table class="table table-hover">
                    <thead>
                        <tr align='center' class='table table-hover'>
                            <th class="text-center">Número de control</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Carrera</th>
                            <th class="text-center">No. contable</th>
                            <th class="text-center">Periodo</th>
                            <th class="text-center">Año</th>
                            <th></th>


                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="BusquedaRapida">
                    <?php
    
    if(isset($_POST["nocontrol"])){
            
    if(is_null($_POST["nocontrol"]) || empty($_POST["nocontrol"])){
       
   }else{   

    $nocontrol=$_POST["nocontrol"];
    $sql = "SELECT tblalumno.numcontrol,tblalumno.NombreAlu, tblcarrera.NomCarrera, tblalumno.nocontable,tblperiodo.NombrePeriodo, tblperiodo.ano FROM 
    tblalumno,tblcarrera,tblperiodo where tblalumno.IdCarrera=tblcarrera.IdCarrera and 
    tblalumno.Periodo=tblperiodo.IdPeriodo AND tblalumno.numcontrol='$nocontrol'";

                        $result = mysqli_query($conn, $sql);
                        $num_rows = mysqli_num_rows($result);
                        
                        if($num_rows<=0){                           
                            echo '<script language="javascript">
                            alert("Alumno No Encontrado")
                           </script>';                           
                        }
                        $reg = mysqli_fetch_array($result);
                        if($reg[3]==0){
                            echo '<script language="javascript">
                            alert("Alumno Sin Numero Contable Asignado")
                           </script>';     
                        }else{                           
                                echo '
                                <tr>
                                    <th scope="row" class="text-center">'.$reg[0].'</th>
                                    <td class="text-center">'.$reg[1].'</td>
                                    <td class="text-center">'.$reg[2].'</td>
                                    <td class="text-center">'.$reg[3].'</td>
                                    <td class="text-center"> '.$reg[4].'</td>
                                    <td class="text-center"> '.$reg[5].'</td>
                                </tr>'; 
                            }

                        
}
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