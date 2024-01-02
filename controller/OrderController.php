<?php

include_once 'utils/PriceCalculator.php';
include_once 'model/OrderSession.php';
include_once 'model/Order.php';
include_once 'model/OrderDAO.php';
include_once 'model/OrderProduct.php';
include_once 'model/OrderProductDAO.php';
include_once 'config/parameters.php';


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
                $order = new OrderSession();
                $order->setProduct($product);
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
        // Validar que omplin les dades del formulari correctament
        if (!isset($_POST['card-name'], $_POST['card-number'], $_POST['card-expiry-date'], $_POST['card-cvv'] )) {
            $error = 'Les dades de pagament no són correctes.';
            return;
        }

        // Obtenim l'usuari de la DB
        $user = UserDAO::getUserByEmail($_SESSION['email']);

        // Creem l'objecte Order
        $order = new Order();
        $order->setUserId($user->getId());
        $order->setDate(date("Y-m-d H:i:s"));
        $order->setIsPaid(0);

        // Assignem tots els products al Order
        $orderProductsList = [];
        foreach($_SESSION['order'] as $orderProductSession) {
            $orderProduct = new OrderProduct();
            $orderProduct->setProductId($orderProductSession->getProduct()->getId());
            $orderProduct->setName($orderProductSession->getProduct()->getName());
            $orderProduct->setQuantity($orderProductSession->getQuantity());
            $orderProduct->setIva($orderProductSession->getProduct()->getIva());
            $orderProduct->setBasePrice($orderProductSession->getProduct()->getBasePrice());
            $orderProduct->setTotalPrice($orderProductSession->getProduct()->getTotalPrice());
            $orderProduct->setIsOffer($orderProductSession->getProduct()->isOffer());
            $orderProduct->setOfferPrice($orderProductSession->getProduct()->getOfferPrice());
            $orderProduct->setTotalOfferPrice($orderProductSession->getProduct()->getTotalOfferPrice());
            array_push($orderProductsList, $orderProduct);
        }
        $order->setOrderProducts($orderProductsList);

        // Calculem el totalPrice per a la comanda
        $order->setTotalPrice($order->calculateTotalPrice());
        
        // Creem la comanda i els seus productes a la DB
        $order_id = OrderDAO::createOrder($order);
        $order->setId($order_id);

        foreach($order->getOrderProducts() as $orderProduct) {
            $orderProduct->setOrderId($order->getId());
            OrderProductDAO::createOrderProduct($orderProduct);
        }

        // Pagament
        // ...

        // Marcar la comanda com a pagada
        OrderDAO::orderPay($order);

        // Guardar la comanda en cookie
        setcookie('lastOrder', $order->getId(), time() + 3600);

        // Eliminar la comanda de la session
        unset($_SESSION['order']);
        unset($_SESSION['order_quantity']);
    }

    public function repeatOrder() {
        $orderId = $_GET['orderId'];

        // Obtenim la comanda de la DB
        $order = OrderDAO::getOrderById($orderId);
        $order->setOrderProducts(OrderProductDAO::getOrderProductsByOrderId($order->getId()));

        // Transformem la comanda de Order a $_SESSION
        $_SESSION['order'] = array();
        $_SESSION['order_quantity'] = 0;
        foreach ($order->getOrderProducts() as $orderProduct) {
            $orderSession = new OrderSession();
            $product = ProductDAO::getProductById($orderProduct->getProductId());
            $orderSession->setProduct($product);
            $orderSession->setQuantity($orderProduct->getQuantity());
            $_SESSION['order'][$product->getId()] = $orderSession;
            $_SESSION['order_quantity'] += $orderSession->getQuantity();
        }

        header('Location: ' . url . '/index.php?controller=Order');
    }
}
