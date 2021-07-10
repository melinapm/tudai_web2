<?php
            global $numero1, $numero2, $resultado;

            if ((isset($_POST['numero1'])) && (isset($_POST['numero2']))) {
                $numero1 = (int) $_POST['numero1'];
                $numero2 = (int) $_POST['numero2'];
            }

            /*if (isset($_POST['sumar']))
                $resultado =  $numero1 + $numero2;
            else if (isset($_POST['restar']))
                $resultado = $numero1 - $numero2;
            else if (isset($_POST['dividir']))
                $resultado = $numero1 / $numero2;
            else if (isset($_POST['multiplicar']))
                $resultado = $numero1 * $numero2;*/

            $operacion = $_POST["operacion"];

            switch ($operacion){
                case "restar":
                    $resultado = $numero1 - $numero1;
                break;
                case "sumar":
                    $resultado = $numero1 + $numero1;
                break;
                case "multiplicar":
                    $resultado = $numero1 * $numero1;
                break;
                case "dividir":
                    $resultado = $numero1 / $numero1;
                break;
            }
            
            echo "Resultado de " . $operacion . " " . $numero1 . " y " . $numero1 . " es " .$resultado;
            
            echo "<a href=\"E8_index.html\"> Volver </a>"
        
?>