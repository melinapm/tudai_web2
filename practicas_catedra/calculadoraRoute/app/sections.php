<?php

/**
 * Imprime el home de la calculadora
 */
function showHome() {

    $html = '
    
    <h1> Home </h1>
    <ul>
        <li><a href="home">Home</a></li>
        <li><a href="pi">Pi</a></li>
        <li><a href="help">Help</a></li>
        <li><a href="about">About</a></li>
    </ul>

    '; 
    echo $html;
}

/**
 * Imprime la seccion Pi
 */
function showPi(){
    $html = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Pi</title>
    </head>
    <body> ';

    $html.= '<h1>El número PI</h1>';
    $html.= '<h2>'.pi().'</h2>';
    
    $html.='</body>
    </html>';
    
    echo $html;
}

/**
 * Imprime la seccion about.
 */
function showAbout($person){
    $html = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <base href="'.BASE_URL.'">
        <title>About</title>
    </head>
    <body>';


    if ($person == null){
        $html.=  '<h2> About General </h2>
                    <img src="img/about.jpg" alt="Capo DEV">';
    }else{
        $html.=  '<h2> About '.$person.' DEV </h2>
                 <img src="img/juan.jpg" alt="Capo DEV">';
    }

    $html.='</body>
    </html>';

    echo $html;
}

function showHelp() {
    $html = '
    <h1> Ayuda </h1>
    <ul>
        <li><a href="home">Home</a></li>
        <li><a href="pi">Pi</a></li>
        <li><a href="help">Help</a></li>
        <li><a href="about">About</a></li>
    </ul>

   
    '; 
    echo $html;

}