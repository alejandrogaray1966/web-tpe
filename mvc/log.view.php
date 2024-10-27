<?php

//  Defino la Clase que maneja la vista de las Claves
class LogView {

    //  Funciones de la Clase
    public function mostrarFormLogin() {
            $GLOBALS['usuario'] = "Bienvenido";
            $pagina = "Login";
            $titulo = "Iniciar Sesión";
            require 'templates/form_login.phtml';
            return;
    }       

    public function showMensaje($mensaje ,$volver) {
        $pagina = "Mensaje";
        $titulo = "Mensaje del Sistema GYM";
        require 'templates/men_log.phtml';
        return;
    }

}

?>