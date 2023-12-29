<?php
include_once 'config/db.php';
include_once 'Order.php';

class OrderDAO {
    public static function createOrder($order) {
        $user_id = $order->getUserId();
        $date = $order->getDate();
        $is_paid = $order->getIsPaid();
        
        $con = DB::connectDB();

        $stmt = $con->prepare("INSERT INTO orders (user_id, date, is_paid) VALUES (?, ?, ?)");
        $stmt->bind_param("isi", $user_id, $date, $is_paid);

        $stmt->execute();
        $last_id = $con->insert_id;

        $stmt->close();
        $con->close();

        return $last_id;
    }

    public static function orderPay($order) {
        $order_id = $order->getId();

        $con = DB::connectDB();

        $stmt = $con->prepare("UPDATE orders SET is_paid = 1 WHERE id = ?");
        $stmt->bind_param("i", $order_id);

        $stmt->execute();
        
        $stmt->close();
        $con->close();
    }

   
}


?>