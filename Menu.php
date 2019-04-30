<header><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
          <style>
                      .dropdown-submenu .dropdown-menu { 
    top: 0; 
    left: 80%; 
    margin-left: .1rem; 
    margin-right: .1rem; 
}   
          </style>
                
          <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
              <div class="container">
                  
                  <div class="navbar-header">
                      
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacion-fm">
                          <span class="sr-only">Desplejar / ocultar menu</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                      </button>
                    <img style="width:50px; height:50px;" src="./imagenes/Logoarkos.png">
                  </div>
                  <!-- inicia menu -->
                  <div class="collapse navbar-collapse" id="navegacion-fm">
                      <ul class='nav navbar-nav'>
                          <li class='active'><a href='VistaControlEscolar.php'>Inicio</a></li>
                          <li class='dropdown'>
                            <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button'>
                                Carrera <span class='caret'></span></a>
                              <ul class='dropdown-menu' role='menu'>
                                  <li><a href='Carrera.php'>Consultar o eliminar</a></li>
                                  <li><a href='AgregarCarrera.php'>Agregar</a></li></ul>
                          </li>
                          <li class='dropdown'>
                            <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button'>
                                Materia <span class='caret'></span></a>
                              <ul class='dropdown-menu' role='menu'>
                                  <li><a href='materia.php'>Consultar o eliminar</a></li>
                                  <li><a href='AgregarMateria.php'>Agregar</a></li></ul>
                          </li>
                          <li class='dropdown'>
                            <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button'>
                                Periodo <span class='caret'></span></a>
                              <ul class='dropdown-menu' role='menu'>
                                  <li><a href='Periodo.php'>Consultar o eliminar</a></li>
                                  <li><a href='AgregarPeriodo.php'>Agregar</a></li>
                                  <li><a href='AsignarMateriasPeriodo.php'>Asignar materias</a></li>
                              </ul>
                          </li>
                          <li class='dropdown'>
                            <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button'>
                                Aumnos <span class='caret'></span></a>
                              <ul class='dropdown-menu' role='menu'>
                                  <li class='dropdown dropdown-submenu'>
                                  <a href='Alumno.php'>Consultar o eliminar</a>
                                  <a href='AgregarAlumno.php'>Agregar</a>
                                  </li>
                                  <li class='dropdown dropdown-submenu'>
                                      <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Status</a>
                                      <ul class='dropdown-menu'>
                                          <li><a href='StatusAlumno.php'>Consultar o editar</a></li>
                                          <li><a href='AlumnosBajaT.php'>Ver alumnos con baja temporal</a></li>
                                          <li><a href='AlumnosBajaD.php'>Ver alumnos con baja definitiva</a></li>
                                          <li><a href='AlumnosEgresados.php'>Ver alumnos egresados</a></li>
                                          <li><a href='AlumnosTitulados.php'>Ver alumnos titulados</a></li>
                                      </ul>
                                  </li>
                              </ul>
                          </li>
                          <li class='dropdown'>
                            <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button'>
                                Colaboradores <span class='caret'></span></a>
                              <ul class='dropdown-menu' role='menu'>
                                  <li class='dropdown dropdown-submenu'>
                                      <a  href='#' class='dropdown-toggle' data-toggle='dropdown'>Administrativos</a>
                                      <ul class='dropdown-menu'>
                                          <li><a href='Administrativo.php'>Consultar o eliminar</a></li>
                                          <li><a href='AgregarAdministrativo.php'>Agregar</a></li>
                                      </ul>
                                  </li>
                                  <li class='dropdown dropdown-submenu'>
                                      <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Control Escolar</a>
                                      <ul class='dropdown-menu'>
                                          <li><a href='ControlEscolar.php'>Consultar o eliminar</a></li>
                                          <li><a href='AgregarControlEscolar.php'>Agregar</a></li>
                                      </ul>
                                  </li>
                                  <li class='dropdown dropdown-submenu'>
                                      <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Docentes</a>
                                      <ul class='dropdown-menu'>
                                          <li><a href='Docentes.php'>Consultar o eliminar</a></li>
                                          <li><a href='AgregarDocente.php'>Agregar</a></li>
                                      </ul>
                                  </li>
                              </ul>
                          </li>
                          <li class='dropdown'>
                            <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button'>
                                Grupos <span class='caret'></span></a>
                              <ul class='dropdown-menu' role='menu'>
                                  <li><a href='Grupo.php'>Consultar o eliminar</a></li>
                                  <li><a href='AgregarGrupo.php'>Agregar</a></li></ul>
                          </li>
                            
                            
                            
                  <li class='dropdown'>
                            <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button'>
                                Horarios <span class='caret'></span></a>
                              <ul class='dropdown-menu' role='menu'>
                                  
                                  <li class='dropdown dropdown-submenu'>
                                      <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Alumnos</a>
                                      <ul class='dropdown-menu'>
                                          <li><a href='#'>Consultar</a></li>
                                          
                                          <li class='dropdown dropdown-submenu'>
                                      <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Agregar</a>
                                      <ul class='dropdown-menu'>
                                          <li><a href='AgregarHorarioAlumno.php'>Por alumno</a></li>
                                          
                                          <li><a href='HorarioGrupo.php'>Por grupo</a></li>
                                          
                                      </ul>
                                  </li>
                                          
                                      </ul>
                                  </li>
                                <li class='dropdown dropdown-submenu'>
                                      <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Docentes</a>
                                      <ul class='dropdown-menu'>
                                          <li><a href='HorarioDocente.php'>Consultar o eliminar</a></li>
                                          <li><a href='HorarioDOC.php'>Agregar</a></li>
                                      </ul>
                                  </li>
                              </ul>
                          </li>
                            <li class='dropdown'>
                            <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button'>
                                Calificaciones <span class='caret'></span></a>
                              <ul class='dropdown-menu' role='menu'>
                                  <li><a href='listaalumnos.php'>Agregar</a></li>
                                  </ul>
                          </li>
                            <li class='dropdown'>
                            <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button'>
                                Sesión <span class='caret'></span></a>
                              <ul class='dropdown-menu' role='menu'>
                                  <li><a href='CerrarSesion.php'>Salir</a></li>
                                  </ul>
                          </li>
                      </ul>
                      </div>
              </div>
          </nav>
      </header>