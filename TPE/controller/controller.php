<?php
require_once  'view/View.php';
require_once  'model/medicosModel.php';

class controller{

    protected $view;
    protected $medicosModel;

    function __construct(){
        $this->view = new View();
        $this->medicosModel = new medicosModel();
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
}