<!DOCTYPE html>
<html lang="es">
    <head>
        <title> Practico 1 - Ejercicio 4 </title>
    </head>
    <body>
        <h2> Cosas a hacer: </h2>
        
        <a href="E4_index.php?mostrar=2"> Ver los primeros 2 </a> <br>
        <a href="E4_index.php?mostrar=5"> Ver los primeros 5 </a> <br>
        <a href="E4_index.php?mostrar=8"> Ver los primeros 8 </a> <br>
        <a href="E4_index.php?mostrar=0"> Ver todos </a> <br>

        <?php
            $hacer = array("Comprar verdura", "Limpiar casa erizos", "Estudiar web 2"
                , "elemento 4" , "elemento 5" , "elemento 6" , "elemento 7" , "elemento 8"
                , "elemento 9" , "elemento 10");

            if ($_GET['mostrar'] == 0)
                $mostrar_elementos = count($hacer);
            else
                $mostrar_elementos = $_GET['mostrar'];
            
            echo "<h3> Mostrando los primeros:" . $mostrar_elementos . "</h3>";
            
            echo "<ul>";
            for ($i=0 ; $i< $mostrar_elementos ; $i++) {
                echo "<li>". $hacer[$i] ."</li>";
            }
            echo "<ul>";
        ?>
    </body>
</html>