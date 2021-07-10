<!DOCTYPE html>
<html lang="es">
    <head>
        <title> Practico 1 - Ejercicio 5 </title>
        <link rel="stylesheet" href="E5_estilo.css">
    </head>
    <body>
        <?php

            global $imc;
            global $nombre;

            if (isset($_GET['nombre']))
                $nombre = $_GET['nombre'];
            if ((isset($_GET['altura'])) && (isset($_GET['peso']))) {
                $altura = $_GET['altura'] / 100;
                $peso = $_GET['peso'];
                $imc = $peso / ( $altura * $altura);
            }

            if ($imc < 18.50 )
                $resultado = "peso bajo";
            else if (($imc > 18.50) && ($imc < 24.99))
                $resultado = "peso normal";
            else if (($imc > 25) && ($imc < 29.99))
                $resultado = "sobrepeso";
            else if ($imc >= 30)
                $resultado = "obesidad";

        ?>

        <form method="GET">   
            <label for="nombre">Escribe tu NOMBRE:</label>
            <input type="text" id="nombre" required="required" name="nombre">
            <br>
            <label for="altura">Escribe tu ALTURA actual (cm):</label>
            <input type="text" id="altura" required="required" name="altura">
            <br>
            <label for="peso">Escribe tu PESO actual (kg):</label>
            <input type="text" id="peso" required="required" name="peso">
            <br>
            <button type="submit">Calcular IMC</button>

            <?php
    
                echo "<p>" . $nombre . " tu IMC es de " . $imc . "</p>";
                echo "<p> Usted tiene " . $resultado . "</p>";

            ?>

        </form>

       
    </body>
</html>