<?php

include_once 'model/UserDAO.php';

class UserController {

    function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    
    public function index() {
        
    }

    public function show() {
        $allUsers = UserDAO::getAllUsers();
        include_once 'view/admin-panel-view';
    }

    public function login() {
        include_once 'view/login-register-view.php';
    }

    public function register() {
        if (isset($_POST['name'], $_POST['surname'], $_POST['email'], $_POST['phone_number'], $_POST['password'], $_POST['password_check'])) {
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $email = $_POST['email'];
            $phoneNumber = $_POST['phone_number'];
            $password = $_POST['password'];
            $passwordCheck = $_POST['password_check'];

            if ($password != $passwordCheck) {
                $error = "Els passwords no coincideixen";
                include_once 'view/login-register-view.php';
            }
            $password = md5($password);

            if (UserDAO::getUserByEmail($email) != null) {
                $error = "Aquest correu ja està registrat";
                include_once 'view/login-register-view.php';
            }
            
            $user = new BasicUser(null, $name, $surname, $email, $password, 2, $phoneNumber);
            UserDao::insertUser($user);

            $_SESSION['loggedIn'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $name;
            $_SESSION['surname'] = $surname;

            include_once 'view/home.php';
        }
    }

   
}
?>