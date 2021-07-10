<?php 
   /* if ((isset($_POST['nombre'])) && (isset($_POST['apellido']))) {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $edad = $_POST['edad'];
        echo "<h3>" . $nombre . " " . $apellido . " tiene " . $edad . " años. </h3>";
    }*/
    
    //Valida la edad con un rango de 3 a 100 años.
    $opciones_edad = array(
        'options' => array(
        //Definimos el rango de edad entre 3 a 100.
        'min_range' => 3,
        'max_range' => 100
        )
    );

    if ((validaRequerido($_POST['nombre'])) && (validaRequerido($_POST['apellido'])) && (validarEntero((int) $_POST['edad'], $opciones_edad))) {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $edad = $_POST['edad'];
        echo "<h3>" . $nombre . " " . $apellido . " tiene " . $edad . " años. </h3>";
    } else
        echo "<h3> Rellene todos los campos </h3>";

    function validaRequerido($valor){
        if(trim($valor) == ''){
            return false;
        }else{
            return true;
        }
    }

    // FILTER_VALIDATE_INT = funcion propia de php que validar que sea un entero
    function validarEntero($valor, $opciones=null){
        if(filter_var($valor, FILTER_VALIDATE_INT, $opciones) === FALSE){
            return false;
        }else{
            return true;
        }
    }
?>