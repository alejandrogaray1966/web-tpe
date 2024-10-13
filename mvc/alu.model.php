<?php
require_once 'db/model.php';

//  Defino la Clase que maneja la Base de Datos de los Alumnos
class AluModel extends Model{
 
    //  Funciones de la Clase
    public function obtenerTodosAlumnos() {
        //  Preparo la consulta
        $query = $this->db->prepare('SELECT * FROM alumnos');
        //  Preparo la consulta ordenada por el nombre de manera ascendente
        //  $query = $this->db->prepare('SELECT * FROM alumnos ORDER BY nombre ASC');
        //  Ejecuto la consulta
        $query->execute();
        //  Obtengo los datos en un arreglo de objetos
        $alumnos = $query->fetchAll(PDO::FETCH_OBJ);
        //  Devuelvo un arreglo de objetos
        return $alumnos;
    }

    public function obtenerUnAlumno($id) { 
        $query = $this->db->prepare('SELECT * FROM alumnos WHERE id_alumno = ?');
        $query->execute([$id]);   
        $alumno = $query->fetch(PDO::FETCH_OBJ);
        return $alumno;
    }

    public function delAlumno($id) {
        $query = $this->db->prepare('DELETE FROM alumnos WHERE id_alumno = ?');
        $query->execute([$id]);
        return;
    }

    public function addAlumno($nombre , $fecha , $peso , $altura , $rutina) { 
        $query = $this->db->prepare('INSERT INTO alumnos ( nombre , nacimiento , peso , altura , id_rutina ) VALUES ( ? , ? , ? , ? , ? )');
        $query->execute([$nombre , $fecha , $peso , $altura , $rutina]);
        return;
    }

}

?>