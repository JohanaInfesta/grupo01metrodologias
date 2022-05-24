<?php

class medicosModel {

    private $dataBase;

    public function __construct() {
        $this->dataBase = new PDO('mysql:host=localhost;dbname=centromedico', 'root', '');
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