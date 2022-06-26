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

    function cargarTurno() {
        $dniPaciente = $_POST["dniPaciente"];
        $fecha = $_POST["fecha"];
        $hora = $_POST["hora"];
        $id_medico = $_POST["medico"];

        $actualDate = date("y-m-d");

        $infoPaciente = "";
        $medicosCompatibles = "";
        if (($dniPaciente != "") && ($fecha != "") && ($hora != "") && $id_medico != -1) {
            if ($fecha >= $actualDate) {
                $this->turnosModel->addTurno($dniPaciente, $fecha, $hora, $id_medico);
                $message = "Se Ha Agregado El Turno Con Exito";
                $this->view->showAsignacionTurnos($infoPaciente, $medicosCompatibles, $message);
            }
            else {
                $message = "La Fecha del Turno ya no Está Disponible";
                $this->view->showAsignacionTurnos($infoPaciente, $medicosCompatibles, $message);
            }
        }
        else {
            $message = "Faltan Completar Campos";
            $this->view->showAsignacionTurnos($infoPaciente, $medicosCompatibles, $message);
        }
    }
}