<?php
require_once 'db/model.php';

//  Defino la Clase que maneja la Base de Datos de las Rutinas
class RutModel extends Model{
 
    //  Funciones de la Clase
    public function obtenerTodasRutinas() {
        //  Preparo la consulta
        //  $query = $this->db->prepare('SELECT id_rutina , nombre FROM rutinas');
        //  Preparo la consulta ordenada por el nombre de manera ascendente
        $query = $this->db->prepare('SELECT id_rutina , nombre FROM rutinas ORDER BY nombre ASC');
        //  Ejecuto la consulta
        $query->execute();
        //  Obtengo los datos en un arreglo de objetos
        $rutinas = $query->fetchAll(PDO::FETCH_OBJ);
        //  Devuelvo un arreglo de objetos
        return $rutinas;
    }

    public function obtenerUnaRutina($id) { 
        $query = $this->db->prepare('SELECT * FROM rutinas WHERE id_rutina = ?');
        $query->execute([$id]);   
        $rutina = $query->fetch(PDO::FETCH_OBJ);
        return $rutina;
    }

    public function delRutina($id) {
        $query = $this->db->prepare('DELETE FROM rutinas WHERE id_rutina = ?');
        $query->execute([$id]);
        return;
    }

    public function addRutina($nombre , $entrada , $pecho , $espalda , $piernas) { 
        $query = $this->db->prepare('INSERT INTO rutinas ( nombre , entrada , pecho , espalda , piernas ) VALUES ( ? , ? , ? , ? , ? )');
        $query->execute([$nombre , $entrada , $pecho , $espalda , $piernas]);
        return;
    }

    public function updRutina( $id , $nombre , $entrada , $pecho , $espalda , $piernas ) {
        $query = $this->db->prepare('UPDATE rutinas SET nombre = ? , entrada = ? , pecho = ? , espalda  = ? , piernas = ? WHERE id_rutina = ?');
        $query->execute([$nombre , $entrada , $pecho , $espalda , $piernas , $id]);
        return;
    }

}

?>