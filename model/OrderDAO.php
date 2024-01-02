<?php
include_once 'config/db.php';
include_once 'Order.php';

class OrderDAO {

    public static function createOrder(Order $order) {
        $user_id = $order->getUserId();
        $date = $order->getDate();
        $is_paid = $order->getIsPaid();
        $total_price = $order->getTotalPrice();
        
        $con = DB::connectDB();

        $stmt = $con->prepare("INSERT INTO orders (user_id, date, is_paid, total_price) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isid", $user_id, $date, $is_paid, $total_price);

        $stmt->execute();
        $last_id = $con->insert_id;

        $stmt->close();
        $con->close();

        return $last_id;
    }

    public static function orderPay(Order $order) {
        $order_id = $order->getId();

        $con = DB::connectDB();

        $stmt = $con->prepare("UPDATE orders SET is_paid = 1 WHERE id = ?");
        $stmt->bind_param("i", $order_id);

        $stmt->execute();
        
        $stmt->close();
        $con->close();
    }

    public static function getOrderById($id) {
        $con = DB::connectDB();

        $stmt = $con->prepare("SELECT * FROM orders WHERE id = ?");
        $stmt->bind_param("i", $id);

        $stmt ->execute();
        $result=$stmt->get_result();

        $con->close();

        return $result->fetch_object('Order');
    }

    public static function getOrdersByUserId($userId){

        $con = DB::connectDB();

        $stmt = $con->prepare("SELECT * FROM orders WHERE user_id = ?");
        $stmt->bind_param("i", $userId);

        $stmt ->execute();
        $result = $stmt->get_result();

        $con->close();

        $list = [];
        while ($current = $result->fetch_object("Order")){
            $list[] = $current;
        }

        return $list;
    }

   
}


?>