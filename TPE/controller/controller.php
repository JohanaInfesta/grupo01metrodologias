<?php
require_once  'view/View.php';

class controller{

    protected $view;

    function __construct(){
        $this->view = new View();
    }

    function Home(){
        $this->view->ShowHome();
    }

    function Calendario(){
        $this->view->ShowCalendar();
    }
}