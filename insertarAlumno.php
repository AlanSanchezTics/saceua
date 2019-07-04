<?php 
  	include 'conexion.php';
	$user = $_POST["user"];
	$pass = $_POST['pass'];
	$SE = $_POST["se"];
	$periodo = $_POST["Periodo"];
	$cuatrimestre = $_POST["cuatri"];
	$name = $_POST["nombre"];
	$domicilio = $_POST["domicilio"];
	$celular = $_POST["celular"];
	$carrera = $_POST["curso"];
	$teltra = $_POST["teltra"];
	$cp = $_POST["cp"];
	$correo = $_POST["correo"];
	$lugarnac = $_POST["lugarnac"];
	$fechanac = $_POST["fechanac"];
	$nombretra = $_POST["nombretra"];
	$domemp = $_POST["domemp"];
	$escuelapr = $_POST["escuelapr"];
	$ciudad = $_POST["ciudad"];
	$estado = $_POST["estado"];
	$promedio = $_POST["promedio"];
	$Aficion = $_POST["Aficion"];
	$deporte = $_POST["deporte"];
    $Sexo = $_POST["Sexo"];
	$enfermedades = $_POST["enfermedades"];
	$ProblemasF = $_POST["ProblemasF"];
	$trata = $_POST["TratamientoMed"];
	$TPS = $_POST["tsangre"];
    $Cuatrimestre = $_POST["cuatri"];
    $nc = $_POST["nc"];
    $turno = $_POST["turno"];
    $ActaNacimiento = $_POST['ActaNacimiento'];
    $docu2 = $_POST['Certificado'];
    $docu3 = $_POST['CertificadoMedico'];
    $docu4 = $_POST['foto'];
    $fecha= date("Y-m-d");
	$mysql = new Conexion();
	$conn= $mysql->_ObtenerConexion();
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
		$sql2 = "SELECT IdCarrera From tblcarrera Where Clave='".$carrera."'";
		$resultado2=mysqli_query($conn,$sql2);
	$row2=mysqli_fetch_row($resultado2);
	$sql = "SELECT * From tblusuario where Usuario='".$user."'";
	$resultado=mysqli_query($conn,$sql);
	$usuarioexiste=mysqli_num_rows($resultado);
	if ($usuarioexiste > 0) 
	{
	    $inserta = "INSERT INTO `tblusuario`(`idtipo`, `Usuario`, `Clave`, `EliminarL`) VALUES (4,'".$user."','".$pass."',1)";
		if ($conn->query($inserta) === TRUE) {
				 $sql1 = "SELECT MAX(idUsuario) From tblusuario";
				$idusu=mysqli_query($conn,$sql1);
				$row = mysqli_fetch_row($idusu);
				echo $row2;
				$insertaralumno = "INSERT INTO `tblalumno`(`IdCarrera`, `IdUsuario`, `NombreAlu`, `DomicilioAlu`, `TelefonoPersonal`, `TelefonoTrabajo`, `LugarNacimiento`, `FechaNacimiento`, `EmpresaTrabajo`, `DomicilioTrabajo`, `EscuelaProcedencia`, `Ciudad`, `Estado`, `Promedio`, `EliminarL`, `Aficiones`, `DeportesPractica`, `PadecimientoEnfermedad`, `ProblemaFisico`, `TratamientoMedico`, `TipoSangre`, `Sexo`, `status`, `TipoEst`, `Cuatrimestre`, `numcontrol`, `Turno`, `correo`, `Periodo`,`FechaStatus`) VALUES ('".$row2[0]."','".$row[0]."','".$name."','".$domicilio."','".$celular."','".$teltra."','".$lugarnac."','".$fechanac."','".$nombretra."','".$domemp."','".$escuelapr."','".$ciudad."','".$estado."','".$promedio."',1,'".$Aficion."','".$deporte."','".$enfermedades."','".$ProblemasF."','".$trata."','".$TPS."','".$Sexo."','Activo','".$SE."','".$Cuatrimestre."','".$nc."','".$turno."','".$correo."','".$periodo."','".$fecha."')";
				if ($conn->query($insertaralumno) === TRUE)
                {
                	    $sql1 = "SELECT MAX(idAlumno) From tblalumno";
                        $alu=mysqli_query($conn,$sql1);
                        $row1 = mysqli_fetch_row($alu);
                        $insertdocu = "INSERT INTO `tbldocumentoalumno`(`idAlumno`, `Certificado`, `Actadenac`, `Fotografias`, `certificadomedico`) VALUES ('".$row1[0]."','".$docu2."','".$ActaNacimiento."','".$docu4."','".$docu3."')";
                        if ($conn->query($insertdocu) === TRUE) 
                        {
                                   // header("location:AgregarAlumno.php");
                        }
                        else 
                        {
                            echo "Error: " . $insertdocu . "<br>" . $conn->error;
                        }
                } else {
			    echo "Error: " . $insertaralumno . "<br>" . $conn->error;
			}
		} else {
		    echo "Error: " . $inserta . "<br>" . $conn->error;
		}
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
	 
 ?>