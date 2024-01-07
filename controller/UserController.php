<?php

include_once 'model/UserDAO.php';

/**
 * UserController s'encarrega de gestionar tot lo relacionat
 * amb la entitat Usuari
 * 
 * Registre, Login i Logout
 * 
 */
class UserController {

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
     * Obtindre un llistat de tots els usuaris de la web
     * 
     * Funcionalitat d'administrador
     */
    public function index() {
        if ($_SESSION['isAdmin'] == false) {
            header('Location: ' . url . '/index.php?controller=Home');
        }

        $allUsers = UserDAO::getAllUsers();
        include_once 'view/admin/users-view';
    }

    /**
     * Retorna la vista de registre/login
     */
    public function loginView() {
        include_once 'view/login-register-view.php';
    }

    /**
     * Permet fer login d'un usuari a través del email i contrasenya, i crear
     * una sessió per a la seva navegació per la web
     */
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

            /* 
             * fromCheckout: Es un boolean que guardem en sessió i indica
             * si aquest mètode s'ha cridat des de la vista de checkout de
             * la cistella, en aquest cas després de completar login hem de
             * redirigir a l'usuari a la vista de checkout un altre cop
             */
            if ($_SESSION['fromCheckout'] == true) {
                header('Location: ' . url . '/index.php?controller=Order&action=checkout');
            } else {
                header('Location: ' . url . '/index.php?controller=Home');
            }
        }
    }

    /**
     * Registre d'un usuari a la web amb la seva corresponent creació de la
     * sessió
     * 
     * Camps obligatoris:
     *  - Name
     *  - Surname
     *  - Email
     *  - Phone Number
     *  - Password
     *  - Password Check
     * 
     * Només permet el registre d'usuaris tipus Basic (2)
     */
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

    /**
     * Logout de l'usuari, destrucció de la sessió i redirect a la Home
     */
    public function logout() {
        session_destroy();
        header('Location: ' . url . '/index.php?controller=Home');

    }
}
?>