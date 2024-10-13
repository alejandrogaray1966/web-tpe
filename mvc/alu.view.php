<?php

//  Defino la Clase que maneja la vista de los Alumnos
class AluView {

    //  Funciones de la Clase
    public function mostrarTodosAlumnos($alumnos) {
        // La vista define una nueva variable con la cantidad de alumnos
        $count = count($alumnos);
        $pagina = "Alumnos";
        $titulo = "Listado de Alumnos";
        //  El template va a poder acceder a todas las variables y constantes que tienen alcance en esta función
        require_once 'templates/todos_alumnos.phtml';
        return;
    }

    public function mostrarUnAlumno($alumno) {
        $pagina = "Alumno";
        $titulo = "Ficha del Alumno";
        require_once 'templates/un_alumno.phtml';
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