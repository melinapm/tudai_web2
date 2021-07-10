<?php

function showHome() {

    $html = '
    
    <h1> Home </h1>
    <ul>
        <li><a href="tabla/2">Generar tabla de 2</a></li>
        <li><a href="tabla/5">Generar tabla de 5</a></li>
        <li><a href="tabla/10">Generar tabla de 10</a></li>
        <li><a href="tabla/20">Generar tabla de 20</a></li>
    </ul>

    '; 
    echo $html;
}

/**
 * Genera la tabla
 */
function crearTabla($limite){
    $html = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <base href="'.BASE_URL.'">
        <title>Tabla</title>
    </head>
    <body> ';

    echo "<table>";
    for ($i=1; $i <= $limite ; $i ++) {
        echo "<tr>";
        echo "<th>" . $i ."</th>";
        for ($j=2; $j <= $limite ; $j ++) {                    
            if ($i == 1)
                echo "<th>" . $j ."</th>";
            else
                echo "<td>" . $i * $j ."</td>";
        }
        echo "</tr>";
    }
    echo "</table>";


    $html.='<a href="home">Volver</a>
    </body>
    </html>';
    
    echo $html;
}
