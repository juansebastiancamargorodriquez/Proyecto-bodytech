<?php

//CONTROLADORES

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/cronograma.controlador.php";


//MODELOS

require_once "modelos/usuarios.modelo.php";
require_once "modelos/cronograma.modelo.php";



$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();