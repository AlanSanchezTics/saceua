<?php
      session_start();
    include 'conexion.php';
    
    $mysql = new Conexion();
    $mysqli= $mysql->_ObtenerConexion();
    //$promedio = 0.0;
    ?>
<!DOCTYPE html>
<html lang="es">
  <head><meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Bienvenido a SACEUA</title>
    <!-- Bootstrap core CSS -->
    <link href="./Estilos/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="./Estilos/EstilosAgregar.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
        <!--
 
      <link href="../Estilos/dist/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link href="../Estilos/EstilosAgregar.css" rel="stylesheet">
      
      <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
      <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
      <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
      
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-show-password/1.0.3/bootstrap-show-password.min.js"></script>
 
-->




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
           <p class="lead">Socilicitud de inscripcion</p>
              <hr>
      </section>
	  <section class="cuerpo">
          <div class="container">
          <form  class="form-datos" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" role="form">
             <span style="font-weight:bold;color:#000080;">Informacion de registro&nbsp;</span>
              <hr>
                  <label for="nombre" class="col-lg-3 control-label">Usuario:</label>
                  <div class="col-lg-9">
                      <input type="text" placeholder="Usuario" name="user" class="form-control" id="nombre"><br>
                  </div>
              
                  <label  class="col-lg-3 control-label">Contrasena:</label>
                  <div class="col-lg-9">
                      <input type="password" placeholder="Contraseña" name="pass" class="form-control" data-toggle="password"><br>
                  </div>
                    
              
              <span style="font-weight:bold;color:#000080;">Datos escolares&nbsp;</span>
              <hr>
              <label class="col-lg-3 control-label">Carrera:</label>
              <div class="col-lg-9">
                                  <div class="selector-pais">
                                <select name="curso" class="form-control">
                                    <script type="text/javascript">
                                         $(document).ready(function() {
                                            $.ajax({
                                                    type: "POST",
                                                    url: "plCarrera.php",
                                                    success: function(response)
                                                    {
                                                        $('.selector-pais select').html(response).fadeIn();
                                                    }
                                            });
                        
                                        });
                                    </script>
                                      </select>  
                                </div>
                                <br>
                  </div>
                  <br>
            <label class="col-lg-3 control-label">Plan De Estudios:</label>
            <div class="col-lg-9">
                           <div class="sin-json">
                         <select name="plan" class="form-control">
                <script type="text/javascript">
                     $(document).ready(function() {
                    $(".selector-pais select").change(function() {
                        var form_data = {
                                is_ajax: 1,
                                pais: +$(".selector-pais select").val()
                        };
                        $.ajax({
                                type: "POST",
                                url: "Planestudioss.php",
                                data: form_data,
                                success: function(response)
                                {
                                    $('.sin-json select').html(response).fadeIn();
                                }
                        });
                    });

                });
                </script>
                             </select>
                             </div>
                             <br>      
            </div>
                             <label class="col-lg-3 control-label">Periodo:</label>
                         <div class="col-lg-9">
                              <select name="Periodo" class="form-control">
                        <option select value="">Seleccione</option><br>
                         <?php
                             $query = $mysqli ->query("select* from tblperiodo where EliminarL=1");
                            while ($valores = mysqli_fetch_array($query)) 
                            {
                                 echo '<option value="'.$valores['IdPeriodo'].'">'.$valores['NombrePeriodo'].'  '.$valores['ano'].'</option>';
                            }
                        ?>
        
                        </select><br>
                </div>
              <label class="col-lg-3 control-label">Num. Control:</label>
                  <div class="col-lg-9">
                      <input type="text" class="form-control" id="nc" name="nc"><br>
                  </div>
              <label for="turno" class="col-lg-3 control-label">Turno:</label>
                  <div class="col-lg-9">
                      <select name="turno" class="form-control">
                                <Option select value="">Seleccione</Option>
                                <Option value="Matutino">Matutino</Option>
                                <Option value="Vespertino">Vespertino</Option>
                                </select><br>
                  </div>
              <label for="nombre" class="col-lg-3 control-label">Cuatrimestre:</label>
                  <div class="col-lg-9">
                      <select name="cuatri" class="form-control">
                                <Option select value="">Seleccione</Option>
                                <Option value="PRIMER">PRIMER</Option>
                                <Option value="SEGUNDO">SEGUNDO</Option>
                                <Option value="TERCER">TERCER</Option>
                                <Option value="CUARTO">CUARTO</Option>
                                <Option value="QUINTO">QUINTO</Option>
                                <Option value="SEXTO">SEXTO</Option>
                                <Option value="SEPTIMO">SEPTIMO</Option>
                                <Option value="OCTAVO">OCTAVO</Option>
                                <Option value="NOVENO">NOVENO</Option>
                                <Option value="DECIMO">DECIMO</Option>
                                </select><br>
                  </div>
              <span style="font-weight:bold;color:#000080;">Datos del aspirante&nbsp;</span>
              <hr>
              <label class="col-lg-3 control-label">Apellido Paterno:</label>
              <div class="col-lg-9">
                  <input type="text-white" name="Apellidop" onKeyUp="this.value=this.value.toUpperCase();" class="form-control"><br>    
                  </div>
                  <label class="col-lg-3 control-label">Apellido Materno:</label>
              <div class="col-lg-9">
                  <input type="text-white" name="Apellidom" onKeyUp="this.value=this.value.toUpperCase();" class="form-control"><br>    
                  </div>
              <label class="col-lg-3 control-label">Nombre (s):</label>
              <div class="col-lg-9">
                  <input type="text-white" name="nombre" onKeyUp="this.value=this.value.toUpperCase();" class="form-control"><br>    
                  </div>
             <label class="col-lg-1 control-label">Calle:</label>
              <div class="col-lg-5">
                      <input type="text-white" name="Calle" class="form-control" ><br>
                  </div>
              <label class="col-lg-1 control-label">Num. Int.:</label>
              <div class="col-lg-2">
                      <input type="text-white" name="NumInt" class="form-control" ><br>
                  </div>
              <label class="col-lg-1 control-label">Num. Ext.:</label>
              <div class="col-lg-2">
                      <input type="text-white" name="NumExt" class="form-control" ><br>
                  </div>
                  <label class="col-lg-1 control-label">Colonia:</label>
              <div class="col-lg-5">
                      <input type="text-white" name="Colon" class="form-control" ><br>
                  </div>
                  <label class="col-lg-1 control-label">Codigo Postal:</label>
              <div class="col-lg-5">
                      <input type="text-white" name="Cp" class="form-control" ><br>
                  </div>
              <label class="col-lg-3 control-label">Telefono particular:</label>
              <div class="col-lg-9">
                  <input type="text-white" name="celular" class="form-control"> <br>   
                  </div>
                  <label class="col-lg-3 control-label">Sexo:</label>
                  <div class="col-lg-9">
                      <select name="Sexo" class="form-control">
                                <Option select value="">Seleccione</Option>
                                <Option value="Hombre">Hombre</Option>
                                <Option value="Mujer">Mujer</Option>
                                </select><br>
                  </div>

              <label class="col-lg-3 control-label">Telefono (Celular):</label>	
              <div class="col-lg-9">
                      <input type="text-white" name="teltra" class="form-control"><br>
                  </div>
             
              <label class="col-lg-3 control-label">Correo:</label>
              <div class="col-lg-9">
              <input type="email" placeholder="Correo Electronico" name="correo" class="form-control" ><br>       
                  </div>
              <label class="col-lg-3 control-label">Lugar de nacimiento:</label>
              <div class="col-lg-9">
                      <input type="text-white" name="lugarnac" class="form-control" ><br>
                  </div>
                  <label class="col-lg-3 control-label">Estado de nacimiento:</label>
              <div class="col-lg-9">
                      <input type="text-white" name="Estadonac" class="form-control" ><br>
                  </div>
              <label class="col-lg-3 control-label">Fecha de nacimiento:</label>
              <div class="col-lg-9">
                      <input type="text-white" placeholder="dia mes anio" name="fechanac" class="form-control"><br>
                  </div>
              <label class="col-lg-3 control-label">Empresa donde trabaja</label>	
              <div class="col-lg-9">
                      <input type="text-white" name="nombretra" class="form-control"><br>
                  </div>
              <label class="col-lg-3 control-label">Escuela de Procedencia :</label>
              <div class="col-lg-9">
                      <input type="text-white" name="escuelapr" class="form-control"><br>
                  </div>
              <label class="col-lg-3 control-label" >Ciudad:</label>
              <div class="col-lg-9">
                      <input type="text-white" name="ciudad" class="form-control" ><br>
                  </div>
              <label class="col-lg-3 control-label">Estado:</label>
              <div class="col-lg-9">
                      <input type="text-white" name="estado" class="form-control" ><br>
                  </div>
              <label class="col-lg-3 control-label">Promedio:</label><br>
              <div class="col-lg-9">
                      <input type="text-white" name="promedio" class="form-control"><br>
                  </div>
              <span style="font-weight:bold;color:#000080;">Datos generales&nbsp;</span>
              <hr>
              <label class="col-lg-3 control-label">Aficion:</label>
              <div class="col-lg-9">
                      <input type="text" name="Aficion"class="form-control"><br>
                  </div>
              <label class="col-lg-3 control-label">Deporte que practica:</label>
              <div class="col-lg-9">
                      <input type="text" name="deporte" class="form-control"><br>
                  </div>
              <label class="col-lg-3 control-label"> Enfermedades que padece:</label>
              <div class="col-lg-9">
                      <input type="text" name="enfermedades" class="form-control"><br>
                  </div>
              <label class="col-lg-3 control-label">Problemas Fisicos:</label>
              <div class="col-lg-9">
                      <input type="text" name="ProblemasF" class="form-control"><br>
                  </div>
              	<label class="col-lg-3 control-label">Tratamiento medico:</label>
              <div class="col-lg-9">
                      <input type="text" name="TratamientoMed" class="form-control"><br>
                  </div>
              <label class="col-lg-3 control-label" class="form-control">Tipo de sangre:</label>
                  <div class="col-lg-9">
                      <select name="tsangre" class="form-control">
                                <Option value="">Seleccione</Option>
                                <Option value="O negativo">O negativo</Option>
                                <Option value="O positivo">O positivo</Option>
                                <Option value="A negativo">A negativo</Option>
                                <Option value="A positivo">A positivo</Option>
                                <Option value="B negativo">B negativo</Option>
                                <Option value="B positivo">B positivo</Option>
                                <Option value="AB negativo">AB negativo</Option>
                                <Option value="AB positivo">AB positivo</Option>
                                </select><br>
                      </div>
                      <span style="font-weight:bold;color:#000080;">Documentacion&nbsp;</span>
              <hr>
                 <div class="col-lg-4">
                  <label class="col-lg-6 control-label" class="form-control">Acta de nacimiento:</label>
                      <input type="checkbox" name="ActaNacimiento" value="ENTREGADO"><br><br>
                  </div>
              <div class="col-lg-4">
                  <label class="col-lg-6 control-label" class="form-control">Certificado de bachillerato</label>
                      <input type="checkbox" name="Certificado" value="ENTREGADO"><br><br>
                  </div>
              <div class="col-lg-4">
                  <label class="col-lg-6 control-label" class="form-control">Legalizacion de certificado</label>
                      <input type="checkbox" name="Legalizacion" value="ENTREGADO"><br><br>
                  </div>
              <div class="col-lg-4">
                  <label class="col-lg-6 control-label" class="form-control">Certificado medico:</label>
                      <input type="checkbox" name="CertificadoMedico" value="ENTREGADO"><br><br>
                  </div>
              <div class="col-lg-4">
                  <label class="col-lg-6 control-label" class="form-control">Equivalencia:</label>
                      <input type="checkbox" name="Equivalencia" value="ENTREGADO"><br><br>
                  </div>
              <div class="col-lg-4">
                  <label class="col-lg-6 control-label" class="form-control">Curp:</label>
                      <input type="checkbox" name="Curp" value="ENTREGADO"><br><br>
                  </div>
              <div class="col-lg-4">
                  <label class="col-lg-6 control-label" class="form-control">fotografias:</label>
                      <input type="checkbox" name="foto" value="ENTREGADO"><br><br>
                  </div>
                  <div class="col-lg-4">
                  <label class="col-lg-6 control-label" class="form-control">Aviso de privacidad:</label>
                      <input type="checkbox" name="Avisoprivacidad" value="ENTREGADO"><br><br>
                  </div>
              <hr>
              <br><br> 
              <input class="btn btn-primary" type="submit" name="enviar" value="Guardar" >
               
              </form>
              </div>
      </section>
      <?php
            
      if(isset($_POST["enviar"]))
      {
        $mysql = new conexion();
        $con = $mysql->_ObtenerConexion();
          if(!$con)
          {
            die("Connection failed: " . $con->connect_error);
          }
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            $periodo = $_POST['Periodo'];
            $cuatrimestre = $_POST['cuatri'];
            $apellidop = $_POST['Apellidop'];
            $apellidom = $_POST['Apellidom'];
            $name = $_POST['nombre'];
            $calle = $_POST['Calle'];
            $numint = $_POST['NumInt'];
            $numext = $_POST['NumExt'];
            $col = $_POST['Colon'];
            $cp = isset($_POST['Cp']) ? $_POST['Cp'] : null ;
            $celular = $_POST['celular'];
            $carrera = $_POST['curso'];
            $teltra = isset($_POST['teltra']) ? $_POST['teltra'] : null ;
            $correo = $_POST['correo'];
            $lugarnac = isset($_POST['lugarnac']) ? $_POST['lugarnac'] : null ;
            $Estadonac = isset($_POST['Estadonac']) ? $_POST['Estadonac'] : null ;
            $fechanac = isset($_POST['fechanac']) ? $_POST['fechanac'] : null ;
            $nombretra = isset($_POST['nombretra']) ? $_POST['nombretra'] : null ;
            $escuelapr = isset($_POST['escuelapr']) ? $_POST['escuelapr'] : null ;
            $ciudad = isset($_POST['ciudad']) ? $_POST['ciudad'] : null ;
            $estado = isset($_POST['estado']) ? $_POST['estado'] : null ;
            $promedio = isset($_POST['promedio']) ? $_POST['promedio'] : null ;
            $Aficion = $_POST['Aficion'];
            $plan = $_POST['plan'];
            $deporte = $_POST['deporte'];
            $Sexo = $_POST['Sexo'];
            $enfermedades = $_POST['enfermedades'];
            $ProblemasF = isset($_POST['ProblemasF']) ? $_POST['ProblemasF'] : null ;
            $trata = isset($_POST['TratamientoMed']) ? $_POST['TratamientoMed'] : null ;
            $TPS = $_POST['tsangre'];
            $Cuatrimestre = $_POST['cuatri'];
            $nc = $_POST['nc'];
            $turno = $_POST['turno'];
            $ActaNacimiento = isset($_POST['ActaNacimiento']) ? $_POST['ActaNacimiento'] : null ;
            $Certificado = isset($_POST['Certificado']) ? $_POST['Certificado'] : null ;
            $Legalizacion = isset($_POST['Legalizacion']) ? $_POST['Legalizacion'] : null ;
            $Certimedico = isset($_POST['CertificadoMedico']) ? $_POST['CertificadoMedico'] : null ;
            $Equivalencia = isset($_POST['Equivalencia']) ? $_POST['Equivalencia'] : null ;
            $Avisoprivacidad = isset($_POST['Avisoprivacidad']) ? $_POST['Avisoprivacidad'] : null ;
            $Curp = isset($_POST['Curp']) ? $_POST['Curp'] : null ;
            $Fotos = isset($_POST['foto']) ? $_POST['foto'] : null ;
            $fecha= date("Y-m-d");
            $fechaInscripcion= date("Y-m-d");
           mysqli_query($con, "START TRANSACTION;");
              $result = mysqli_query($con, "select * from tblusuario where Usuario = '$user' and Clave = '$pass' and EliminarL=1;");
              if(mysqli_num_rows($result)>0)
              {
                 echo 'el usuario ya existe';
                 mysqli_query($con, "RollBack;");
              }
              else
              {
                  $sql = "INSERT INTO `tblusuario`(`idtipo`, `Usuario`, `Clave`, `EliminarL`) VALUES (4,'".$user."','".$pass."',1)";
                 if(mysqli_query($con, $sql))
                    {
                        $validaalumno = mysqli_query($con,"SELECT * FROM tblalumno WHERE NombreAlu = '$name' and Cuatrimestre = '$cuatrimestre' and numcontrol = '$nc' and Turno = '$turno' and Periodo = '$periodo' and EliminarL=1");
                        if(mysqli_num_rows($validaalumno)>0)
                          {
                          mysqli_query($con, "RollBack;");
                            echo 'el registro ya existe';
                          }
                        else
                          {
                              $sql2 = "SELECT IdCarrera,ModeloEstudio From tblcarrera Where IdCarrera=".$carrera;
  		                        $resultado2=mysqli_query($con,$sql2);
  	                          $row2=mysqli_fetch_row($resultado2);
                              $sql1 = "SELECT MAX(IdUsuario) From tblusuario";
                              $idusu=mysqli_query($con,$sql1);
                              $row = mysqli_fetch_row($idusu);
                              $insertaralumno = "INSERT INTO `tblalumno`(`IdCarrera`, `IdUsuario`, `NombreAlu`, `TelefonoPersonal`, `Cel`, `LugarNacimiento`, `FechaNacimiento`, `EmpresaTrabajo`, `EscuelaProcedencia`, `Ciudad`, `Estado`, `Promedio`, `EliminarL`, `Aficiones`, `DeportesPractica`, `PadecimientoEnfermedad`, `ProblemaFisico`, `TratamientoMedico`, `TipoSangre`, `Sexo`, `status`, `TipoEst`, `Cuatrimestre`, `numcontrol`, `Turno`, `correo`, `Periodo`,`FechaStatus`,`FechaIncripcion`,`IdPlanEst`,`Apellidop`,`Apellidom`,`Estadonac`) VALUES ('".$carrera."','".$row[0]."','".$name."','".$celular."','".$teltra."','".$lugarnac."','".$fechanac."','".$nombretra."','".$escuelapr."','".$ciudad."','".$estado."','".$promedio."',1,'".$Aficion."','".$deporte."','".$enfermedades."','".$ProblemasF."','".$trata."','".$TPS."','".$Sexo."','Activo','".$row2[1]."','".$Cuatrimestre."','".$nc."','".$turno."','".$correo."','".$periodo."','".$fecha."','".$fechaInscripcion."','".$plan."','".$apellidop."','".$apellidom."','".$Estadonac."')";         
                              if (mysqli_query($con,$insertaralumno))
                                {
                                    $sql4 = "SELECT MAX(IdAlumno) From tblalumno";
                                    $alu=mysqli_query($con,$sql4);
                                    $row4 = mysqli_fetch_row($alu);
                                    $insertcambioperiodo="INSERT INTO `tblalumnosperiodo`(`IdAlumno`, `IdPeriodo`,`Cuatrimestre`) VALUES ('".$row4[0]."','".$periodo."','".$Cuatrimestre."')";
                                  if(mysqli_query($con,$insertcambioperiodo))
                                  {
                                      $insertardocumentos="INSERT INTO`tbldocumentoalumno`(`idAlumno`,`Certificado`, `Actadenac`, `Fotografias`, `certificadomedico`, `Legalizacion`, `Equivalencia`,`Curp`,`Avisoprivacidad`)Values('".$row4[0]."','".$Certificado."','".$ActaNacimiento."','".$Fotos."','".$Certimedico."','".$Legalizacion."','".$Equivalencia."','".$Curp."','".$Avisoprivacidad."')";
                                        if(mysqli_query($con,$insertardocumentos))
                                            {
                                            $insertardomicilio="INSERT INTO `tbldomicilio`(`idalu`, `calle`, `numint`, `numext`, `col`, `cp`)Values('".$row4[0]."','".$calle."','".$numint."','".$numext."','".$col."','".$cp."')";
                                                if(mysqli_query($con,$insertardomicilio))
                                                      {
                                                    mysqli_query($con, "COMMIT;");
                                                    ?>
                                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                                                        <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.1/jquery.jgrowl.min.css" />
                                                        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.1/jquery.jgrowl.min.js"></script>
                                                        <script>
                                                            $.jGrowl("EL REGISTRO SE GUARDO CON EXITO!",{
                                                                life : 3000,
                                                                position:'bottom-right',
                                                                theme: 'test' 
                                                            });
                                                        </script>
                                                                  <style>
                                                                      .test{
                                                                                background-color:       #31B404;
                                                                                          width:  300px;
                                                                                height:80px;
                                                                                          text-align:center;
                                                                            }
                                                                  </style>
                                                     <?php
                                            }
                                else
                                  {
                                   mysqli_query($con, "RollBack;");
                                    echo 'error domicilio';
                                  }
                                            }
                                else
                                  {
                                    mysqli_query($con, "RollBack;");
                                    echo 'ERROR AL AGREGAR DOCUMENTOS';
                                  }
                                  }
                                  else
                                  {
                                      mysqli_query($con, "RollBack;");
                                      echo 'ERROR AL INSERTAR CAMBIO PERIODO';
                                  }
                          }
                        else 
                        {
                            mysqli_query($con, "RollBack;");
                            echo 'error al agregar alumno'; 
                            echo "Error: " . $insertaralumno . "" . mysqli_error($con);
                        }
                        
                    }
                }
                else 
                {
                  mysqli_query($con, "RollBack;");
                  echo 'error al agregar usuario';
                }
            }
            $con->close();
          
      }
        ?>
      <footer>
            <div class="contenedor">
                <p >Copyright &copy; BCB</p>
            </div>          
       </footer>
      <!-- Bootstrap core JavaScript -->
    <script src="../Estilos/dist/js/jquery.js"></script>
    <script src="../Estilos/dist/js/bootstrap.min.js"></script>
  </body>
</html>