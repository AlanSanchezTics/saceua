<?php
    include 'conexion.php';

    if(isset($_POST['cntbl']) && isset($_POST['ctrl'])){
    $numerodecontrol=$_POST['ctrl'];
    $numerocontable=$_POST['cntbl'];

    $sql = "SELECT idalumno from tblalumno where numcontrol=$numerodecontrol and status=1";
    $result = mysqli_query($conn, $sql);
    $idalumno = mysqli_fetch_array($result);  
    
    $sql = "SELECT tblnocontables.nocontable,tblnocontables.idalumno from tblnocontables,tblalumno where tblalumno.numcontrol=$numerodecontrol 
    and tblnocontables.idalumno=tblalumno.idalumno and tblnocontables.status=1";
    $result = mysqli_query($conn, $sql);
    $hayono = mysqli_num_rows($result);    
        if($hayono>0){            
            $sql = "UPDATE tblnocontables SET nocontable =$numerocontable WHERE tblnocontables.idAlumno=$idalumno[0]";
            $result = mysqli_query($conn, $sql);
            if($result){
                echo "<script type='text/javascript'>alert('Numero Contable Actualizado Correctamente');</script>";
            }else{
                echo "<script type='text/javascript'>alert('No Se Pudo Actualizar Numero Contable');</script>";
            }      
        }else{
            $sql = "insert into tblnocontables(nocontable,IdAlumno,status) values($numerocontable,$idalumno[0],1)";
            $result = mysqli_query($conn, $sql);
            if($result){
                echo "<script type='text/javascript'>alert('Numero Contable Asignado Correctamente');</script>";
            }else{
                echo "<script type='text/javascript'>alert('No Se Pudo Asignar Numero Contable');</script>";
            }              
        }
    };
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SACEUA | Pagar Servicios</title>

    <!-- Bootstrap core CSS -->
    <link href="./Estilos/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="./Estilos/EstilosAgregar.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/contact.js"></script>
-->

</head>

<body>


<div id="contact-modal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3>Asignar Nuevo Numero Contable</h3>
			</div>
			<form id="contactForm" name="contact" role="form" method="POST">
				<div class="modal-body">				
					<div class="form-group">
						<label for="name">Ingrese Numero Contable</label>
						<input type="text" name="cntbl" id="cntbl" class="form-control">
                        <input type="hidden" name="ctrl" id="ctrl" class="form-control">
					</div>
								
				</div>
				<div class="modal-footer">					
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<input type="submit" class="btn btn-primary" id="submit" value="Asignar">
				</div>
			</form>
		</div>
	</div>
</div>
    <script>
    window.addEventListener("load", function() {
  miformulario.nocontrol.addEventListener("keypress", soloNumeros, false);
  contact.cntbl.addEventListener("keypress", soloNumeros, false);
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
            <p class="lead">Pago De Servicios</p>
        </div>
        <hr>
        
        <p class="lead">Busqueda De Alumnos</p>
        <div class="row">
            <div class="col-12 col-md-12">
                <hr>
                <form name="miformulario" action='vistaPagarServicio.php' method='post' class='navbar-form navbar-center' role='search'>
                    <div class='form-group'>
                        <label for="nombre">Buscador:</label>
                        <input id="nocontrol" name= "nocontrol" type="text" class="form-control" placeholder="Numero De Control" aria-label="Servicio" aria-describedby="basic-addon1">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </div>
                </form>
                <hr>
                <table class="table table-hover">
                    <thead>
                        <tr class='table table-hover'>
                            <th class="text-center">Número de control</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">No. Contable</th>
                            <th class="text-center">Carrera</th>
                            <th class="text-center">Nombre Del Periodo</th>
                            <th class="text-center">Reinscripcion</th>
                            <th class="text-center">Enero</th>
                            <th class="text-center">Febrero</th>
                            <th class="text-center">Marzo</th>
                            <th class="text-center">Abril</th>
                            <th class="text-center" colspan="2">Observaciones</th>
                                                    
                        </tr>
                    </thead>
                    <tbody class="BusquedaRapida">
                    <?php
    
    if(isset($_POST["nocontrol"])){
            
    if(is_null($_POST["nocontrol"]) || empty($_POST["nocontrol"])){
          }else{    
    $nocontrol=$_POST["nocontrol"];

    $sql = "SELECT tblnocontables.nocontable from tblnocontables,tblalumno where tblalumno.numcontrol=$nocontrol and tblalumno.idalumno=tblnocontables.idalumno and tblnocontables.status=1";
                        $result = mysqli_query($conn, $sql);
                        $num_rows = mysqli_num_rows($result);
                        if($num_rows<=0){
                            $nocontablesql=mysqli_fetch_array($result);                                                     
                            $isassgigned="No Asignado";                            
                        }else{
                            $nocontablesql=mysqli_fetch_array($result);
                            $isassgigned=$nocontablesql[0];
                        }


    $sql = "SELECT tblalumno.numcontrol,tblalumno.NombreAlu,tblalumno.TelefonoPersonal,
    tblalumno.Cel, tblcarrera.NomCarrera,tblperiodo.NombrePeriodo, tblperiodo.ano FROM 
    tblalumno,tblcarrera,tblperiodo where tblalumno.IdCarrera=tblcarrera.IdCarrera and 
    tblalumno.Periodo=tblperiodo.IdPeriodo and tblalumno.numcontrol=$nocontrol";

                        $result = mysqli_query($conn, $sql);
                        $num_rows = mysqli_num_rows($result);
                        
                        if($num_rows<=0){                           
                            echo '<script language="javascript">
                            alert("Alumno No Encontrado")
                           </script>';                           
                        }else{                       

                        while ($reg = mysqli_fetch_array($result)) {
                            echo '
                            <tr>
                                <th scope="row">'.$reg[0].'</th>
                                <td>'.$reg[1].'</td>
                                <td> '.$isassgigned.' </td>
                                <td> '.$reg[2].'</td>
                                <td> '.$reg[5].'</td>
                                <td>1</td>
                                <td>
                                <select class="form-control">
                                <option>Seleccione</option>
                                <option>pago 2</option>
                                <option>pago 3</option>
                                </select>
                                <input type="text" placeholder="Comentario" class="form-control">
                                <br>
                                <select class="form-control">
                                <option>Seleccione</option>
                                <option>pago 2</option>
                                <option>pago 3</option>
                                </select>
                                <input type="text" placeholder="Comentario" class="form-control">
                                
                                </td>

                                <td>
                                <select class="form-control">
                                <option>Seleccione</option>
                                <option>pago 2</option>
                                <option>pago 3</option>
                                </select>
                                <input type="text" placeholder="Comentario" class="form-control">
                                <br>
                                <select class="form-control">
                                <option>Seleccione</option>
                                <option>pago 2</option>
                                <option>pago 3</option>
                                </select>
                                <input type="text" placeholder="Comentario" class="form-control">
                                </td>

                                <td>
                                <select class="form-control">
                                <option>Seleccione</option>
                                <option>pago 2</option>
                                <option>pago 3</option>
                                </select>
                                <input type="text" placeholder="Comentario" class="form-control">
                                <br>
                                <select class="form-control">
                                <option>Seleccione</option>
                                <option>pago 2</option>
                                <option>pago 3</option>
                                </select>
                                <input type="text" placeholder="Comentario" class="form-control">                                
                                </td>

                                <td>
                                <select class="form-control">
                                <option>Seleccione</option>
                                <option>pago 2</option>
                                <option>pago 3</option>
                                </select>
                                <input type="text" placeholder="Comentario" class="form-control">
                                <br>
                                <select class="form-control">
                                <option>Seleccione</option>
                                <option>pago 2</option>
                                <option>pago 3</option>
                                </select>
                                <input type="text" placeholder="Comentario" class="form-control">                                
                                </td>
                                
                                <td> <textarea class="form-control" placeholder="Observaciones" style="resize:none;font-size:12px"></textarea></td>
                                                             
                            </tr>';      
    }
}
}
}
?>
                       
                    </tbody>

                    <script>
                    $( "#btnasign" ).click(function() {
                           var href =$("#btnasign").attr("href");
                           $("#ctrl").val(href);
                    });
                    </script>
                </table>
            </div>
        </div>
        

    </section>

    <footer>
        <div class="contenedor">
            <p>Copyright &copy; BCB</p>
        </div>
    </footer>
    <!-- Bootstrap core JavaScript -->
   </body>
</html>