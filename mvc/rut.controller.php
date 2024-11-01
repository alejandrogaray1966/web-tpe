<?php

//  Requiero de los Controladores
require_once 'mvc/rut.model.php';
require_once 'mvc/rut.view.php';

//  Defino la Clase que maneja a las Rutinas
class RutController {

    //  Atributos de la Clase
    private $model;
    private $view;

    //  Constructor de la Clase
    public function __construct() {
        $this->model = new RutModel();
        $this->view = new RutView();
    }

    //  Funciones de la Clase
    public function showRutinas() {
        Usuario::iniciarSesion();
        // Obtengo las rutinas de la base de datos
        $rutinas = $this->model->obtenerTodasRutinas();
        // Mando todos las rutinas a la vista
        $this->view->mostrarTodasRutinas($rutinas);
        return;
    }

    public function showRutina($id,$alumnos) {
        Usuario::iniciarSesion();
        // Obtengo la rutina de la base de datos según su id_rutina
        $rutina = $this->model->obtenerUnaRutina($id);
        if (!$rutina) {
            $mensaje = "La Rutina no existe...";
            $volver = "rutinas";
            $this->view->showMensaje($mensaje,$volver); 
        } else {
            // Mando una sola rutina a la vista
            $this->view->mostrarUnaRutina($rutina,$alumnos);
        };
        return;
    }

    public function obtenerTodasRutinas(){
        Usuario::iniciarSesion();
        $rutinas = null;
        $rutinas = $this->model->obtenerTodasRutinas();
        return $rutinas;
    }

    public function eliminarRutina($id,$alumnos) {
        Usuario::verificar();
  
            if ( empty($alumnos) ) {
                $rutina = $this->model->obtenerUnaRutina($id);
                if ( !$rutina ) {
                    $mensaje = "La Rutina no existe...";
                    $volver = "rutinas";
                    $this->view->showMensaje($mensaje,$volver); 
                } else {
                    $this->model->delRutina($id);
                    $mensaje = "La Rutina se ha borrado con éxito...";
                    $volver = "rutinas";
                    $this->view->showMensaje($mensaje,$volver); 
                };
            } else {
                $mensaje = "La Rutina no se puede borrar, está asignada...";
                $volver = "rutinas";
                $this->view->showMensaje($mensaje,$volver); 
            }

        return;
    }

    public function agregarRutina() {
        Usuario::verificar();
  
            if (!isset($_POST['Nombre']) || empty($_POST['Nombre'])) {
                $mensaje = "Debe completar el nombre de la Rutina...";
                $volver = "rutinas";
                $this->view->showMensaje($mensaje,$volver); 
            } else {
                $nombre = htmlspecialchars($_POST['Nombre']);
                $entrada = htmlspecialchars($_POST['Entrada']);
                $pecho = htmlspecialchars($_POST['Pecho']);
                $espalda = htmlspecialchars($_POST['Espalda']);
                $piernas = htmlspecialchars($_POST['Piernas']);
                $this->model->addRutina( $nombre , $entrada , $pecho , $espalda , $piernas );
                $mensaje = "La Rutina se ha agregado con éxito...";
                $volver = "rutinas";
                $this->view->showMensaje($mensaje,$volver); 
            };

        return;      
    }

    public function mostrarFormRutina($id,$alumnos) {
        Usuario::verificar();
 
            $rutina = $this->model->obtenerUnaRutina($id);
            $this->view->mostrarFormRutina($rutina,$alumnos);
  
        return;      
    }

    public function actualizarRutina($id) {
        Usuario::verificar();

            if (!isset($_POST['Nombre']) || empty($_POST['Nombre'])) {
                $mensaje = "Debe completar el nombre de la Rutina...";
                $volver = "rutinas";
                $this->view->showMensaje($mensaje,$volver); 
            } else {
                $nombre = htmlspecialchars($_POST['Nombre']);
                $entrada = htmlspecialchars($_POST['Entrada']);
                $pecho = htmlspecialchars($_POST['Pecho']);
                $espalda = htmlspecialchars($_POST['Espalda']);
                $piernas = htmlspecialchars($_POST['Piernas']);
                $this->model->updRutina( $id , $nombre , $entrada , $pecho , $espalda , $piernas );
                $mensaje = "La Rutina se ha modificado con éxito...";
                $volver = "rutinas";
                $this->view->showMensaje($mensaje,$volver);    
            };

        return;      
    }
    
}

?>