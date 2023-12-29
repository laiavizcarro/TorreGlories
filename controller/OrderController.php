<?php
include_once 'model/OrderSession.php';
include_once 'utils/PriceCalculator.php';
include_once 'model/Order.php';
include_once 'model/OrderDAO.php';
include_once 'model/OrderProduct.php';
include_once 'model/OrderProductDAO.php';


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
                $order = new OrderSession($product);
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
            $_SESSION['fromCheckout'] = true;
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
        //Validar que omplin les dades del formulari correctament
        if (!isset($_POST['card-name'], $_POST['card-number'], $_POST['card-expiry-date'], $_POST['card-cvv'] )) {
            $error = 'Les dades de pagament no són correctes.';
            return;
        }

        //Guardar la comanda i productes a la bbdd 
        $user = UserDAO::getUserByEmail($_SESSION['email']);
        $order = new Order(null, $user->getId(), date("Y-m-d H:i:s"), 0);
        $order_id = OrderDAO::createOrder($order);
        $order->setId($order_id);

        foreach($_SESSION['order'] as $orderProductSession) {
            $orderProduct = new OrderProduct(
                $order->getId(), 
                $orderProductSession->getProduct()->getId(),
                $orderProductSession->getProduct()->getName(),
                $orderProductSession->getQuantity(),
                $orderProductSession->getProduct()->getIva(),
                $orderProductSession->getProduct()->getBase_price(),
                $orderProductSession->getProduct()->getTotal_price(),
                $orderProductSession->getProduct()->getIs_offer(),
                $orderProductSession->getProduct()->getOffer_price(),
                $orderProductSession->getProduct()->getTotal_offer_price(),
            );
            OrderProductDAO::createOrderProduct($orderProduct);
        }

        // Calcular el total price de la comanda
        $orderTotalPrice = PriceCalculator::calculateOrderTotalPrice($_SESSION['order']);

        // Pagament
        // ...

        // Marcar la comanda com a pagada
        OrderDAO::orderPay($order);

        // TODO: Guardar la comanda en cookie
        setcookie('lastOrder', "a", time() + 3600);

        // Eliminar la comanda de la session
        unset($_SESSION['order']);
        unset($_SESSION['order_quantity']);
    }
}
