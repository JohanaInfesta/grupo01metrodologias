<?php
require_once "libs/smarty/Smarty.class.php";

class View{

    function __construct() {
    }

    function ShowHome(){
        $smarty = new Smarty();
        $smarty->assign('Titulo', 'Grupo 1 Metodologias');
        $smarty->display('templates/main.tpl');
    }

    function ShowCalendar(){
        $smarty = new Smarty();
        $smarty->assign('Calendario', 'Grupo 1 Metodologias');
        $smarty->display('templates/calendarioDeTurnos.tpl');
    }
}