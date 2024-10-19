<?php

//  Requiero de los Controladores
require_once 'mvc/log.model.php';
require_once 'mvc/log.view.php';
require_once 'mvc/usuario.php';

//  Defino la Clase que maneja Loguearse
class LogController {

    //  Atributos de la Clase
    private $model;
    private $view;

    //  Constructor de la Clase
    function __construct(){
        $this->model = new LogModel();
        $this->view = new LogView();
    }

    //  Funciones de la Clase
    public function mostrarLogin(){
        $this->view->mostrarFormLogin();
        return;
    }

    public function verificarLogin(){
        if (!empty($_POST['Nombre']) && !empty($_POST['Contrasena'])) {
            $usuario = htmlspecialchars($_POST['Nombre']);
            $clave = htmlspecialchars($_POST['Contrasena']);    
            $usuarioDb = $this->model->obtenerUsuario($usuario);
            if ($usuarioDb && password_verify($clave,$usuarioDb->contrasena)) {
                Usuario::login($usuarioDb);
                $this->view->showMensaje("El Usuario se ha Logueado con éxito..."); 
                header('Location: ' . BASE_URL );
            } else {
                $this->view->showMensaje("Usuario y/o clave incorrecta..."); 
                header('Location: ' . BASE_URL . 'login');
            }
        } else {
            $this->view->showMensaje("Debe completar correctamente los campos..."); 
            header('Location: ' . BASE_URL . 'login');
        }
        return;
    }

    public function desloguear(){
        Usuario::logout();
        return;
    }

}

?>