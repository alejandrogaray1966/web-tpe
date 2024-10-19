<?php

//  Defino la Clase que maneja la vista de los Alumnos
class AluView {

    //  Funciones de la Clase
    public function mostrarTodosAlumnos($alumnos,$rutinas) {
        Usuario::showUsuario();
        // La vista define una nueva variable con la cantidad de alumnos
        $cantidad = count($alumnos);
        $pagina = "Alumnos";
        $titulo = "Listado de Alumnos";
        //  El template va a poder acceder a todas las variables y constantes que tienen alcance en esta función
        require 'templates/todos_alumnos.phtml';
        return;
    }

    public function mostrarUnAlumno($alumno) {
        Usuario::showUsuario();
        $pagina = "Alumno";
        $titulo = "Ficha del Alumno";
        require 'templates/un_alumno.phtml';
        return;
    }

    public function mostrarTodosAlumnosPorRutina($alumnos,$rutinas) {
        Usuario::showUsuario();
        $cantidad = count($alumnos);
        $pagina = "Alumnos";
        $titulo = "Alumnos asignados a la Rutina";
        if ( $cantidad > 0 ) {
            $alumno = $alumnos[0];    
            $titulo = "$alumno->nombre" ;
        } else {
            $titulo = "No hay Alumnos asignados a la Rutina" ;
        };
        require 'templates/todos_alumnos.phtml';
        return;
    }

    public function mostrarFormAlumno($alumno,$rutinas) {
        Usuario::showUsuario();
        $pagina = "Alumno";
        $titulo = "Ficha del Alumno";
        require 'templates/form_alumno.phtml';
        return;
    }

    public function showMensaje($mensaje) {
        Usuario::showUsuario();
        echo ( $mensaje );
        echo ( "<script>window.alert('$mensaje');</script>" );
        echo ( "<script>window.alert('pero redirige el header y no se ve el mensaje');</script>" );
        return;
    }
  
}

?>