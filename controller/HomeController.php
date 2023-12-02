<?php
class HomeController {

    function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    
    public function index() {
        include_once 'view/home.php';
    }
}

?>