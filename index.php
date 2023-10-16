<?php
include_once 'controller/orderController.php';
include_once 'config/parameters.php';

//aixo esta fet al principi
if(isset($_GET['controller'])){
    echo 'Vols realitzar una acció sobre ' . $_GET['controller'];
    if(isset($_GET['action'])){
        echo 'Sobre ' . $_GET['controller'] . 'vols mostrar la pàgina' . $_GET['action'];

    }   
}else{
    echo 'no has passat controller';
}
//aqui acaba ho del principi 

//localhost/nom/?controller=orderController&action=index per provar si funciona ho de sota
//apartat 2 - 
if(!isset($_GET['controller'])){
    //si no es passa res, es mostrarà pàgina principal de comandes
    header("Location:" . url. '?controller=order');
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
        
    }else{
        //echo  $controller_name . 'no existeix';
        header("Location:" . url. '?controller=order');


    }
}
?>