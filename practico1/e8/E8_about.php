<h3> About </h3>


<?php 
    global $autor;

    if (isset($_GET['developer']))
        $autor=$_GET['developer'];

    switch ($autor) {
        case 'melina':
            echo "<p> Este ejercicio de PHP fue realizado por Melina PM</p>";
            break;
        case 'juan':
            echo "<p> Este ejercicio de PHP fue realizado por Juan Doe </p>";
            break;
        default:
            echo "<p> Este ejercicio de PHP fue realizado por Melina y Juan Doe </p>";
            break;
    }

?>


