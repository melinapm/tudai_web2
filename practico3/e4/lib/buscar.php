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
            $sentencia = $db->prepare("SELECT * FROM materias WHERE nombre LIKE :nombre_materia");

            $sentencia->bindValue(':nombre_materia', '%'.$_POST['nombre'].'%');
            $sentencia->execute();
            
            $materias = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            
            echo 
            "<table>";
                
                echo "<tr>
                        <th>Materia</th>
                        <th>Profesor</th>
                    </tr>";

            foreach($materias as $materia) {
                echo "<tr> 
                        <th> " . $materia["nombre"] . "</th>
                        <th> " . $materia["profesor"] . "</th>
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