<?php
    
    require_once "Controllers/VeterinariosController.php";
    require_once 'RouterClass.php';
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $r = new Router();

    // rutas
    // Path - Metodo - Controller - Funcion
    $r->addRoute("home", "GET", "VeterinariosController", "GetVeterinarios");

    //Ruta por defecto.
    $r->setDefaultRoute("VeterinariosController", "GetVeterinarios");

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>
