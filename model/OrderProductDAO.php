<?php
include_once 'config/db.php';
include_once 'OrderProduct.php';
include_once 'Order.php';


class OrderProductDAO {

    public static function createOrderProduct(OrderProduct $orderProduct) {
        $order_id = $orderProduct->getOrderId();
        $product_id = $orderProduct->getProductId();
        $name = $orderProduct->getName();
        $quantity = $orderProduct->getQuantity();
        $iva = $orderProduct->getIva();
        $base_price = $orderProduct->getBasePrice();
        $total_price = $orderProduct->getTotalPrice();
        $is_offer = $orderProduct->getIsOffer();
        $offer_price = $orderProduct->getOfferPrice();
        $total_offer_price = $orderProduct->getOfferPrice();

        $con = DB::connectDB();

        $stmt = $con->prepare("INSERT INTO order_products (order_id, product_id, name, quantity, iva,
        base_price, total_price, is_offer, offer_price, total_offer_price) VALUES 
        (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("iisiiiiiii", $order_id, $product_id, $name, $quantity, $iva, $base_price,
        $total_price, $is_offer, $offer_price, $total_offer_price);

        $result = $stmt->execute();

        $stmt->close();
        $con->close();

        return $result;
    }

    public static function getOrderProductsByOrderId($orderId){

        $con = DB::connectDB();

        $stmt = $con->prepare("SELECT * FROM order_products WHERE order_id = ?");
        $stmt->bind_param("i", $orderId);

        $stmt ->execute();
        $result = $stmt->get_result();

        $con->close();

        $list = [];
        while ($current = $result->fetch_object("OrderProduct")){
            $list[] = $current;
        }

        return $list;
    }
    
}

?>