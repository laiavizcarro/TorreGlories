<?php
include_once 'model/Order.php';
include_once 'utils/PriceCalculator.php';


class OrderController {

    function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function index() {
        $order = isset($_SESSION['order']) ? $_SESSION['order'] : array();
        include_once 'view/order-view.php';
    }

    public function add() {
        if (isset($_GET['product_id'])) {
            $product_id = $_GET['product_id'];

            if (!isset($_SESSION['order'])) {
                $_SESSION['order'] = array();
            }

            if (!isset($_SESSION['order_quantity'])) {
                $_SESSION['order_quantity'] = 0;
            }

            if (isset($_SESSION['order'][$product_id])) {
                $_SESSION['order'][$product_id]->setQuantity($_SESSION['order'][$product_id]->getQuantity() + 1);
            } else {
                $product = ProductDAO::getProductById($_GET['product_id']);
                $order = new Order($product);
                $_SESSION['order'][$product->getId()] = $order;
            }

            $_SESSION['order_quantity']++;
        }

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function delete() {
        if (isset($_GET['product_id'])) {
            $product_id = $_GET['product_id'];
            $_SESSION['order_quantity'] -= $_SESSION['order'][$product_id]->getQuantity();
            unset($_SESSION['order'][$product_id]);
        }

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    
    public function checkout() {
        // SESSION to Database
    }

    public function increaseOrDecrease() {
        if (isset($_POST['increase'])) {
            $product_id = $_POST['increase'];
            $_SESSION['order'][$product_id]->setQuantity($_SESSION['order'][$product_id]->getQuantity() + 1);
            $_SESSION['order_quantity']++;
        } else if (isset($_POST['decrease'])){
            $product_id = $_POST['decrease'];
            if ($_SESSION['order'][$product_id]->getQuantity()==1) {
                unset($_SESSION['order'][$product_id]);   
            } else {
                $_SESSION['order'][$product_id]->setQuantity($_SESSION['order'][$product_id]->getQuantity() - 1);
            }
            $_SESSION['order_quantity']--;
        }

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
