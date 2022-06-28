<?php 
    class turnoModel { 
        private $dataBase; 
        /* PARA QUE LA BASE DE DATOS FUNCIONE, SU NOMBRE DEBE COINCIDIR CON EL INDICADO EN EL ATRIBUTO... */ 
        public function __construct() { 
            $this->dataBase = new PDO('mysql:host=localhost;dbname=centro_medico', 'root', ''); 
        } 
        public function deleteTurno($id){ 
            $query = $this->dataBase->prepare("DELETE FROM turno WHERE turno.id = ?"); 
            $query->execute(array($id));
        }

        public function addTurno ($dni, $dia, $hora, $medico) {
            $query = $this->dataBase->prepare("INSERT INTO turno (dni_paciente, dia, horario, id_medico)
                                                VALUES (?,?,?,?)");
            $query->execute(array($dni, $dia, $hora, $medico));
        }

        public function getTurnoByMedico($id_medico){
            $query = $this->dataBase->prepare("
            SELECT *
            FROM turno
            JOIN paciente ON turno.dni_paciente = paciente.dni
            WHERE id_medico = ?
            ");
            $query->execute(array($id_medico));                 
        return $query->fetchAll(PDO::FETCH_OBJ);
        }
        
        public function getTurnos(){
            $query = $this->dataBase->prepare("
            SELECT *
            FROM turno
            JOIN paciente ON turno.dni_paciente = paciente.dni
            ");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }
    }