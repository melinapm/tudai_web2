<?php

require_once ".\Views\HomeView.php";

Class HomeController {

    private $view;

    function __construct() {
        $this->view = new HomeView();
    }

    public function GetHome(){
        $this->view->GetHome();
    }
}

?>