<?php

include_once 'config/db.php';
include_once 'Order.php';

/**
 * Objecte d'accés a dades Order
 */
class OrderDAO {

    /**
     * Crear cistella
     * 
     * @param Order $order Cistella a crear
     * 
     * @return integer El ID de la cistella creada
     */
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

    /**
     * Pagar cistella
     * 
     * @param Order $order Cistella a pagar
     */
    public static function orderPay(Order $order) {
        $order_id = $order->getId();

        $con = DB::connectDB();

        $stmt = $con->prepare("UPDATE orders SET is_paid = 1 WHERE id = ?");
        $stmt->bind_param("i", $order_id);

        $stmt->execute();
        
        $stmt->close();
        $con->close();
    }

    /**
     * Obtindre cistella a partir del seu ID
     * 
     * @param integer $id ID de la cistella
     * 
     * @return Order
     */
    public static function getOrderById($id) {
        $con = DB::connectDB();

        $stmt = $con->prepare("SELECT * FROM orders WHERE id = ?");
        $stmt->bind_param("i", $id);

        $stmt ->execute();
        $result=$stmt->get_result();

        $con->close();

        return $result->fetch_object('Order');
    }

    /**
     * Obtindre les cistelles d'un usuari
     * 
     * @param integer $userId ID de l'usuari
     * 
     * @return Order[]
     */
    public static function getOrdersByUserId($userId){

        $con = DB::connectDB();

        $query = "SELECT o.*, (select count(*) from reviews r where r.order_id = o.id) as review_count FROM orders o ";
        $query .= "WHERE o.user_id = ? ";
        $stmt = $con->prepare($query);
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

    /**
     * Obtindre les cistelles
     * 
     * @return Order[]
     */
    public static function getOrders(){

        $con = DB::connectDB();

        $query = "SELECT o.*, u.name as user_name, u.surname as user_surname FROM orders o ";
        $query .= "INNER JOIN users u ON o.user_id = u.id ";
        $stmt = $con->prepare($query);

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