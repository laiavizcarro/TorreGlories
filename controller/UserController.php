<?php
class UserController{

    function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    
    public function index() {
        include_once 'view/login-register-view.php';
    }

    
}
?>