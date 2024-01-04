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

    public function loginView() {
        include_once 'view/login-register-view.php';
    }

    public function login() {
        if (isset($_POST['email'], $_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = UserDAO::getUserByEmail($email);
            
            if ($user == null) {
                $error_login = "Login incorrecte";
                include_once 'view/login-register-view.php';
                return;
            }

            $password = md5($password);
            if ($password != $user->getPassword()) {
                $error_login = "Login incorrecte";
                include_once 'view/login-register-view.php';
                return;
            }

            $_SESSION['loggedIn'] = true;
            $_SESSION['email'] = $user->getEmail();
            $_SESSION['name'] = $user->getName();
            $_SESSION['surname'] = $user->getSurname();
            $_SESSION['isAdmin'] = $user->isAdmin();

            if ($_SESSION['fromCheckout'] == true) {
                header('Location: ' . url . '/index.php?controller=Order&action=checkout');
            } else {
                header('Location: ' . url . '/index.php?controller=Home');
            }
        }
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
                return;
            }
            $password = md5($password);

            if (UserDAO::getUserByEmail($email) != null) {
                $error = "Aquest correu ja està registrat";
                include_once 'view/login-register-view.php';
                return;
            }
            
            $user = new BasicUser(null, $name, $surname, $email, $password, 2, $phoneNumber);
            UserDao::insertUser($user);

            $_SESSION['loggedIn'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $name;
            $_SESSION['surname'] = $surname;

            header('Location: ' . url . '/index.php?controller=Home');
        }
    }

    public function logout() {
        session_destroy();
        header('Location: ' . url . '/index.php?controller=Home');

    }
}
?>