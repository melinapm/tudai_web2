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


    //echo json_encode($arregloResultado);
?>