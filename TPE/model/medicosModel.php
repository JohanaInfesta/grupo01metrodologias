<?php

class medicosModel {

    private $dataBase;

    /*
    PARA QUE LA BASE DE DATOS FUNCIONE, SU NOMBRE DEBE COINCIDIR CON EL INDICADO EN EL ATRIBUTO...
    */

    public function __construct() {
        $this->dataBase = new PDO('mysql:host=localhost;dbname=centro_medico', 'root', '');
    }

    public function getMedicos() {
        $query = $this->dataBase->prepare("
            SELECT nombre, apellido, especialidad
            FROM medico   
        ");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }


}