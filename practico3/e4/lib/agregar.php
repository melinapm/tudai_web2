<?php

/**
 * Agrego una nueva materia
 */
function agregarMateria(){
    
    if (isset($_POST['nombre']) && isset($_POST['profesor'])) {
        //var_dump($_POST);
        try {
            $db = new PDO('mysql:host=localhost;dbname=universidad', 'root', 'root');
            $sentencia = $db->prepare("INSERT INTO materias(nombre, profesor) 
                                        VALUES (?,?)");

            $sentencia->execute(array($_POST['nombre'],$_POST['profesor']));
            if ($sentencia->errorInfo()[0] == '00000')
                header("Location:".BASE_URL."home");
            else
                print_r($sentencia->errorInfo());
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }

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

    $html.= "<h1>Agregar una materia</h1>    
            <form class=\"container\" method=\"post\">
                <label> Materia </label>
                <input type=\"text\" name=\"nombre\" required>    
                <label> Profesor </label>
                <input type=\"text\" name=\"profesor\" required>
                <button type=\"submit\"> Cargar </button>
            </form>";
    
    echo $html;
    

}

?>