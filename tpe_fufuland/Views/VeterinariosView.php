<?php

require_once "./libs/smarty/Smarty.class.php";

Class VeterinariosView {

    private $title;

    function construct(){
        $this->title = "Lista de Veterinarios";        
    }

    public function DisplayVeterinarios($veterinarios){
        $smarty = new Smarty();
        $smarty->assign('titulo_s', "Lista de Veterinarios");
        $smarty->assign('veterinarios', $veterinarios);
        
        $smarty->display('templates/veterinarios.tpl'); // muestro el template 

    }

    function ShowHomeLocation(){
        header("Location: ".BASE_URL."home");
    }
}
?>