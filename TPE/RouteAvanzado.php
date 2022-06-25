<?php

require_once 'controller/controller.php';
require_once 'RouterClass.php';

// CONSTANTES PARA RUTEO
define("LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');
define("BASE_URL", 'http://' . $_SERVER["SERVER_NAME"] . ':' . $_SERVER["SERVER_PORT"] . dirname($_SERVER["PHP_SELF"]) . '/');
define("BASE_FORM_PEDIDO", 'http://' . $_SERVER["SERVER_NAME"] . ':' . $_SERVER["SERVER_PORT"] . dirname($_SERVER["PHP_SELF"]) . '/formPedido');
define("BASE_BALANZA", 'http://' . $_SERVER["SERVER_NAME"] . ':' . $_SERVER["SERVER_PORT"] . dirname($_SERVER["PHP_SELF"]) . '/balanza');
//esto lo agrego para comparar
$r = new Router();





//Ejemplo:
// addRoute("palabra en URL", "Método", "Controlador encargado", "Nombre de funcion")


// rutas
//$r->addRoute("home", "GET", "controller", "Home");



//balanza

//$r->addRoute("insertBalanza", "POST", "MaterialController", "agregarPesoMaterial");
//Rutas de ejemplo 

// $r->addRoute("about", "GET", "GalleryController", "About");
// $r->addRoute("contact", "GET", "GalleryController", "Contact");

// //parte del registro y login
// $r->addRoute("register", "POST", "LoginController", "Register");

//Ruta por defecto.
$r->setDefaultRoute("controller", "Home");
$r->addRoute("calendarioDeTurnos", "GET", "controller", "Calendario");
$r->addroute("medicosDisponibles", "GET", "controller", "Medicos");
$r->addRoute("filtrosBusqueda", "POST", "controller", "filtrarBusqueda");
$r->addroute("asignarTurno", "GET", "controller", "asignarTurno");
$r->addRoute("pacienteBusqueda", "POST", "controller", "pacienteBusqueda");

//run
$r->route($_GET['action'], $_SERVER['REQUEST_METHOD']);

?>