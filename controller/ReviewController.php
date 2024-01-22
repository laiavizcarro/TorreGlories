<?php
class ReviewController {
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
     * Obtindre i retornar totes les ressenyes de la web
     */
    public function index() {
        include_once 'view/review-view.php';
    }

    
}
?>