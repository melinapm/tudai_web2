<?php

require_once ".\Models\VeterinariosModel.php";
require_once ".\Views\VeterinariosView.php";

Class VeterinariosController {

    private $model;
    private $view;

    function __construct() {
        $this->model = new VeterinariosModel();
        $this->view = new VeterinariosView();
    }


    public function GetVeterinarios(){
        $veterinarios = $this->model->GetVeterinarios();
        $this->view->DisplayVeterinarios($veterinarios);
    }
}

?>