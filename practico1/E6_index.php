<!DOCTYPE html>
<html lang="es">
    <head>
        <title> Practico 1 - Ejercicio 6 </title>
        <link rel="stylesheet" href="E6_estilo.css">
    </head>
    <body>
        <form method="POST">   
            <label for="limite"> Ingrese el limite de la tabla:</label>
            <input type="number" id="limite" required="required" name="limite">
            <button type="submit">Generar tabla</button>
            
            <?php

                global $limite;

                if (isset($_POST['limite']))
                    $limite = $_POST['limite'];
                            
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

            ?>

        </form>
    
               
    </body>
</html>