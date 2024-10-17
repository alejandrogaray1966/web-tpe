<?php

//  Defino la Clase que maneja la vista de las Rutinas
class RutView {

    //  Funciones de la Clase
    public function mostrarTodasRutinas($rutinas) {
        // La vista define una nueva variable con la cantidad de rutinas
        $cantidad = count($rutinas);
        $pagina = "Rutinas";
        $titulo = "Listado de Rutinas";
        //  El template va a poder acceder a todas las variables y constantes que tienen alcance en esta función
        require_once 'templates/todas_rutinas.phtml';
        return;
    }

    public function mostrarUnaRutina($rutina,$alumnos) {
        $pagina = "Rutina";
        $titulo = "Ficha de la Rutina";
        $cantidad = count($alumnos);
        require_once 'templates/una_rutina.phtml';
        return;
    }

    public function mostrarFormRutina($rutina,$alumnos) {
        $pagina = "Rutina";
        $titulo = "Ficha de la Rutina";
        $cantidad = count($alumnos);
        require_once 'templates/form_rutina.phtml';
        return;
    }

    public function showRutMensaje($mensaje) {
        echo ( $mensaje );
        echo ( "<script>window.alert('$mensaje');</script>" );
        echo ( "<script>window.alert('pero redirige el header y no se ve el mensaje');</script>" );
        return;
    }
  
}

?>