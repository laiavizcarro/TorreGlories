<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Mantindre totes les cookies 1h després de reiniciar el navegador.
session_set_cookie_params(time() + 3600);

// Importem tots els scripts necessaris.
include_once 'config/parameters.php';
include_once 'controller/api/ReviewController.php';
include_once 'controller/api/ProductController.php';
include_once 'controller/api/UserController.php';


if (!isset($_GET['controller'])) {
    echo json_encode([
        "success" => false,
        "message" => "El parametre 'controller' es obligatori",
        "data" => null
    ]);
} else {
    $controller_name = $_GET['controller'].'Controller';

    if (class_exists($controller_name)) {
        //mirem si ens passa una accio
        //en cas contrari mostrem una accio per defecte
        $controller = new $controller_name;

        if (isset($_GET['action']) && method_exists($controller, $_GET['action'])) {
            $action = $_GET['action'];
        } else {
            $action = default_action;
        }
        
        $controller->$action();
    } else {
        echo json_encode([
            "success" => false,
            "message" => "Aquesta ruta no existeix",
            "data" => null
        ]);
    }
}

?>
