<?php

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

require_once 'app/sections.php';

// lee la acción
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home'; // acción por defecto si no envían
}

// parsea la accion
$params = explode('/', $action);

// determina que camino seguir según la acción
switch ($params[0]) {
    case 'home': 
        showHome();
        break;
    case 'listarMaterias': 
        echo listarMaterias($params[1]); 
        break;
    case 'agregarMateria': 
        echo agregarMateria(); 
        break;
    case 'borrarMateria': 
        echo borrarMateria($params[1]); 
        break;
    case 'actualizarMateria': 
        echo actualizarMateria($params[1],$params[2],$params[3]); 
        break;
    default: 
        echo('404 Page not found'); 
        break;
}

?>