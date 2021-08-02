<?php

require_once './Model/ProductModel.php';
require_once './View/ProductView.php';

class ProductController{

    private $model;
    private $view;
    private $helper;
    private $modelCategory;//ROMPEMOS RESPONSABILIDADES POR UNA RAZON VALIDA

    public function __construct(){
        $this->model = new ProductModel();
        $this->view = new ProductView();  
        $this->helper = new AuthHelper();
    }

    function showProducts(){
        $this->helper->startSession();
        $products = $this->model->getProducts();   
        $this->view->showProducts($products); 
    }

    function showProductDetail($params = null){
        $this->helper->startSession();
        $id = $params[':ID'];
        $product = $this->model->getProductById($id);
        $usser = $this->helper->isLoggedIn();
        $this->view->showProductDetail($product, $usser);
    }

    function showCategoryProducts($params = null){
        $this->helper->startSession();
        $id = $params[':ID'];
        $catProducts = $this->model->getProductsFromCat($id);
        $this->view->showProductsFromCat($catProducts, $id);
    } 

    function showAdminPage(){
        $this->helper->adminCheckLog();
        $this->modelCategory = new CategoryModel();
        $id = 0;
        $products = $this->model->getProducts();
        $categories = $this->modelCategory->getCategory();
        $edit = false;
        $this->view->showAdminProducts($products, $edit, $id, $categories);
    }

    function showHome(){
        $this->helper->startSession();
        $this->view->showHome();
    }

    function showCompany(){
        $this->helper->startSession();
        $this->view->showCompany();
    }

    function insertProduct(){
        $this->helper->adminCheckLog();
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $id_categoria = $_POST['id_categoria'];

        if($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg"){
            $imagen = $_FILES['imagen']['tmp_name'];
            $this->model->addProducts($nombre, $descripcion, $precio, $id_categoria, $imagen);
        }else{
            $this->model->addProducts($nombre, $descripcion, $precio, $id_categoria);
        } 
        header("Location: ".BASE_URL."admin");
    }

    function updateProduct(){
        $this->helper->adminCheckLog();
        $id = $_POST['id']; 
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $id_categoria = $_POST['id_categoria'];

        if($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg"){
            $imagen = $_FILES['imagen']['tmp_name'];
            $this->model->updateProduct($id, $nombre, $descripcion, $precio, $id_categoria, $imagen);
        }else{
            $this->model->updateProduct($id, $nombre, $descripcion, $precio, $id_categoria);
        }
        header("Location: ".BASE_URL."admin");
    }

    function deleteProduct($params = null){
        $this->helper->adminCheckLog();
        $id = $params[':ID'];
        $this->model->deleteProduct($id);
        header("Location: ".BASE_URL."admin");
    }

    function showAdminEditPage($params = null){
        $this->helper->adminCheckLog();
        $this->modelCategory = new CategoryModel();
        $id = $params[':ID'];
        $products = $this->model->getProducts();
        $categories = $this->modelCategory->getCategory();
        $edit = true;   //bool para ver que tpl incluye smarty
        $this->view->showAdminProducts($products, $edit, $id, $categories); 
    }

    function getProductsByPage($params = null){
        $this->helper->startSession();
        $tamanio_pagina = 3;
        $num_total_registros = count($this->model->getProducts());
        $total_paginas = ceil($num_total_registros / $tamanio_pagina);
       
        if(isset($params[':PAGINA'])){
            $pagina = ($params[':PAGINA'] - 1);

            if($params[':PAGINA'] < 1){
                $pagina = 0;
            }

            if($params[':PAGINA'] > $total_paginas){
                $pagina = $total_paginas-1;
            }

        }else{
            $pagina = 0;
        }
        
        if(isset($_GET['criterio'])){
            $criterio = " WHERE descripcion LIKE '%".$_GET['criterio']."%'";
            $num_total_registros = count($this->model->getProducts($criterio));
            $total_paginas = ceil($num_total_registros / $tamanio_pagina);
        }else{
            $criterio = "";
        }
       
        $desde = ($pagina * $tamanio_pagina);
        $products = $this->model->getProductsByPage($desde, $tamanio_pagina, $criterio);
        $this->view->showProductsByPage($products, $pagina, $total_paginas); 
    }
}