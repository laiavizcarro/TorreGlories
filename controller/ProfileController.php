<?php

include_once 'utils/PriceCalculator.php';
include_once 'model/OrderSession.php';
include_once 'model/Order.php';
include_once 'model/OrderDAO.php';
include_once 'model/OrderProduct.php';
include_once 'model/OrderProductDAO.php';
include_once 'model/User.php';
include_once 'model/UserDAO.php';

class ProfileController {

    function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    
    public function index() {

        $user = UserDAO::getUserByEmail($_SESSION['email']);

        if (isset($_COOKIE['lastOrder'])) {
            $lastOrder = OrderDAO::getOrderById($_COOKIE['lastOrder']);
            $lastOrder->setOrderProducts(OrderProductDAO::getOrderProductsByOrderId($lastOrder->getId()));
        }

        $orders = OrderDAO::getOrdersByUserId($user->getId());

        include_once 'view/profile-view.php';
    }

    public function update() {
        $user = UserDAO::getUserByEmail($_SESSION['email']);

        $user->setName($_POST['name']);
        $user->setSurname($_POST['surname']);
        
        if(isset($_POST['incorporation_date'])) {
            $user->setIncorporationDate($_POST['incorporation_date']);
        }

        if(isset($_POST['phone_number'])) {
            $user->setPhoneNumber($_POST['phone_number']);
        }
        
        if(!empty($_POST['old_password']) && !empty($_POST['new_password'])) {
            $oldPassword = md5($_POST['old_password']);
            $newPassword = md5($_POST['new_password']);

            if($oldPassword != $user->getPassword()) {
                $error = "Contrasenya incorrecta";
                include_once 'view/profile-view.php';
                return;
            }

            if($newPassword == $user->getPassword()) {
                $error = "La contrasenya ha de ser diferent a l'anterior";
                include_once 'view/profile-view.php';
                return;
            }

            $user->setPassword($newPassword);
        }

        UserDAO::updateUser($user);

        header('Location: ' . url . '/index.php?controller=Profile');
    }
}

?>