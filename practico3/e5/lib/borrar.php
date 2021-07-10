<?php

/**
 * Borro una materia
 */
function borrarMateria($id){
    
    if ($id != null) {
        try {
            $db = new PDO('mysql:host=localhost;dbname=universidad', 'root', 'root');
            $sentencia = $db->prepare("DELETE FROM materias WHERE id=?");
            $sentencia->execute(array($id));

            if ($sentencia->errorInfo()[0] == '00000')
                header("Location:".BASE_URL."home");
            else
                print_r($sentencia->errorInfo());
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }   

}

?>