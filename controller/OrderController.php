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

    //Funció per afegir un producte a la cistella
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

    //Funció per a eliminar un producte de la cistella
    public function delete() {
        if (isset($_GET['product_id'])) {
            $product_id = $_GET['product_id'];
            $_SESSION['order_quantity'] -= $_SESSION['order'][$product_id]->getQuantity();
            unset($_SESSION['order'][$product_id]);
        }

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    //Funció que permet augmentar o disminuir la quantitat d'un producte a la cistella
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

    //Funció que comprova si existeix una sessió iniciada o cal obrir per a procedir al pagament
    public function checkout() {
        if (!isset($_SESSION['email'])) {
            header('Location: ' . url . '/index.php?controller=User&action=loginView');
            return;
        }
    
        if (empty($_SESSION['order'])) {
            header('Location: ' . url . '/index.php?controller=Order&action=index');
            return;
        }

        $order = isset($_SESSION['order']) ? $_SESSION['order'] : array();
    
        include_once 'view/payment-view.php';
        return;
    }

    public function checkoutPayment() {
        // SESSION to Database
    }

    public function checkoutConfirm() {
        //Guardo la comanda a la base de dades. OrderDAO per guardar-ho a la BBDD.

        //Un cop confirmat el order, borro del carrito
        unset($_SESSION['order_quantity']);
        //Guardo la cookie
        setcookie('lastOrder', $_POST['finalQuantity'], 3600);

        //Un cop he mostrar el text de l'ultima comanda va ser de X, ja no mostro més el text.
    }
}
