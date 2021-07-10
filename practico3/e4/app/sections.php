<?php

require_once 'lib/agregar.php';
require_once 'lib/listar.php';
require_once 'lib/buscar.php';


/**
 * Home por defecto
 */
function showHome() {

    $html = '
    
    <h1>UNICEN</h1>

    '; 

    echo $html;

    $html.= listarMaterias();
    $html.= buscarMateria();
    $html.= agregarMateria();
}


?>