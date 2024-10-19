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

    public function showMensaje($mensaje) {
        echo ( $mensaje );
        echo ( "<script>window.alert('$mensaje');</script>" );
        echo ( "<script>window.alert('pero redirige el header y no se ve el mensaje');</script>" );
        return;
    }

}

?>