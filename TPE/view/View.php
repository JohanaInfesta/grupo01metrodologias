<?php
require_once "libs/smarty/Smarty.class.php";

class View{

    function __construct() {
    }

    function ShowHome(){
        $smarty = new Smarty();
        $smarty->display('templates/home.tpl');
    }

    function ShowCalendar(){
        $smarty = new Smarty();
        $smarty->display('templates/calendarioDeTurnos.tpl');
    }

    function ShowMedicos($medicos,$obraSociales, $especialidades){
        $smarty = new Smarty();
        $smarty->assign('medicos', $medicos);
        $smarty->assign('obraSociales', $obraSociales);
        $smarty->assign('especialidades', $especialidades);
        $smarty->display('templates/medicosDisponibles.tpl');
    }

    function showAsignacionTurnos($infoPaciente, $medicosCompatibles, $message){
        $smarty = new Smarty();
        $smarty->assign('paciente', $infoPaciente);
        $smarty->assign('message', $message);
        $smarty->assign('medicos', $medicosCompatibles);
        $smarty->display('templates/asignarTurno.tpl');
    }
    function showTurnos($medicos, $turnos){
        $smarty = new Smarty();
        $smarty->assign('medicos', $medicos);
        $smarty->assign('turnos', $turnos);
        $smarty->display('templates/listarTurnos.tpl');
    }
}