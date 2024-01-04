<?php

/**
 * HomeController s'encarrega de gestionar la pàgina principal
 * de la web
 */
class HomeController {

    /**
     * Constructor
     */
    function __construct() {
        // Iniciem la sessió en el cas de que no s'hagi inicialitzat.
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    
    /**
     * Retorna la vista de la home
     */
    public function index() {
        include_once 'view/home.php';
    }

}

?>