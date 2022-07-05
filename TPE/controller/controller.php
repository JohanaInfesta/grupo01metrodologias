<?php
require_once  'view/View.php';
require_once  'model/medicosModel.php';
require_once  'model/pacienteModel.php';
require_once  'model/turnoModel.php';

class controller{

    protected $view;
    protected $medicosModel;
    protected $pacientesModel;
    protected $turnosModel;

    function __construct(){
        $this->view = new View();
        $this->medicosModel = new medicosModel();
        $this->pacientesModel = new pacienteModel();
        $this->turnosModel = new turnoModel();
    }

    function Home(){
        $this->view->ShowHome();
    }

    function Calendario(){
        $this->view->ShowCalendar();
    }

    function Medicos() {
        $queryObraSociales = $this->medicosModel->getObraSociales();
        $queryEspecialidades = $this->medicosModel->getEspecialidades();
        $queryMedicos = $this->medicosModel->getMedicos();
        $this->view->ShowMedicos($queryMedicos,$queryObraSociales, $queryEspecialidades);
    }

    function filtrarBusqueda(){
        $obraSocial = $_POST["obraSocial"];
        $especialidad = $_POST["especialidad"];

        if($especialidad == "-1" && $obraSocial != "-1"){ //filtra por obra social
            $queryMedicos = $this->medicosModel->getMedicosByObraSocial($obraSocial);
        }else if($obraSocial == "-1" && $especialidad != "-1"){ //filtra por especialidad
            $queryMedicos = $this->medicosModel->getMedicosByEspecialidad($especialidad);
        }else if($obraSocial != "-1" && $especialidad != "-1"){ //filtra por obra social y especialidad
            $queryMedicos = $this->medicosModel->getMedicosByObraSocialAndEspecialidad($obraSocial, $especialidad);
        }else if($obraSocial == "-1" && $especialidad == "-1"){ //no filtra
            $queryMedicos = $this->medicosModel->getMedicos();
        }

        $queryObraSociales = $this->medicosModel->getObraSociales();
        $queryEspecialidades = $this->medicosModel->getEspecialidades();
        $this->view->ShowMedicos($queryMedicos,$queryObraSociales, $queryEspecialidades);
    }

    function asignarTurno(){
        $infoPaciente = "";
        $medicosCompatibles = "";
        $message = "";
        $this->view->showAsignacionTurnos($infoPaciente, $medicosCompatibles, $message);
    }

    function cargarTurno() {
            $idPaciente = $_POST["idPaciente"];
            $medico = explode(" ", $_POST["medico"]);
            $nombreMedico = $medico[0];
            $apellidoMedico = $medico[1];
            $idMedico = $this->medicosModel->getIdMedicoByNombre($nombreMedico, $apellidoMedico)->id_medico;
            $fecha = "07/12/2022";
            $hora = "10:00";
            echo($idPaciente);
            echo($nombreMedico);
            echo($apellidoMedico);
            echo ($idMedico);
            $this->turnosModel->addTurno($idPaciente, $fecha, $hora, $idMedico);
            header('Location: listarTurnos');
    }
    

    function borrarTurno($params = null) {
        $id = $params[':ID'];
        $this->turnosModel->deleteTurno($id);

        header('Location: ../listarTurnos');
        die();
    }

    function pacienteBusqueda(){
        $dni = $_POST["buscarPaciente"];
        $message = "";

        $infoPaciente = $this->pacientesModel->getPacienteById($dni);

        if($infoPaciente == null){
            $infoPaciente = "No se encuentra registrado el paciente...";
            $medicosCompatibles = "";
            $this->view->showAsignacionTurnos($infoPaciente, $medicosCompatibles, $message);
        }
        else {
            $medicosCompatibles = $this->medicosModel->getMedicosByObraSocial($infoPaciente->id_obra_social);
            $this->view->showAsignacionTurnos($infoPaciente, $medicosCompatibles, $message);
        }
    }

    function Turnos(){
        //INSERT INTO `turno` (`id`, `dni_paciente`, `dia`, `horario`, `id_medico`) VALUES ('1', '41741866', '07/03/2004', '18:56', '1');
        $queryTurnos = $this->turnosModel->getTurnos();
        $queryMedicos = $this->medicosModel->getMedicos();
        $this->view->showTurnos($queryMedicos, $queryTurnos);
    }

    function filtrarTurnos(){
        $id_medico = $_POST["id_medico"];
        if($id_medico != '-1'){
            $queryTurnos = $this->turnosModel->getTurnoByMedico($id_medico);
        }
        $queryMedicos = $this->medicosModel->getMedicos();
        $queryTurnos = $this->turnosModel->getTurnoByMedico($id_medico);
        $this->view->showTurnos($queryMedicos, $queryTurnos);
    }
}