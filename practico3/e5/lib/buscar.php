<?php

/**
 * Busco una materia
 */
function buscarMateria(){

    

    $html = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="app/estilo.css">
        <base href="'.BASE_URL.'">
    </head>
    <body> ';

    $html.= "<h1>Buscar una materia</h1>    
            <form class=\"container\" method=\"post\">
                <label> Materia </label>
                <input type=\"text\" name=\"nombre\" required>
                <button type=\"submit\"> Buscar </button>
            </form>";
    
    echo $html;
    
    
    if (isset($_POST['nombre'])) {
        
        try {
            $db = new PDO('mysql:host=localhost;dbname=universidad', 'root', 'root');
            $sentencia = $db->prepare("SELECT m.id, m.nombre, m.profesor, c.nombre catedra, c.duracion
                                        FROM materias m JOIN carreras c ON m.carrera=c.id
                                        WHERE m.nombre LIKE :nombre_materia
                                        ORDER BY m.id");

            $sentencia->bindValue(':nombre_materia', '%'.$_POST['nombre'].'%');
            $sentencia->execute();
            
            $materias = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            
            echo 
            "<table>";
                
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

        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }

}


/**
 * Listar carreras menor a...
 */
function buscarMateriasPorDuracion(){

    

    $html = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="app/estilo.css">
        <base href="'.BASE_URL.'">
    </head>
    <body> ';

    $html.= "<h1>Listar materias por carrera</h1>    
            <form class=\"container\" method=\"post\">
                <label> Duracion menor a... </label>
                <input type=\"number\" name=\"duracion\" max=\"10\" required>
                <button type=\"submit\"> Buscar </button>
            </form>";
    
    echo $html;
    
    
    if (isset($_POST['duracion'])) {
        //var_dump($_POST);
        try {
            $db = new PDO('mysql:host=localhost;dbname=universidad', 'root', 'root');
            $sentencia = $db->prepare("SELECT m.id, m.nombre, m.profesor, c.nombre catedra, c.duracion
                                        FROM materias m JOIN carreras c ON m.carrera=c.id
                                        WHERE c.duracion <= :duracion_carrera
                                        ORDER BY m.id");

            $sentencia->bindValue(':duracion_carrera', $_POST['duracion']);
            $sentencia->execute();
            $materias = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            echo 
            "<table>";
                
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

        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }

}


/**
 * Listar materias de carrera
 */
function buscarMateriasPorCarrera(){

    

    $html = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="app/estilo.css">
        <base href="'.BASE_URL.'">
    </head>
    <body> ';

    $html.= "<h1>Listar materias por carrera</h1>    
            <form class=\"container\" method=\"post\">
                <label> Carrera </label>
                <input type=\"text\" name=\"nombre\" required>
                <button type=\"submit\"> Buscar </button>
            </form>";
    
    echo $html;
    
    
    if (isset($_POST['nombre'])) {
        //var_dump($_POST);
        try {
            $db = new PDO('mysql:host=localhost;dbname=universidad', 'root', 'root');
            $sentencia = $db->prepare("SELECT m.id, m.nombre, m.profesor, c.nombre catedra, c.duracion
                                        FROM materias m JOIN carreras c ON m.carrera=c.id
                                        WHERE c.id LIKE :nombre_carrera
                                        ORDER BY m.id");

            $sentencia->bindValue(':nombre_carrera', '%'.$_POST['nombre'].'%');
            $sentencia->execute();
            
            $materias = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            
            echo 
            "<table>";
                
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

        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }

}

?>