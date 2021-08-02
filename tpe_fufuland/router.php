<?php

require_once "Controllers/VeterinariosController.php";
require_once "Controllers/HomeController.php";

$action = $_GET["action"];
define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

$controllerHome = new HomeController();
$controllerVet = new VeterinariosController();

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
        $controllerHome->GetHome();
        break;
    case 'veterinarios': 
        $controllerVet->GetVeterinarios();
        break;
    default: 
        echo('404 Page not found'); 
        break;
}
    
?>