<?php 
    //print_r($_POST);
    //var_dump($_POST['intereses'])


    echo "Su nombre es " . $_POST['nombre'] .
    " su apellido "  . $_POST['apellido'] .
    " usted tiene "  . $_POST['edad'] . " años " .
    " su genero es "  . $_POST['genero'] .
    " y sus intereses son " ;
    
    foreach ($_POST['intereses'] as &$valor) {
        echo $valor. ' ';
    }

?>