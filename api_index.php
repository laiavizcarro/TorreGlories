<?php

// Mantindre totes les cookies 1h després de reiniciar el navegador.
session_set_cookie_params(time() + 3600);

// Importem tots els scripts necessaris.
include_once 'config/parameters.php';
include_once 'controller/APIController.php';

if (!isset($_GET['controller'])) {
    //si no es passa res, es mostrarà la home
    //header("Location:" . url. '?controller=Home');
} else {
    $controller_name = $_GET['controller'].'Controller';

    if (class_exists($controller_name)) {
        //mirem si ens passa una accio
        //en cas contrari mostrem una accio per defecte
        $controller = new $controller_name;

        if(isset($_GET['action']) && method_exists($controller, $_GET['action'])){
            $action = $_GET['action'];
        }else{
            $action = default_action;
        }
        $controller->$action();
    } else {
        //header("Location:" . url. '?controller=Home');
    }
}
?>
