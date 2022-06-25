<?php
require_once  'view/View.php';
require_once  'model/medicosModel.php';
require_once  'model/pacienteModel.php';

class controller{

    protected $view;
    protected $medicosModel;
    protected $pacientesModel;

    function __construct(){
        $this->view = new View();
        $this->medicosModel = new medicosModel();
        $this->pacientesModel = new pacienteModel();
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
        $this->view->showAsignacionTurnos($infoPaciente);
    }
    function pacienteBusqueda(){
        $dni = $_POST["buscarPaciente"];

        $infoPaciente = $this->pacientesModel->getPacienteById($dni);

        if($infoPaciente == null){
            $infoPaciente = "No se encuentra registrado";
        }

        $this->view->showAsignacionTurnos($infoPaciente);
    }
}