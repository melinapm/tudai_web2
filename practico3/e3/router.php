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
    case 'listarPagos': 
        echo listarPagos(); 
        break;
    case 'ingresarPagos': 
        echo ingresarPagos(); 
        break;
    default: 
        echo('404 Page not found'); 
        break;
}

?>