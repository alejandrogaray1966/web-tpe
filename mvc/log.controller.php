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
                $mensaje = "El Usuario se ha Logueado con éxito...";
                $volver = "home";
                $this->view->showMensaje($mensaje,$volver); 
            } else {
                $mensaje = "Usuario y/o clave incorrecta...";
                $volver = "login";
                $this->view->showMensaje($mensaje,$volver); 
            }
        } else {
            $mensaje = "Debe completar correctamente los campos...";
            $volver = "login";
            $this->view->showMensaje($mensaje,$volver); 
        }
        return;
    }

    public function desloguear(){
        Usuario::verificar();
        Usuario::logout();
        $mensaje = "El Usuario ha Cerrado Sesión con éxito...";
        $volver = "home";
        $this->view->showMensaje($mensaje,$volver); 
        return;
    }

}

?>