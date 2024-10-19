<?php

//  Defino la Clase que maneja al HOME

class HomeController {

    //  Funciones de la Clase

    function showHome() {
        $GLOBALS['usuario'] = "Bienvenido";
        $pagina = "GYM";
        $titulo = "GYM TANDIL";
        require "templates/index.phtml";
    }

    function showAbout() {
        $GLOBALS['usuario'] = "WEB II";
        $pagina = "Contacto";
        $titulo = "Datos de Contacto";
        require "templates/about.phtml";
    }

    function showNotDone() {
        $GLOBALS['usuario'] = "Falta";
        $pagina = "Página";
        $titulo = "Página en desarrollo";
        require "templates/notdone.phtml";
    }

    function showPage404() {
        $GLOBALS['usuario'] = "Error";
        $pagina = "Error 404";
        $titulo = "Página no encontrada";
        require "templates/page404.phtml";
    }

}

?>
