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
    public function showAlumnos($rutinas) {
        Usuario::iniciarSesion();
        // Obtengo los alumnos de la base de datos
        $alumnos = $this->model->obtenerTodosAlumnos();
        // Mando todos los alumnos a la vista
        $this->view->mostrarTodosAlumnos($alumnos,$rutinas);
        return;
    }

    public function showAlumno($id) {
        Usuario::iniciarSesion();
        // Obtengo el alumno de la base de datos según su id_alumno
        $alumno = $this->model->obtenerUnAlumno($id);
        if (!$alumno) {
            $mensaje = "El Alumno no existe...";
            $volver = "alumnos";
            $this->view->showMensaje($mensaje,$volver); 
        } else {
            // Mando un solo alumno a la vista
            $this->view->mostrarUnAlumno($alumno);
        };
        return;
    }

    public function obtenerTodosAlumnosPorRutina($id){
        Usuario::iniciarSesion();
        $alumnos = null;
        if ( !empty($id) ) {
            $alumnos = $this->model->obtenerTodosAlumnosPorRutina($id);
        }
        return $alumnos;
    }

    public function filtroPorRutina($id,$rutinas) {
        Usuario::iniciarSesion();
        $alumnos = $this->model->obtenerTodosAlumnosPorRutina($id);
        $this->view->mostrarTodosAlumnosPorRutina($alumnos,$rutinas);
        return;
    }

    public function eliminarAlumno($id) {
        Usuario::verificar();
        
            $alumno = $this->model->obtenerUnAlumno($id);
            if (!$alumno) {
                $mensaje = "El Alumno no existe...";
                $volver = "alumnos";
                $this->view->showMensaje($mensaje,$volver); 
            } else {
                $this->model->delAlumno($id);
                $mensaje = "El Alumno se ha borrado con éxito...";
                $volver = "alumnos";
                $this->view->showMensaje($mensaje,$volver); 
            };

        return;
    }

    public function agregarAlumno() {
        Usuario::verificar();
 
            if (!isset($_POST['Nombre']) || empty($_POST['Nombre'])) {
                $mensaje = "Debe completar el nombre del Alumno...";
                $volver = "alumnos";
                $this->view->showMensaje($mensaje,$volver); 
            } else {
                $nombre = htmlspecialchars($_POST['Nombre']);
                $fecha = $_POST['Fecha'];
                $peso = htmlspecialchars($_POST['Peso']);
                $altura = htmlspecialchars($_POST['Altura']);
                $rutina = $_POST['Rutina'];
                $foto = "images/alumnonuevo.jpeg";
                $this->model->addAlumno( $nombre , $fecha , $peso , $altura , $rutina , $foto );
                $mensaje = "El Alumno se ha agregado con éxito...";
                $volver = "alumnos";
                $this->view->showMensaje($mensaje,$volver);   
            };

        return;      
    }

    public function mostrarFormAlumno($id,$rutinas) {
        Usuario::verificar();

            $alumno = $this->model->obtenerUnAlumno($id);
            $this->view->mostrarFormAlumno($alumno,$rutinas);

        return;      
    }

    public function modificarAlumno($id) {
        Usuario::verificar();

            if (!isset($_POST['Nombre']) || empty($_POST['Nombre'])) {
                $mensaje = "Debe completar el nombre del Alumno...";
                $volver = "alumnos";
                $this->view->showMensaje($mensaje,$volver); 
            } else {
                $nombre = htmlspecialchars($_POST['Nombre']);
                $fecha = $_POST['Fecha'];
                $peso = htmlspecialchars($_POST['Peso']);
                $altura = htmlspecialchars($_POST['Altura']);
                $rutina = $_POST['Rutina'];
                if($_FILES['Imagen']['type'] == "image/jpg" || $_FILES['Imagen']['type'] == "image/jpeg" || $_FILES['Imagen']['type'] == "image/png" ) {
                    $this->model->updAlumno( $id , $nombre , $fecha , $peso , $altura , $rutina , $_FILES['Imagen'] );
                }else{
                    $this->model->updAlumno( $id , $nombre , $fecha , $peso , $altura , $rutina );
                }
                $mensaje = "El Alumno se ha modificado con éxito...";
                $volver = "alumnos";
                $this->view->showMensaje($mensaje,$volver);    
            };

        return;  
    }

}

?>