<?php
require_once "libs/smarty/Smarty.class.php";

class View{

    function __construct() {
    }

    function ShowHome(){
        $smarty = new Smarty();
        $smarty->display('templates/main.tpl');
    }

    function ShowCalendar(){
        $smarty = new Smarty();
        $smarty->display('templates/calendarioDeTurnos.tpl');
    }

    function ShowMedicos($medicos){
        $smarty = new Smarty();
        $smarty->assign('medicos', $medicos);
        $smarty->display('templates/medicosDisponibles.tpl');
    }
}