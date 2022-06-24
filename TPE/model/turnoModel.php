<?php 
    class turnoModel { 
        private $dataBase; 
        /* PARA QUE LA BASE DE DATOS FUNCIONE, SU NOMBRE DEBE COINCIDIR CON EL INDICADO EN EL ATRIBUTO... */ 
        public function __construct() { 
            $this->dataBase = new PDO('mysql:host=localhost;dbname=centro_medico', 'root', ''); 
        } 
        public function deleteTurno($id){ 
            $query = $this->dataBase->prepare("DELETE FROM turno WHERE turno.id = ?"); 
            $query->execute(array($id)) 
        
        }
    }