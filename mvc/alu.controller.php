<?php

//  Requiero de los Controladores
require_once 'mvc/alu.model.php';
require_once 'mvc/alu.view.php';

//  Defino la Clase que maneja a los Alumnos
class AluController {

    //  Atributos de la Clase
    private $model;
    private $view;

    //  Constructor de la Clase
    public function __construct() {
        $this->model = new AluModel();
        $this->view = new AluView();
    }

    //  Funciones de la Clase
    public function showAlumnos() {
        // Obtengo los alumnos de la base de datos
        $alumnos = $this->model->obtenerTodosAlumnos();
        // Mando todos los alumnos a la vista
        $this->view->mostrarTodosAlumnos($alumnos);
        return;
    }

    public function showAlumno($id) {
        // Obtengo el alumno de la base de datos según su id_alumno
        $alumno = $this->model->obtenerUnAlumno($id);
        if (!$alumno) {
            $this->view->showMensaje("El Alumno no existe..."); 
            // sleep(30); demora la ejecucion 30 segundos
            // Redirijo al listado de alumnos 
            header('Location: ' . BASE_URL . 'alumnos'); 
        } else {
            // Mando un solo alumno a la vista
            $this->view->mostrarUnAlumno($alumno);
        };
        return;
    }

    public function eliminarAlumno($id) {
        if ( $GLOBALS['usuario'] == "Administrador" ) {
            $alumno = $this->model->obtenerUnAlumno($id);
            if (!$alumno) {
                $this->view->showMensaje("El Alumno no existe..."); 
            } else {
                $this->model->delAlumno($id);
                $this->view->showMensaje("El Alumno se ha borrado con éxito..."); 
            };
        };   
        // Redirijo al listado de alumnos 
        header('Location: ' . BASE_URL . 'alumnos'); 
        return;
    }

    public function agregarAlumno() {
        if ( $GLOBALS['usuario'] == "Administrador" ) {
            if (!isset($_POST['Nombre']) || empty($_POST['Nombre'])) {
                $this->view->showMensaje("Debe completar el nombre del Alumno...");
            } else {
                $nombre = htmlspecialchars($_POST['Nombre']);
                $fecha = $_POST['Fecha'];
                $peso = htmlspecialchars($_POST['Peso']);
                $altura = htmlspecialchars($_POST['Altura']);
                $rutina = $_POST['Rutina'];
                $this->model->addAlumno( $nombre , $fecha , $peso , $altura , $rutina );
                $this->view->showMensaje("El Alumno se ha agregado con éxito...");    
            };
        };
        // Redirijo al listado de alumnos 
        header('Location: ' . BASE_URL . 'alumnos');
        return;      
    }

}

?>