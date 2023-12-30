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
}

?>