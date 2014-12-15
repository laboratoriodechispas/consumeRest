<?php

require("../clases/Usuarios.php");

$accion = $_REQUEST['accion'];

$rest = new Usuarios();

if(function_exists($rest->$accion())){

    $rest->$accion();

}