<?php

require_once './Model/UsserModel.php';
require_once './View/UsserView.php';
require_once './helper/AuthHelper.php';

class AuthController{

    private $model;
    private $view;
    private $helper;

    public function __construct(){
         
        $this->model = new UsserModel();
        $this->view = new UsserView();  
        $this->helper = new AuthHelper();
    }

    public function showLogin(){
        $this->view->showFormLogIn();
    }

    public function showUssers(){
        $this->helper->adminCheckLog();
        $ussers = $this->model->getUsers();
        $this->view->showUssers($ussers);
    }

    public function deleteUsser($params = null){ 
        $this->helper->adminCheckLog();
        $id = $params[':ID'];
        $this->model->deleteUsser($id);
        $this->showUssers();
    }

    public function setAdminRole($params = null){
        $this->helper->adminCheckLog();
        $id = $params[':ID'];
        $this->model->setAdminRole($id);
        $this->showUssers();
    }

    public function setBasicRole($params = null){
        $this->helper->adminCheckLog();
        $id = $params[':ID'];
        $this->model->setBasicRole($id);
        $this->showUssers();
    }

    public function verifyUsser(){
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(empty($email) || empty($password)){
            $error="Faltan datos obligatorios";
            $this->view->showFormLogIn($error);
            die();  
        }
        $this->getUser($email, $password);
    }

    public function getUser($email, $password){

        $usser = $this->model->getUsser($email);
        if($usser && (password_verify($password, $usser->password))){
            
           $this->helper->startSession();
           $this->helper->sessionData($usser); 
           
            if($usser->rol == 0){
                header("Location: ".BASE_URL."carta");
            }else{
                header("Location: ".BASE_URL."admin");
            }
            die();
        }else{
            $error = "Credenciales invalidas";
            $this->view->showFormLogIn($error);
        }
    }

    public function showRegisterPage(){
        $this->view->showRegisterPage();
    }

    public function registerNewUsser(){

        $name = $_POST['name'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        if(empty($name) || empty($lastName) || empty($email) || empty($password)){
            $error="Faltan datos obligatorios";
            $this->view->showFormLogin($error);
            die();  
        }

        $passwordEncrypted = password_hash($password, PASSWORD_DEFAULT);
        $this->model->registerNewUsser($name, $lastName, $email, $passwordEncrypted);
        $this->getUser($email, $password); //no necesito verificar los datos porque acabo de registrar un usuario con los mismos
    }

    public function logOut(){
        $this->helper->logOut();
    }

}