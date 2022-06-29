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
            SELECT *
            FROM medico   
        ");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getEspecialidades() {
        $query = $this->dataBase->prepare("
            SELECT DISTINCT especialidad
            FROM medico
        ");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getObraSociales() {
        $query = $this->dataBase->prepare("
            SELECT *
            FROM obra_social
        ");
        $query->execute();                 
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function getMedicosByObraSocial($obraSocial){
        $query = $this->dataBase->prepare("
            SELECT me.id_medico, me.nombre, me.apellido, me.especialidad
            FROM medico_obra_social as mo
            JOIN medico as me ON mo.id_medico = me.id_medico
            WHERE mo.id_obra_social = :obraSocial
        ");
        $query->execute(array(':obraSocial' => $obraSocial));                 
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function getMedicosByEspecialidad($especialidad){
        $query = $this->dataBase->prepare("
            SELECT nombre, apellido, especialidad
            FROM medico
            WHERE especialidad = :especialidad
        ");
        $query->execute(array(':especialidad' => $especialidad));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function getMedicosByObraSocialAndEspecialidad($obraSocial, $especialidad){
        $query = $this->dataBase->prepare("
            SELECT nombre, apellido, especialidad
            FROM medico_obra_social
            JOIN medico ON medico_obra_social.id_medico = medico.id_medico
            WHERE id_obra_social = :obraSocial
            AND especialidad = :especialidad
        ");
        $query->execute(array(':obraSocial' => $obraSocial, ':especialidad' => $especialidad));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    
}