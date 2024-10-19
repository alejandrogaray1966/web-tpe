<?php

//  Requiero de los Controladores
require_once 'db/model.php';

//  Defino la Clase que maneja la Base de Datos de las Claves
class LogModel extends Model {

    public function obtenerUsuario($nombre){
        $query = $this->db->prepare('SELECT * FROM claves WHERE usuario = ?');
        $query->execute([$nombre]);
        $res = $query->fetch(PDO::FETCH_OBJ);
        return $res;
    }

}

?>