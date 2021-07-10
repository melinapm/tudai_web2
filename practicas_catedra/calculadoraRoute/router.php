<?php

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

require_once 'app/sections.php';
require_once "app/operaciones.php";



// sumar/2/3 o  sumar/89/6  
// pi
// about
// about/juan

// lee la acción
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home'; // acción por defecto si no envían
}

// parsea la accion Ej: sumar/1/2 --> ['sumar', 1, 2]
$params = explode('/', $action);

// determina que camino seguir según la acción
switch ($params[0]) {
    case 'home': 
        showHome();
        break;
    case 'about': 
        // [about] o [about,javi]
        $member = NULL;
        if(isset($params[1])){
            $member = $params[1];
        }
        showAbout($member); 
        break;
    case 'sumar': 
        echo getSumar($params[1], $params[2]); 
        break;
    case 'restar': 
        echo getRestar($params[1], $params[2]); 
        break;
    case 'multiplicar':
        echo getMultiplicar($params[1], $params[2]);
        break;
    case 'pi': 
        showPi(); 
        break;
    case 'help':
        showHelp();
        break;
    default: 
        echo('404 Page not found'); 
        break;
}





?>