<?php

//  Defino la Clase que maneja la vista de las Rutinas
class RutView {

    //  Funciones de la Clase
    public function mostrarTodasRutinas($rutinas) {
        Usuario::showUsuario();
        // La vista define una nueva variable con la cantidad de rutinas
        $cantidad = count($rutinas);
        $pagina = "Rutinas";
        $titulo = "Listado de Rutinas";
        //  El template va a poder acceder a todas las variables y constantes que tienen alcance en esta función
        require 'templates/todas_rutinas.phtml';
        return;
    }

    public function mostrarUnaRutina($rutina,$alumnos) {
        Usuario::showUsuario();
        $pagina = "Rutina";
        $titulo = "Ficha de la Rutina";
        $cantidad = count($alumnos);
        require 'templates/una_rutina.phtml';
        return;
    }

    public function mostrarFormRutina($rutina,$alumnos) {
        Usuario::showUsuario();
        $pagina = "Rutina";
        $titulo = "Ficha de la Rutina";
        $cantidad = count($alumnos);
        require 'templates/form_rutina.phtml';
        return;
    }

    public function showRutMensaje($mensaje) {
        Usuario::showUsuario();
        echo ( $mensaje );
        echo ( "<script>window.alert('$mensaje');</script>" );
        echo ( "<script>window.alert('pero redirige el header y no se ve el mensaje');</script>" );
        return;
    }
  
}

?>