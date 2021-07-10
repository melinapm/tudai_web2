<?php

require_once 'lib/agregar.php';
require_once 'lib/listar.php';
require_once 'lib/buscar.php';


/**
 * Home por defecto
 */
function showHome() {

    $html = '
    
    <h1>UNICEN - Materias y Carreras </h1>

    '; 

    echo $html;

    $html.= listarMaterias();
    $html.= buscarMateriasPorDuracion();
    //$html.= buscarMateriasPorCarrera();
    //$html.= buscarMateria();
    //$html.= agregarMateria();
}


?>