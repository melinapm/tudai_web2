<?php


/**
 * Home por defecto
 */
function showHome() {

    $html = '
    
    <h1>Pagos</h1>

    <a href="listarPagos">Ver todos los pagos</a>
    <a href="ingresarPagos">Ingresar un nuevo pago</a>


    '; 
    echo $html;
}

/**
 * Listo los pagos
 */
function listarPagos(){

    $db = new PDO('mysql:host=localhost;dbname=pagos_deudas', 'root', 'root');
    $sentencia = $db->query("SELECT * FROM pagos order by id LIMIT 10");
    $pagos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($pagos);
    echo 
    "<h1>Listado de pagos</h1>
        <table>";
        
        echo "<tr>
                <th>Deudor</th>
                <th>Cuota Nº</th>
                <th>Valor cuota ($)</th>
                <th>Fecha de Pago</th>
            </tr>";

    foreach($pagos as $pago) {
         echo "<tr> 
                <th> " . $pago["deudor"] . "</th>
                <th> " .$pago["cuota"] . "</th>
                <th> " .$pago["cuota_capital"] . "</th>
                <th> " .$pago["fecha_pago"] . "</th> 
              </tr>";
    }
    
    echo "
        </table>
        <a href='./'>Volver</a>";
    
}

/**
 * Agrego un nuevo pago
 */
function ingresarPagos(){
    
    if (isset($_POST['deudor']) && isset($_POST['cuota']) && isset($_POST['cuota_capital'])
                && isset($_POST['fecha'])) {
        //var_dump($_POST);
        try {
            $db = new PDO('mysql:host=localhost;dbname=pagos_deudas', 'root', 'root');
            $sentencia = $db->prepare("INSERT INTO pagos(deudor, cuota, cuota_capital, fecha_pago) 
                                    VALUES (?,?,?,?)");

            $sentencia->execute(array($_POST['deudor'],$_POST['cuota'], $_POST['cuota_capital'],$_POST['fecha']));
            if ($sentencia->errorInfo()[0] == '00000')
                header("Location:".BASE_URL."/listarPagos");
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

    $html.= "<h1>Agregar un pago</h1>    
            <form class=\"container\" method=\"post\">
                <label> Deudor </label>
                <input type=\"text\" name=\"deudor\" required>    
                <label> Cuota </label>
                <input type=\"number\" name=\"cuota\" required>
                <label> Cuota Capital </label>
                <input type=\"number\" name=\"cuota_capital\" required>
                <label> Fecha </label>
                <input type=\"date\" name=\"fecha\" required>
                <button type=\"submit\"> Cargar </button>
            </form>";
    
    $html.= "<a href='./'>Volver</a>";


    echo $html;

}

