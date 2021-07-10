<!DOCTYPE html>
<html lang="es">
    <head>
        <title> Practico 1 - Ejercicio 7 </title>
        <link rel="stylesheet" href="E7_estilo.css">
    </head>
    <body>
        <form method="POST">   
            <label> Ingrese el monto a invertir:</label>
            <input type="number" id="monto" required="required" name="monto">
            <button type="submit">Calcular Interes</button>

            <?php

                $meses = array('enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre');

                global $monto;
                $interes_actual = 30;

                if (isset($_POST['monto']))
                    $monto = $_POST['monto'];
                
                echo "<h3> Monto + interes a 1 año </h3>";
                echo "<p> Interes actual del ". $interes_actual ."% </p>";
                $mesesMaximo = 12;
                echo "<table>";
                echo "<tr>";
                for ($i=0; $i < $mesesMaximo ; $i ++) {
                    echo "<th>" . $meses[$i] ."</th>";
                }
                echo "</tr>";
                echo "<tr>";
                for ($i=0; $i < $mesesMaximo ; $i ++) {
                    $monto = $monto + ((($interes_actual * $monto)) / 100);
                    echo "<td>" . $monto ."</td>";
                }
                echo "</tr>";
                echo "</table>";
                
            ?>
               
        </form>

    </body>
</html>