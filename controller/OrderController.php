<?php

include_once 'utils/PriceCalculator.php';
include_once 'model/OrderSession.php';
include_once 'model/Order.php';
include_once 'model/OrderDAO.php';
include_once 'model/OrderProduct.php';
include_once 'model/OrderProductDAO.php';
include_once 'config/parameters.php';

/**
 * OrderController s'encarrega de tota la gestió de la cistella de compra
 */
class OrderController {

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
     * Retorna la vista de la cistella
     */
    public function index() {
        $order = isset($_SESSION['order']) ? $_SESSION['order'] : array();
        include_once 'view/order-view.php';
    }

    /**
     * Afegir un producte a la cistella en sessió
     */
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

    /**
     * Eliminar un producte de la cistella en sessió
     */
    public function delete() {
        if (isset($_GET['product_id'])) {
            $product_id = $_GET['product_id'];
            $_SESSION['order_quantity'] -= $_SESSION['order'][$product_id]->getQuantity();
            unset($_SESSION['order'][$product_id]);
        }

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    /**
     * Incrementar o decrementar la quantitat de productes de la cistella
     * en sessió des de la vista de la cistella
     */
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

    /**
     * Iniciar al checkout de la cistella, amb comprovació de sessió i order
     */
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
    
        include_once 'view/order-payment-view.php';
        return;
    }

    /**
     * Iniciar el pagament de la cistella, amb comprobació de les dades bancàries,
     * creació de la cistella a la base de dades i els seus productes, pagament
     * i guardar-la a la cookie de lastOrder
     */
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


    /**
     * Generador de QR
     */

    $orderUrl = url . '/index.php?controller=Order&action=view&order_id=' . $order->getId();
    $qrCodeUrl = 'https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=' . urlencode($orderUrl);
    
    // Obtindre el contingut de la imatge del codi QR 
    $qrCodeContent = file_get_contents($qrCodeUrl);
    
    // Ruta de la carpeta
    $qrCodePath = 'images/qr/' . $order->getId() . '_qr.png';
    
    // Guardar el contingut en un arxiu a la carpeta
    file_put_contents($qrCodePath, $qrCodeContent);
    
    // Redirigir a la vista de confirmació
    header('Location: ' . url . '/index.php?controller=Order&action=showQrCode&order_id=' . $order->getId());
    
    //header('Location: ' . url . '/index.php?controller=Profile');

    }

    /**
     * Mostrar el QR un cop la comanda està feta
     */
    public function showQrCode() {
        if (isset($_GET['order_id'])) {
            $orderId = $_GET['order_id'];
            $qrCodePath = 'images/qr/' . $orderId . '_qr.png';  
            if (file_exists($qrCodePath)) {
                $qrCodeUrl = url . '/images/qr/' . $orderId . '_qr.png';  
                include_once 'view/order-confirmation-view.php';
            } else {
                echo "Error: QR code not found. Path: " . $qrCodePath;
            }
        } else {
            echo "Error: Order ID not specified.";
        }
    }


    /**
     * Mostrar la vista de la comanda detallada 
     */
    public function view() {
        $order_id = $_GET['order_id'];
        $order = OrderDAO::getOrderById($order_id);
        $order->setOrderProducts(OrderProductDAO::getOrderProductsByOrderId($order_id));
        include_once 'view/order-detail-view.php';
    }



    /**
     * Repetir una comanda ja feta a través del seu id
     */
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

    public function getOrders() {
        if ($_SESSION['isAdmin'] == false) {
            header('Location: ' . url . '/index.php?controller=Home');
        }
        
        $allOrders = OrderDAO::getOrders();
        include_once 'view/admin/orders-view.php';
    }
}
