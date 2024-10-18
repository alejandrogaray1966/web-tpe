<?php

//  Base_url para redirecciones y base tag
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

//  Requiero de los Controladores    
require_once "mvc/home.controller.php";
require_once "mvc/alu.controller.php";
require_once "mvc/rut.controller.php";
$homeController = new HomeController;
$aluController = new AluController;
$rutController = new RutController;

//  Defino el tipo de USUARIO
//  $usuario = "Sin Credenciales";
$usuario = "Administrador";

//  ------- Tabla de Ruteo -----------------------------------------
//  home            ->  home.controller     ->  showHome()
//  about           ->  home.controller     ->  showAbout()
//  notdone         ->  home.controller     ->  showNotDone()
//  default         ->  home.controller     ->  showPage404()
//  ---------- Alumnos ---------------------------------------------------
//  alumnos                 ->  alu.controller  ->  showAlumnos()
//  alumno/:ID              ->  alu.controller  ->  showAlumno($id)
//  agregar                 ->  alu.controller  ->  agregarAlumno()     
//  eliminar/:ID            ->  alu.controller  ->  eliminarAlumno($id)
//  modificar/:ID           ->  alu.controller  ->  mostrarFormAlumno($id)
//  modificarAlumno/:ID     ->  alu.controller  ->  modificarAlumno($id)
//  ----------- Filtros --------------------------------------------------
//  filtro/:ID      ->  alu.controller      ->  filtroPorRutina($id)
//  ------------ Rutinas -------------------------------------------------
//  rutinas                 ->  rut.controller  ->  showRutinas()
//  rutina/:ID              ->  rut.controller  ->  showRutina($id)
//  acoplar                 ->  rut.controller  ->  agregarRutina()
//  desacoplar/:ID          ->  rut.controller  ->  eliminarRutina($id)
//  actualizar/:ID          ->  rut.controller  ->  mostrarFormRutina($id)
//  actualizarRutina/:ID    ->  rut.controller  ->  actualizarRutina($id)
//  ----------------------------------------------------------------------

//  Acción por defecto si no se envía ninguna
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home'; 
}

//  Parseo la acción para separar acción real de parámetros
$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        $homeController->showHome();
        break;
    case 'about':
        $homeController->showAbout();
        break;
    case 'notdone':
        $homeController->showNotDone();
        break;
//  ------- Alumnos -----------------------------------------------
    case 'alumnos':
        $rutinas = $rutController->obtenerTodasRutinas();
        $aluController->showAlumnos($rutinas);
        break;
    case 'alumno':
        $id = $params[1];
        $aluController->showAlumno($id);
        break;
    case 'agregar':        
        $aluController->agregarAlumno();
        break;
    case 'eliminar':
        $id = $params[1];
        $aluController->eliminarAlumno($id);
        break;
    case 'modificar':
        $id = $params[1];
        $rutinas = $rutController->obtenerTodasRutinas();
        $aluController->mostrarFormAlumno($id,$rutinas);
        break;
    case 'modificarAlumno':
        $id = $params[1];
        $aluController->modificarAlumno($id);
        break;
//  ------- Filtros -----------------------------------------------
    case 'filtro':
        $id = $params[1];
        $rutinas = $rutController->obtenerTodasRutinas();
        $aluController->filtroPorRutina($id,$rutinas);
        break;
//  ------- Rutinas -----------------------------------------------
    case 'rutinas':
        $rutController->showRutinas();
        break;
    case 'rutina':
        $id = $params[1];
        $alumnos = $aluController->obtenerTodosAlumnosPorRutina($id);
        $rutController->showRutina($id,$alumnos);
        break;
    case 'acoplar':
        $rutController->agregarRutina();
        break;
    case 'desacoplar':
        $id = $params[1];
        $alumnos = $aluController->obtenerTodosAlumnosPorRutina($id);
        $rutController->eliminarRutina($id,$alumnos);
        break;
    case 'actualizar':
        $id = $params[1];
        $alumnos = $aluController->obtenerTodosAlumnosPorRutina($id);
        $rutController->mostrarFormRutina($id,$alumnos);
        break;
    case 'actualizarRutina':
        $id = $params[1];
        $rutController->actualizarRutina($id);
        break;
//  ------- Default -----------------------------------------------
    default: 
        $homeController->showPage404();
        break;
}

//  $authController = new AuthController();

    //  case 'login':
    //      $authController->mostrarLogin();
    //      break;
    //  case 'logout':
    //      $authController->desloguear();    
    //  case 'validar':
    //      $authController->verificarLogin();
    //      break;
    //  case 'registrar':
    //      $authController->registrarUsuario();
    //      break;  

?>