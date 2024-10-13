<?php

//  Base_url para redirecciones y base tag
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

//  Requiero de los Controladores    
require_once "mvc/home.controller.php";
require_once "mvc/alu.controller.php";
$homeController = new HomeController;
$aluController = new AluController;

//  Defino el tipo de USUARIO
//  $usuario = "Sin Credenciales";
$usuario = "Administrador";

//  ------- Tabla de Ruteo --------------------------------------
//  home            ->  home.controller     ->  showHome()
//  about           ->  home.controller     ->  showAbout()
//  notdone         ->  home.controller     ->  showNotDone()
//  default         ->  home.controller     ->  showPage404()
//  ------- Alumnos ---------------------------------------------
//  alumnos         ->  alu.controller      ->  showAlumnos()
//  alumno/:ID      ->  alu.controller      ->  showAlumno($id)     ****  foto del alumno  ***
//  agregar         ->  alu.controller      ->  agregarAlumno()     ****  select de rutinas  ***
//  eliminar/:ID    ->  alu.controller      ->  eliminarAlumno()
//  -------------------------------------------------------------

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
    case 'alumnos':
        $aluController->showAlumnos();
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
    //  case 'productos':
    //      $cats = $catController->obtenerCategorias();
    //      $prodController->mostrarProductos($cats);
    //      break;
    //  case 'nuevoProducto':
    //      $cats = $catController->obtenerCategorias();
    //      $prodController->agregarProducto($cats); 
    //      break;
    //  case 'formEditarProducto':
    //      $id = $params[1];
    //      $cats = $catController->obtenerCategorias();
    //      $prodController->mostrarFormEditarProducto($id,$cats);
    //      break;     
    //  case 'actualizarProducto':
    //      $id = $params[1];
    //      $cats = $catController->obtenerCategorias(); 
    //      $prodController->actualizarProducto($id,$cats);
    //      break;      
    //  case 'eliminarCategoria':
    //      $id = $params[1];
    //      $cant = $prodController->obtenerProductosPorCategoria($id);
    //      $catController->eliminarCategoria($id,$cant);
    //      break;
    //  case 'formEditarCategoria':
    //      $id = $params[1];
    //      $catController->mostrarFormEditCategoria($id);
    //      break;
    //  case 'editarCategoria':
    //      $id = $params[1];
    //      $catController->actualizarCategoria($id);
    //      break;
    //  case'filtroCategorias':
    //      $id = $params[1];
    //      $cats = $catController->obtenerCategorias();
    //      $prodController->mostrarProductosPorId($id,$cats);
    //      break;                     


?>