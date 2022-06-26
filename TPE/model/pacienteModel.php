<?php

class pacienteModel {

    private $dataBase;

    /*
    PARA QUE LA BASE DE DATOS FUNCIONE, SU NOMBRE DEBE COINCIDIR CON EL INDICADO EN EL ATRIBUTO...
    */

    public function __construct() {
        $this->dataBase = new PDO('mysql:host=localhost;dbname=centro_medico', 'root', '');
    }

    //Funcion que obtiene un paciente especifico por DNI de la base de datos
    function getPacienteById($id){
       $query = $this->dataBase->prepare("SELECT * FROM paciente AS pa 
                                            JOIN obra_social AS os ON pa.id_obra_social = os.id_obra_social
                                        WHERE pa.dni = ?"
                                        );
        $query->execute(array($id));
        return $query->fetch(PDO::FETCH_OBJ);
    }

}