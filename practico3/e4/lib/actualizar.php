<?php

/**
 * Actualizo una materia
 */
function actualizarMateria($id,$nombre_value,$profesor_value){

   

    if (($id != null) && (isset($_POST['nombre'])) && isset($_POST['profesor'])) {
        try {
            $db = new PDO('mysql:host=localhost;dbname=universidad', 'root', 'root');
            $sentencia = $db->prepare("UPDATE materias 
                                        SET nombre=?,profesor=?
                                        WHERE id=?");

            $sentencia->execute(array($_POST['nombre'],$_POST['profesor'],$id));

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

    $html.= "<h1>Actualizar materia</h1>    
            <form class=\"container\" method=\"post\">
                <label> Materia </label>
                <input type=\"text\" name=\"nombre\" required value=".$nombre_value.">
                <label> Profesor </label>
                <input type=\"text\" name=\"profesor\" required value=".$profesor_value.">
                <button type=\"submit\"> Actualizar </button>
            </form>";
    
    echo $html;
    
}

?>