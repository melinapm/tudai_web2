<?php

require_once 'borrar.php';
require_once 'actualizar.php';

/**
 * Listo las materias
 */
function listarMaterias(){

    $db = new PDO('mysql:host=localhost;dbname=universidad', 'root', 'root');
    $sentencia = $db->query("SELECT m.id, m.nombre, m.profesor, c.nombre catedra, c.duracion
                                FROM materias m JOIN carreras c ON m.carrera=c.id
                                ORDER BY m.id LIMIT 10");
    $materias = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($materias);
    echo 
    "<h1>Listado de materias</h1>
        <table>";
        
        echo "<tr>
                <th>Materia</th>
                <th>Profesor</th>
                <th>Carrera</th>
                <th>Duracion (años)</th>
            </tr>";

    foreach($materias as $materia) {
         echo "<tr> 
                <th> " . $materia["nombre"] . "</th>
                <th> " . $materia["profesor"] . "</th>
                <th> " . $materia["catedra"] . "</th>
                <th> " . $materia["duracion"] . "</th>
                <th> <a href=\"actualizarMateria/" . $materia["id"] . "/" . $materia["nombre"] . "/"
                            . $materia["profesor"] . "\"> Actualizar </a> </th>
                <th> <a href=\"borrarMateria/" . $materia["id"] . "\"> Borrar </a> </th>
              </tr>";
    }
    
    echo "
        </table>";

}

?>