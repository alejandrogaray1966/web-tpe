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
        // Obtengo las rutinas de la base de datos
        $rutinas = $this->model->obtenerTodasRutinas();
        // Mando todos las rutinas a la vista
        $this->view->mostrarTodasRutinas($rutinas);
        return;
    }

    public function showRutina($id,$alumnos) {
        // Obtengo la rutina de la base de datos según su id_rutina
        $rutina = $this->model->obtenerUnaRutina($id);
        if (!$rutina) {
            $this->view->showRutMensaje("La Rutina no existe..."); 
            // sleep(30); demora la ejecucion 30 segundos
            // Redirijo al listado de rutinas 
            header('Location: ' . BASE_URL . 'rutinas'); 
        } else {
            // Mando una sola rutina a la vista
            $this->view->mostrarUnaRutina($rutina,$alumnos);
        };
        return;
    }

    public function obtenerTodasRutinas(){
        $rutinas = null;
        $rutinas = $this->model->obtenerTodasRutinas();
        return $rutinas;
    }

    public function eliminarRutina($id,$alumnos) {
        if ( $GLOBALS['usuario'] == "Administrador" ) {
            if ( empty($alumnos) ) {
                $rutina = $this->model->obtenerUnaRutina($id);
                if ( !$rutina ) {
                    $this->view->showRutMensaje("La Rutina no existe..."); 
                } else {
                    $this->model->delRutina($id);
                    $this->view->showRutMensaje("La Rutina se ha borrado con éxito..."); 
                };
            } else {
                $this->view->showRutMensaje("La Rutina no se puede borrar, está asignada...");
            }
        };   
        // Redirijo al listado de rutinas 
        header('Location: ' . BASE_URL . 'rutinas'); 
        return;
    }

    public function agregarRutina() {
        if ( $GLOBALS['usuario'] == "Administrador" ) {
            if (!isset($_POST['Nombre']) || empty($_POST['Nombre'])) {
                $this->view->showRutMensaje("Debe completar el nombre de la Rutina...");
            } else {
                $nombre = htmlspecialchars($_POST['Nombre']);
                $entrada = htmlspecialchars($_POST['Entrada']);
                $pecho = htmlspecialchars($_POST['Pecho']);
                $espalda = htmlspecialchars($_POST['Espalda']);
                $piernas = htmlspecialchars($_POST['Piernas']);
                $this->model->addRutina( $nombre , $entrada , $pecho , $espalda , $piernas );
                $this->view->showRutMensaje("La Rutina se ha agregado con éxito...");    
            };
        };
        // Redirijo al listado de rutinas 
        header('Location: ' . BASE_URL . 'rutinas');
        return;      
    }

}

?>