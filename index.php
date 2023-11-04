<?php
include_once 'controller/ProductController.php';
include_once 'config/parameters.php';
include_once 'view/header.php';

if(!isset($_GET['controller'])){
    //si no es passa res, es mostrarà pàgina principal de comandes
    header("Location:" . url. '?controller=Product');
}else{
    $controller_name = $_GET['controller'].'Controller';

    if(class_exists($controller_name)){
        //mirem si ens passa una accio
        //en cas contrari mostrem una accio per defecte
        $controller = new $controller_name;

        if(isset($_GET['action']) && method_exists($controller, $_GET['action'])){
            $action = $_GET['action'];
        }else{
            $action = default_action;
        }
        $controller->$action();
    }else{
        header("Location:" . url. '?controller=Product');
    }
}

?>