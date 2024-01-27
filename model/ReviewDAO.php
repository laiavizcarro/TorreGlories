<?php

include_once 'config/db.php';
include_once 'Review.php';

/**
 * Objecte d'accés a dades Review
 */

class ReviewDAO {
    public static function getAllReviews($rate = null, $rateOrder = null) {

        $con = DB::connectDB();

        $query = "SELECT r.*, u.name as user_name FROM reviews r ";
        $query .= "INNER JOIN orders o ON o.id = r.order_id ";
        $query .= "INNER JOIN users u ON u.id = o.user_id ";
        $query .= "WHERE 1=1 ";
        if (isset($rate)) {
            $query .= "AND rate = " . $rate . " ";
        }
        if (isset($rateOrder)) {
            $query .= "ORDER BY rate " . $rateOrder . " ";
        }
        $stmt = $con->prepare($query);

        $stmt ->execute();
        $result=$stmt->get_result();

        $con->close();

        $response = [];
        while ($current = $result->fetch_object("Review")) {
            $response[] = $current;
        }

        return $response;

    }


    public static function addReview(Review $review) {
        $con = DB::connectDB();

        $title = $review->getReviewTitle();
        $reviewText = $review->getReview();
        $rate = $review->getRate();
        $order_id = $review->getOrderId();
        $date = $review->getDate();

        $stmt = $con->prepare("INSERT INTO reviews (title, review, rate, order_id, date) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssiis", $title, $reviewText, $rate, $order_id, $date);

        $stmt->execute();

        $stmt->close();
        $con->close();
    }

    public static function orderReviewExists($order_id) {
        $con = DB::connectDB();

        $query = "SELECT count(*) as count FROM reviews WHERE order_id = $order_id";
        $stmt = $con->prepare($query);

        $stmt ->execute();
        $result = $stmt->get_result();

        $con->close();

        return $result->fetch_assoc()['count'];
    }

}



?>