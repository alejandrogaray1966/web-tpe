<?php
require_once 'db/model.php';

//  Defino la Clase que maneja la Base de Datos de los Alumnos
class AluModel extends Model{
 
    //  Funciones de la Clase
    public function obtenerTodosAlumnos() {
        //  Preparo la consulta
        $query = $this->db->prepare('SELECT id_alumno , nombreYapellido FROM alumnos');
        //  Preparo la consulta ordenada por el nombre de manera ascendente
        //  $query = $this->db->prepare('SELECT id_alumno , nombre FROM alumnos ORDER BY nombre ASC');
        //  Ejecuto la consulta
        $query->execute();
        //  Obtengo los datos en un arreglo de objetos
        $alumnos = $query->fetchAll(PDO::FETCH_OBJ);
        //  Devuelvo un arreglo de objetos
        return $alumnos;
    }

    public function obtenerTodosAlumnosPorRutina($id){
        $query = $this->db->prepare('SELECT a.id_alumno , a.nombreYapellido , b.nombre FROM alumnos a INNER JOIN rutinas b ON a.id_rutina = b.id_rutina WHERE a.id_rutina = ?');
        $query->execute([$id]);
        $alumnos = $query->fetchAll(PDO::FETCH_OBJ);
        return $alumnos;
    }

    public function obtenerUnAlumno($id) { 
        $query = $this->db->prepare('SELECT a.* , b.nombre FROM alumnos a INNER JOIN rutinas b ON a.id_rutina = b.id_rutina WHERE a.id_alumno = ?');
        $query->execute([$id]);   
        $alumno = $query->fetch(PDO::FETCH_OBJ);
        return $alumno;
    }

    public function delAlumno($id) {
        $query = $this->db->prepare('DELETE FROM alumnos WHERE id_alumno = ?');
        $query->execute([$id]);
        return;
    }

    public function addAlumno($nombre , $fecha , $peso , $altura , $rutina , $foto ) { 
        $query = $this->db->prepare('INSERT INTO alumnos ( nombreYapellido , nacimiento , peso , altura , id_rutina , foto ) VALUES ( ? , ? , ? , ? , ? , ? )');
        $query->execute([$nombre , $fecha , $peso , $altura , $rutina , $foto ]);
        return;
    }

}

?>