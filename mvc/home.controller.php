<?php

//  Defino la Clase que maneja al HOME

class HomeController {

    //  Funciones de la Clase

    function showHome() {
        $pagina = "GYM";
        $titulo = "GYM TANDIL";
        require_once "templates/index.phtml";
    }

    function showAbout() {
        $pagina = "Contacto";
        $titulo = "Datos de Contacto";
        require_once "templates/about.phtml";
    }

    function showNotDone() {
        $pagina = "Página";
        $titulo = "Página en desarrollo";
        require_once "templates/notdone.phtml";
    }

    function showPage404() {
        $pagina = "Error 404";
        $titulo = "Página no encontrada";
        require_once "templates/page404.phtml";
    }

}

?>
